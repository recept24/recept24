


<?php



$keres = $_SESSION['uid'];
$fu   = @fopen( "http://recept24.szakdoga.net/api/myrecipes/index.php?keres=$keres" , "r" ) ;
$json = fread( $fu , 8192 ) ;

fclose( $fu );

$adat = json_decode( $json ) ;

if (!(is_null($adat))) {
echo '<h2>Receptjeim</h2>';
echo '<div class="recipe-container">';
        for ($i = 0; $i<count($adat);$i++) {
            ?>
            <div class="recipe">   
                <h2><?php echo $adat[$i]->rcim; ?>    </h2>
                <p>Hozzávalok: <?php echo $adat[$i]->rhozzavalok; ?></p>
                <p>Elkészítés: <?php echo $adat[$i]->rleiras; ?></p>
                <p>Sütési idő: <?php echo $adat[$i]->rido; ?> minutes</p>
                <p>Nehézség: <?php echo $adat[$i]->rnehezseg; ?></p>
            </div>
            <?php
        }
echo '</div>';
    }
else {
    echo '<h2>Nincs feltöltött receptem</h2>';
}
?>

<h2><a class="logout" href="logout_script.php">Kijelentkezés</h2>

