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

    if (isset($row['upw'])) {
        // Van eredmény a lekérdezésből
        if ($upw != "" && $upw == $row['upw']) {
            $finduserFunc = ['hiba' => 0] + $row;
            // Van megfelelő találat!;
        } else {
            $finduserFunc = ['hiba' => "Hibás Username vagy Password!"];
            // Nincs megfelelő találat!;
        }
    } else {
        $finduserFunc = ['hiba' => "Hibás Username vagy Password!"];
        // Nincs találat!;
    }

    mysqli_close($conn);

    return $finduserFunc;
}

$finduser = find_user();

$json = json_encode($finduser, JSON_UNESCAPED_UNICODE);
print $json;

?>
