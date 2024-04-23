<?php

$loggedIn = isset($_SESSION['username']);

$menuItems = array(
    '<img src="logo.png" alt="Kezdőlap" id="logo">',
    'Receptek',
    'Recept feltöltés',
    $loggedIn ? $_SESSION['username'] : 'Belépés', 
);

$menuUrls = array(
    'index',
    'recipe',
    $loggedIn ? 'upload' : 'login',
    $loggedIn ? 'profile' : 'login', 
);

echo '<ul class="navbar">';
for ($i = 0; $i < count($menuItems); $i++) {
    echo '<li><a href="?p=' . $menuUrls[$i] . '">' . $menuItems[$i] . '</a></li>';
}
echo '</ul>';

$p = isset($_GET['p']) ? $_GET['p'] : '';


if ($p == $menuUrls[0] || $p == $menuUrls[1]) {
    include("recipe.php");
} elseif ($p == $menuUrls[2]) {
    if ($loggedIn) {
        include("upload.php");
    } else {
        include("login.php");
    }
} elseif ($p == $menuUrls[3]) {
    if ($loggedIn) {
        if($p == 'profile') {
            include("profile.php");
        }
    } else {
        include("login.php");
    }
} elseif ($p == 'register') {
    include("register.php");
} else {
    include("recipe.php");
}
?>
