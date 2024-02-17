<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Recept24</title>
    <link href="menu.css" type="text/css" rel="stylesheet">
    <link href="login.css" type="text/css" rel="stylesheet">

</head>

<body>

    <h2>Login</h2>

    <form action="login.php" method="post" id="login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <input id="login" type="submit" value="Login">
    </form>

    <h2>MÉG NEM REGISZTRÁLTÁL?</h2>

    <a href="register.php">REGISZTRÁCIÓ</h2></a><h2>

</body>

<?php



?>


