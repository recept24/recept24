<?php

header('Content-Type: application/json; charset=utf-8');

function find_user(){

    require '../connection/index.php';     //adatbázis kapcsolat felépítése
    
	//kiolvasása a POST függvénynek:
    $unick = $_POST["username"];
    //$umail = $_POST["umail"];
    $upw = $_POST["password"];


    $search = mysqli_query($conn, "SELECT unick, umail, upw FROM user WHERE unick = '$unick'");
    $row = mysqli_fetch_assoc($search);
        
    if ($upw==$row['upw']) {
        $finduser = ['hiba' => 0] + $row;
        echo "Van megfelelő találat!";
    } else {
        $finduser = ['hiba' => "Hibás Username vagy Password!"];
        echo "Nincs találat!";
    }

    mysqli_close($conn);

    return $finduser;  
}

$finduser = find_user();

$json = json_encode($finduser, JSON_UNESCAPED_UNICODE);
print $json;

?>