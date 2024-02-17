<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title> 
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="menu.css" type="text/css" rel="stylesheet">

</head>
<body>

<h1>REGISZTRÁCIÓ</h1>

<?php

if (!isset($_POST['upw']))
{
    echo '<form method="post" action="register.php" id="register">';
    echo '<label for="email">Emailcím:</label>';
    echo '<input type="email" id="umail" name="umail" required>';
    echo '<label for="username">Felhasználónév:</label>';
    echo '<input type="text" id="unick" name="unick" required>';
    echo '<label for="password">Jelszó:</label>';
    echo '<input type="password" id="upw" name="upw" required>';
    /*echo '<div class="g-recaptcha" data-sitekey="6LdTFmcpAAAAAOQWMm0gqWKYyqagZPNpeLuYajXm"></div>';*/
    echo '<button type="submit" id="submitBtn">Regisztrál</button>';
    echo '</form>';
?>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function() {
            document.getElementById('autoFilledForm').submit();
        });
    </script>
<?php
}
else
{

    $hashedPassword = password_hash(($_POST['upw']),PASSWORD_DEFAULT);

    echo '<form method="post" action="database/startsql/createUser.php" id="autoFilledForm">';
    echo '<label for="email">Emailcím:</label>';
    echo '<input type="email" id="umail" name="umail" value="' . $_POST['umail'] . '" required>';
    echo '<label for="username">Felhasználónév:</label>';
    echo '<input type="text" id="unick" name="unick" value="' . $_POST['unick'] . '" required>';
    echo '<label for="password">Jelszó:</label>';
    echo '<input type="hidden" id="upw" name="upw" value="' . $hashedPassword . '">';
    /*echo '<div class="g-recaptcha" data-sitekey="6LdTFmcpAAAAAOQWMm0gqWKYyqagZPNpeLuYajXm"></div>';*/
    echo '<button type="submit">Regisztrál</button>';
    echo '</form>';

}






?>
<p>Van már fiókja? <a href="login.php">Belépés</a></p>


</body>

</html>