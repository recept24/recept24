<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h2>Recept Feltöltés</h2>

<form action="upload_recipe.php" method="post" id="recipe-upload-form">
    <label for="rcim">Recept Címe:</label>
    <input type="text" id="rcim" name="rcim" required>

    <br>

    <label for="rhozzavalok">Hozzávalók:</label>
    <textarea id="rhozzavalok" name="rhozzavalok" rows="4" required></textarea>

    <br>

    <label for="rleiras">Leírás:</label>
    <textarea id="rleiras" name="rleiras" rows="8" required></textarea>

    <br>

    <label for="rido">Elkészítési Idő (perc):</label>
    <input type="number" id="rido" name="rido" required>

    <br>

    <label for="rnehezseg">Nehézség:</label>
    <select id="rnehezseg" name="rnehezseg" required>
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

    <br>

    <input type="submit" value="Recept feltöltése">
</form>
</body>
</html>