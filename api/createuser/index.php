<?php

header('Content-Type: application/json; charset=utf-8');
//Create
//user hozzáadása az adatbázishoz:

// ha ellenőrzés megtörténik, akkor mehet a db-be:
if (check_fields()) {

    //ellenőrzés, hogy létezik-e már a felhsználó
    //require 'findUser.php';

    /*a user ellenőrzés során létezik-e a felhasználó, 
        ha igen, akkor FALSE-val tér vissza azaz nem íródik az adatbázisba, 
        ha nem, akkor lefut az adatbázisba bejegyzés és TRUE adodik vissza.*/
    //if (find_user()) {
    //    return false;
    //} else {
        user_create();
        $createuser = [
            'hiba'          => 0,
            'unick'         => $_POST["unick"],
            'umail'         => $_POST["umail"],
            'regtime'       => date('Y-m-d H:i:s')
        ];
    //}
} else {
    $createuser = ['hiba' => "Nincs kitöltve megfelelően a regisztráció"];
}

// ellenőrzése, hogy minden mező ki van-e töltve. szuperglobális($_POST) be van-e állítva és nem üres, azaz be van állítva valami? Később, az adatok részletesebb ellenőrzése is itt valósulhat meg. 
function check_fields(){

    $unick = isset($_POST["unick"]) && !empty($_POST["unick"]);
    $umail = isset($_POST["umail"]) && !empty($_POST["umail"]);
    $upw = isset($_POST["upw"]) && !empty($_POST["upw"]);
    return $unick && $umail && $upw;
}

function user_create(){

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

$json = json_encode($createuser, JSON_UNESCAPED_UNICODE);
print $json;

?>