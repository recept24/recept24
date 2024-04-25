
    <section>
        <form action="" method="get" id="keres">
            <input type="hidden" name="p" value="recipe">
            <input type="text" name="keres" class="keres" placeholder="Receptek" autocomplete="off"> 
        </from>
    </section>



    <?php

    if (isset($_GET['keres']))
    {
        $keres = $_GET['keres'];
        $fu   = @fopen( "http://recept24.szakdoga.net/api/search/index.php?keres=$keres" , "r" ) ;
    $json = fread( $fu , 8192 ) ;
    
    fclose( $fu );

    $adat = json_decode( $json ) ;

    

    if (($adat[0]->hiba == 0))
    {
        
        echo '<div class="recipe-container">';
        for ($i = 1; $i<count($adat);$i++) {
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
    else
    {
        echo "<h2>" . $adat[0]->hiba . "</h2>";
    }
    }
    else{
        $keres = "";
    }
    
    

    ?>
    
    </body>
    </html>

