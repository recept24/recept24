

<?php
$loggedIn = isset($_SESSION['username']);

$menuItems = array(
    '<img src="logo.png" alt="Kezdőlap" id="logo">',
    'Receptek',
    'Chat', 
    'Recept feltöltés',
    'Belépés',
);

$menuUrls = array(
    'index',
    'recipe',
    'chat',
    'upload',
    'login',
    
    
);  

echo '<ul class="navbar">';
for ($i = 0; $i < count($menuItems); $i++) {
    echo '<li><a href="?p=' . $menuUrls[$i] . '">' . $menuItems[$i] . '</a></li>';
}
echo '</ul>';

$p = isset($_GET['p']) ? $_GET['p'] : '';

if ($p==$menuUrls[0]) include("recipe.php");
elseif ($p == $menuUrls[1])  include("recipe.php");
elseif ($p == $menuUrls[2])  include("chat.php");
elseif ($p == $menuUrls[3])  include("upload.php");
elseif ($p == $menuUrls[4])  include("login.php");
elseif ($p == 'register') include("register.php");
else include("recipe.php");

?>
