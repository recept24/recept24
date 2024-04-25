<?php

if (isset($_POST['rcim']))
{
    $data = [
        'rcim' => $_POST['rcim'],
        'rhozzavalok' => $_POST['rhozzavalok'],
        'rleiras' => $_POST['rleiras'],
        'rido' => $_POST['rido'],
        'rnehezseg' => $_POST['rnehezseg'],
        'uid' => $_SESSION['uid'],
    ];

    $apiUrl = 'http://recept24.szakdoga.net/api/recipeupload/index.php';

    $userAgent = 'Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.9999.99 Safari/537.36';

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

    $response = curl_exec($ch);
    $responseData = json_decode($response);
    
    if ($responseData[0]->hiba === 0) {
        
        echo "<h2>Sikeres receptfeltöltés!</h2>";
        
        echo '<a href="?p=upload">Feltöltök még egyet!</a>';

    } else {
        
        print($responseData[0]->hiba);


    }
}
if (!isset($_POST['rcim']) || (isset($_POST['rcim']) && ($responseData[0]->hiba != "0")))
{
?>

<h2 class="form-title">Recept Feltöltés</h2>

<form action="" method="post" id="recipe-upload-form" class="recipe-form">
    <div class="form-group">
        <label for="rcim" class="form-label">Recept Címe:</label>
        <input type="text" id="rcim" name="rcim" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rhozzavalok" class="form-label">Hozzávalók:</label>
        <textarea id="rhozzavalok" name="rhozzavalok" rows="4" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="rleiras" class="form-label">Leírás:</label>
        <textarea id="rleiras" name="rleiras" rows="8" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="rido" class="form-label">Elkészítési Idő (perc):</label>
        <input type="number" id="rido" name="rido" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="rnehezseg" class="form-label">Nehézség:</label>
        <select id="rnehezseg" name="rnehezseg" class="form-control" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
    </div>

    <input type="submit" value="Recept feltöltése" class="btn-submit">
</form>

    
    <?php
    }

    ?>

