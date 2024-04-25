<?php

header('Content-Type: application/json; charset=utf-8');

require '../connection/index.php';

$keres = $_GET['keres'];

$query = mysqli_query($conn, "SELECT * FROM `recept` WHERE uid LIKE '%$keres%'") or die(mysqli_error($conn));
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

    $json = json_encode($tombs, JSON_UNESCAPED_UNICODE);
    print $json;
?>