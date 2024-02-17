<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="menu.css" type="text/css" rel="stylesheet">
</head>
<body>

<?php
$loggedIn = isset($_SESSION['username']);

$menuItems = array(
    'Kezdőlap',
    'Keresés',
    'Chat',
    'Recept feltöltés',
    'Belépés',
);

$menuUrls = array(
    'index',
    'find',
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

if ($p == $menuUrls[0])  include("./index.php");
elseif ($p == $menuUrls[1])  include("find.php");
elseif ($p == $menuUrls[2])  include("chat.php");
elseif ($p == $menuUrls[3])  include("upload.php");
elseif ($p == $menuUrls[4])  include("login.php");

?>

<script>
function toggleDropdown(btn) {
    var dropdownContent = btn.nextElementSibling;
    dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
}
</script>

</body>
</html>