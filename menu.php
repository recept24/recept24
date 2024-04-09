<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="menu.css" type="text/css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>

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

<script>
function toggleDropdown(btn) {
    var dropdownContent = btn.nextElementSibling;
    dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
}
</script>

</body>
</html>