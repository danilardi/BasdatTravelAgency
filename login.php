<?php include("config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basdat Travel Agency</title>
    <link rel="stylesheet" href="css/loginstyle.css" />
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><img src="tmp/logored.png" style="float:left;width:100px;height:100px;"></div>
            <div class="namaweb">
                <h1>Basdat Travel Agency</h1>
            </div>
            <div class="Menu">
                <ul>
                    <li><a href="login.php" class="log-button">Login</a></li>
                    <li><a href="login.php">Pesanan</a></li>
                    <li><a href="index.php#aboutus">About Us</a></li>
                    <li><a href="index.php#rekomendasi">Rekomendasi</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>LOGIN</h2>
            </div>
            <form method="post" class="form">
                <label for="user-email" style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input id="user-email" class="form-content" type="text" name="username" required />
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;Password
                </label>
                <input id="user-password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
                <input id="submit-btn" type="submit" name="login" value="LOGIN" />
                <p id="signup">Don't have account yet?</p>
                <a href="sign-up.php" id="sign-up-btn"></br>SIGN UP</br></a>
                <a href="lupapassword.php" id="signup">Lupa password?</a>

            </form>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {

    // ambil data dari formulir
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    // buat query
    $query = pg_query("SELECT * FROM pengguna WHERE username = '$username' AND pass = '$password';");
    $cek = pg_num_rows($query);

    // apakah query login berhasil?
    if ($cek == 1) {
        session_start();
        $_SESSION["user"] = pg_fetch_array($query);
        if ($_SESSION["user"]["jenis_pengguna"] == 1) {
            header('Location: admin.php?status=sukses');
        } else {
            header('Location: visitor.php?status=sukses');
        }
    } else {
        header('Location: login.php?status=gagal');
    }
} ?>