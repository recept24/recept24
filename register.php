<?php


if(isset($_POST['upw']))
{
    $pwd = $_POST['upw'];
    $hashedPassword = md5($pwd, $binary = false);
    
    $apiUrl = 'http://recept24.szakdoga.net/api/createuser/index.php';

    $userAgent = 'Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.9999.99 Safari/537.36';


    $data = [
        'umail' => $_POST['umail'],
        'unick' => $_POST['unick'],
        'upw'   => $hashedPassword,
    ];
    
    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    
    $response = curl_exec($ch);
    $responseData = json_decode($response);
    
    if ($response === false) {
        echo 'cURL request failed: ' . curl_error($ch);
    } else {
        if ($responseData->hiba == "0")
        {
            echo "<h2>Sikeres regisztráció!</h2>";
            echo '<a href="?p=login">Bejelentkezés!</a>';
            
        }
        else
        {
            print($responseData->hiba);
            


            //header("Refresh:0; url=http://recept24.szakdoga.net/?p=register.php");
        }

    }
    
    

    curl_close($ch);
}
if (!isset($_POST['upw']) || (isset($_POST['upw']) && ($responseData->hiba != "0")))
{
    ?>
    <div class="container">
    <div class="form">
    <div class="title">Recept24</div>
    <div class="subtitle">Regisztráció!</div>
    

    <form method="post" action="?p=register" id="register">
    <div class="input-container ic1">
    <input type="email" id="umail" name="umail" class="input" required placeholder=" ">
    <div class="cut cutshort1"></div>
    <label class="placeholder" for="umail">Email</label>
    </div>
    <div class="input-container ic2">
    <input type="text" id="unick" name="unick" required class="input" placeholder=" ">
    <div class="cut"></div>
    <label class="placeholder" for="unick">Felhasználónév</label>
    </div>
    
    <div class="input-container ic2">
    <input type="password" id="upw" name="upw" required class="input" placeholder=" "> 
    <div class="cut cutshort2"></div>
    <label class="placeholder" for="upw">Jelszó</label>
    </div>

    <button type="text" class="submit">Regisztrál</button>
    <div class="subtitle">Van már fiókja? <?php echo '<a href="?p=login">Bejelentkezés</a>' ?></a></div>
    </form>
    </div>
    </div>
    
        
        
        
        

    
    <?php
    echo '</div>';
}

?>
