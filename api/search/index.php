<?php

header('Content-Type: application/json; charset=utf-8');

//ellenőrzése, hogy a keres paraméter létezik, és hogy van-e benne érték:
if (!isset($_GET['keres']) || empty($_GET['keres'])) {
    $tombs[] = ['hiba' => "Kérem a keresés ablak kitöltését!"];
} else {

    $keres = $_GET['keres'];

    require '../connection/index.php';

    $query = mysqli_query($conn, "SELECT * FROM `recept` WHERE rcim LIKE '%$keres%'") or die(mysqli_error($conn));
    if (mysqli_num_rows($query)) {
        while ($fetch = mysqli_fetch_array($query)) {
            $rcim = $fetch['rcim'];
            $rhozzavalok = $fetch['rhozzavalok'];
            $rleiras = $fetch['rleiras'];
            $rido = $fetch['rido'];
            $rnehezseg = $fetch['rnehezseg'];

            $tomb = [
                'rcim'          => $rcim,
                'rhozzavalok'   => $rhozzavalok,
                'rleiras'       => $rleiras,
                'rido'          => $rido,
                'rnehezseg'     => $rnehezseg
            ];

            $tombs[] = $tomb;
        }


        mysqli_close($conn);

        array_unshift($tombs, ['hiba' => "0"]);
    } else {
        $tombs[] = ['hiba' => "Nem találtam a kérésnek megfelelőt!"];
    }
}

$json = json_encode($tombs, JSON_UNESCAPED_UNICODE);
print $json;
