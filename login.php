<?php

if (isset($_POST['password'])) {

    $pwd = $_POST['password'];
    $hashedPassword = md5($pwd, $binary = false);

    $apiUrl = 'http://recept24.szakdoga.net/api/finduser/index.php';

    $userAgent = 'Mozilla/5.0 (Windows NT 11.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.9999.99 Safari/537.36';

    $data = [
        'username' => $_POST['username'],
        'password' => $hashedPassword,
    ];

    $ch = curl_init($apiUrl);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    var_dump($responseData);
    if ($responseData['hiba'] === 0) {

        echo "<h2>Sikeres bejelentkezés!</h2>";
        $_SESSION['username'] = $responseData['unick'];
        $_SESSION['uid'] = $responseData['uid'];

        header('Location: index.php');
        exit;
    } else {

        print($responseData['hiba']);
        echo '';
    }
}

if (!isset($_POST['password']) || (isset($_POST['password']) && ($responseData['hiba'] != "0"))) {
?>
    <div class="container">
        <div class="form">
            <div class="title">Recept24</div>
            <div class="subtitle">Bejelentkezés!</div>

            <form action="" method="post" id="login-form">
                <div class="input-container ic1">
                    <input type="text" id="username" name="username" class="input" required placeholder=" ">
                    <div class="cut"></div>
                    <label class="placeholder" for="username">Felhasználónév</label>
                </div>

                <div class="input-container ic2">
                    <input type="password" id="upw" name="password" class="input" required placeholder=" ">
                    <div class="cut cutshort2"></div>
                    <label class="placeholder" for="password">Jelszó</label>
                </div>

                <button type="submit" class="submit">Bejelentkezés</button>
                <div class="subtitle">Még nem regisztráltál? <?php echo '<a href="?p=register">Regisztráció</a>' ?></div>
            </form>

        </div>
    </div>
<?php

}
?>