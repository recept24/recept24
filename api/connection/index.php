<?php

$hostname = "localhost";
$username = "";
$password = "";
$database = "recept24";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Hiba: Sikertelen az adatbázis kapcsolódás");
}

?>
