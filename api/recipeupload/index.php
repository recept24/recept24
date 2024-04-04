<?php
// Recept hozzáadása az adatbázishoz:

header('Content-Type: application/json; charset=utf-8');

// Fő logika, az eredmény kimenetekkel:
if (check_fields()) {
    // Ha minden mező ki van töltve, létrehozzuk a receptet
    recipe_create();
    // Visszajelzés létrehozása az eredménnyel
    $createrecipe = [
        ['hiba'          => 0],
        [
            'rcim'         => $_POST["rcim"],
            'rhozzavalok'  => $_POST["rhozzavalok"],
            'rleiras'      => $_POST["rleiras"],
            'rido'         => $_POST["rido"],
            'rnehezseg'    => $_POST["rnehezseg"],
            'uid'          => $_POST["uid"]
        ]
    ];
} else {
     // Ha valamelyik mező nincs kitöltve, hibát jelzünk
    $createrecipe = ['hiba' => "Nincs kitöltve megfelelően a recept"];
}

// Ellenőrzi, hogy minden mező ki van-e töltve
function check_fields()
{
     // Ellenőrzi, hogy minden mező tartalmaz-e értéket a $_POST tömbben
    $rcim = isset($_POST["rcim"]) && !empty($_POST["rcim"]);
    $rhozzavalok = isset($_POST["rhozzavalok"]) && !empty($_POST["rhozzavalok"]);
    $rleiras = isset($_POST["rleiras"]) && !empty($_POST["rleiras"]);
    $rido = isset($_POST["rido"]) && !empty($_POST["rido"]);
    $rnehezseg = isset($_POST["rnehezseg"]) && !empty($_POST["rnehezseg"]);
    $uid = isset($_POST["uid"]) && !empty($_POST["uid"]);

    // Visszatérési érték true, ha minden mező ki van töltve, különben false
    return $rcim && $rhozzavalok && $rleiras && $rido && $rnehezseg && $uid;
}

// Recept létrehozása az adatbázisban.
/* A POST adatok kiolvasása és kódolása, majd kapcsolat felépítése az adatbázissal.
 */
function recipe_create()
{
    // A POST függvény kiolvasása, a htmlspecialchars() segítségével bizonyos karakterek ", ', <, >  kikódolásával:
    $rcim = htmlspecialchars($_POST["rcim"]);
    $rhozzavalok = htmlspecialchars($_POST["rhozzavalok"]);
    $rleiras = htmlspecialchars($_POST["rleiras"]);
    $rido = htmlspecialchars($_POST["rido"]);
    $rnehezseg = htmlspecialchars($_POST["rnehezseg"]);
    $uid = htmlspecialchars($_POST["uid"]);

    // Adatbázis kapcsolat felépítése
    require '../connection/index.php';

    // Beszúrási utasítás előkészítése
    $stmt = "INSERT INTO recept (rcim, rhozzavalok, rleiras, rido, rnehezseg, uid) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt_prepare = mysqli_prepare($conn, $stmt);

    // Paraméterek összekapcsolása a beszúrási utasítással
    mysqli_stmt_bind_param($stmt_prepare, "sssiii", $rcim, $rhozzavalok, $rleiras, $rido, $rnehezseg, $uid);

    // Beszúrás végrehajtása
    mysqli_stmt_execute($stmt_prepare);

    // Adatbáziskapcsolat bezárása
    mysqli_close($conn);
}

// Válasz JSON formátumba alakítása és kiírása
$json = json_encode($createrecipe, JSON_UNESCAPED_UNICODE);
print $json;
?>


