
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
    fclose( $fu ) ;

    $adat = json_decode( $json ) ;


    if (isset($adat->hiba))
    {
        echo  "<h2>" . $adat->hiba . "</h2>";
    }
    else
    {
        echo '<div class="recipe-container">';
        foreach ($adat as $recipe) {
            ?>
            <div class="recipe">   
                <h2><?php echo $recipe->rcim; ?>    </h2>
                <p>Hozzávalok: <?php echo $recipe->rhozzavalok; ?></p>
                <p>Elkészítés: <?php echo $recipe->rleiras; ?></p>
                <p>Sütési idő: <?php echo $recipe->rido; ?> minutes</p>
                <p>Nehézség: <?php echo $recipe->rnehezseg; ?></p>
            </div>
            <?php
        }
        echo '</div>';
    }
    }    
    else{
        $keres = "";
    }
    
    

    ?>
    
    </body>
    </html>

