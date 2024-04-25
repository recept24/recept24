<?php

header('Content-Type: application/json; charset=utf-8');

function find_user()
{

    require '../connection/index.php';     //adatbázis kapcsolat felépítése

    //a POST függvény kiolvasása:
    $unick = @$_POST["username"];
    $upw = @$_POST["password"];


    $search = mysqli_query($conn, "SELECT uid, unick, umail, upw FROM user WHERE unick = '$unick'");
    $row = mysqli_fetch_assoc($search);

    if ($upw != "" && $upw == $row['upw']) {
        $finduser = ['hiba' => 0] + $row;
        //Van megfelelő találat!;
    } else {
        $finduser = ['hiba' => "Hibás Username vagy Password!"];
        //Nincs találat!;
    }

    mysqli_close($conn);

    if (is_null($finduser)) {
        $finduser = ['hiba' => " TESZT Hibás Username vagy Password! TESZT"];
    }

    return $finduser;
}

$finduser = find_user();

$json = json_encode($finduser, JSON_UNESCAPED_UNICODE);
print $json;

?>
