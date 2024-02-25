<?php

// ha létezik adat mindegyik értéknél, akkor mehet a db-be
if (check_fields()){
    find_user();
}

// ellenőrzése, hogy minden mező ki van-e töltve. szuperglobális($_POST) be van-e állítva és nem üres, azaz be van állítva valami?
/*function check_fields(){
    $unick = isset($_POST["unick"]) && !empty($_POST["unick"]);
    //$umail = isset($_POST["umail"]) && !empty($_POST["umail"]);
    $upw = isset($_POST["upw"]) && !empty($_POST["upw"]);
    return $unick && /*$umail &&*/ $upw;
//}

function find_user(){

    require '../connection/index.php';     //adatbázis kapcsolat felépítése
    
	//kiolvasása a POST függvénynek:
    $unick = $_POST["unick"];
    //$umail = $_POST["umail"];
    $upw = $_POST["upw"];

    $search = mysqli_query($conn, "SELECT * AS validNick FROM users WHERE $upw");
    $row = mysqli_fetch_assoc($search);
    if ($row['validNick'] == $unick){
        return true;
    }else {
        return false;
    };

    mysqli_close($conn);
}

?>