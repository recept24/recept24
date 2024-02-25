<?php

    if(isset($_POST['keres'])){
        $keres = $_POST['keresadat'];

        require '../connection/index.php';
        $query = mysqli_query($conn, "SELECT * FROM `recept` WHERE rcim LIKE '%$keres%'") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
            echo $fetch['rcim'];
            echo $fetch['rhozzavalok'];
            echo $fetch['rleiras'];
            echo $fetch['rido'];
            echo $fetch['rnehezseg'];
        }
    }

?>