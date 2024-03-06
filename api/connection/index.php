<?php

$hostname = "localhost";
$username = "recept24";
$password = "recept24";
$database = "recept24";

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Hiba: Sikertelen az adatbázis kapcsolódás");
}

?>