<?php
// Create user hozzáadása az adatbázishoz:

header('Content-Type: application/json; charset=utf-8');

// fő logika, az eredmény kimenetekkel:
if (!check_fields()) {
    $createuser = ['hiba' => "Nincs kitöltve megfelelően a regisztráció"];
} elseif (!free_user()) {
    $createuser = ['hiba' => "Létezik már ilyen regisztráció!"];
} else {
    user_create();
    $createuser = ['hiba'          => 0];
}

$json = json_encode($createuser, JSON_UNESCAPED_UNICODE);
print $json;

// ellenőrzése, hogy minden mező ki van-e töltve. szuperglobális($_POST) be van-e állítva és nem üres, azaz be van állítva valami?
function check_fields()
{
    return isset($_POST["unick"]) && !empty($_POST["unick"]) &&
        isset($_POST["umail"]) && !empty($_POST["umail"]) &&
        isset($_POST["upw"]) && !empty($_POST["upw"]);
}

// szabad-e a felhasználónév, illetve emailcím.
function free_user()
{
    $unick = $_POST["unick"];
    $umail = $_POST["umail"];

    //adatbázis kapcsolat felépítése
    require '../connection/index.php';

    $search = mysqli_query($conn, "SELECT unick, umail FROM user WHERE unick = '$unick' OR umail = '$umail'");
    $row = mysqli_fetch_assoc($search);

    mysqli_close($conn);

    return !isset($row);
}

// felhasználó beírása az adatbázisba.
function user_create()
{
    //a POST függvény kiolvasása, a htmlspecialchars() segítségével bizonyos karakterek ", ', <, >  kikódolásával:
    $unick = htmlspecialchars($_POST["unick"]);
    $umail = htmlspecialchars($_POST["umail"]);
    $upw = $_POST["upw"];

    //adatbázis kapcsolat felépítése
    require '../connection/index.php';

    //injektálás https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    $stmt = "INSERT INTO user (unick, umail, upw, regtime) VALUES (?, ?, ?, NOW())";

    $stmt_prepare = mysqli_prepare($conn, $stmt);

    mysqli_stmt_bind_param($stmt_prepare, "sss", $unick, $umail, $upw);

    mysqli_stmt_execute($stmt_prepare);

    mysqli_close($conn);
}
?>