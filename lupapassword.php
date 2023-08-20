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
                <h2>Lupa Password</h2>
            </div>
            <form method="post" class="form">
                <label for="user-email" style="padding-top:13px">
                    &nbsp;Username
                </label>
                <input id="user-email" class="form-content" type="text" name="username" required />
                <div class="form-border"></div>
                <label for="user-password" style="padding-top:22px">&nbsp;tanggal_lahir
                </label>
                <input id="user-password" class="form-content" type="date" name="tanggal_lahir" required />
                <div class="form-border"></div>
                <input id="submit-btn" type="submit" name="cek" value="Cek Password" />
                <?php
                if (isset($_POST['cek'])) {
                    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                    $tanggal_lahir = $_POST["tanggal_lahir"];
                    $query = pg_query("SELECT * FROM pengguna WHERE username = '$username' AND tanggal_lahir = '$tanggal_lahir';");
                    $password = pg_fetch_array($query);
                    $cek = pg_num_rows($query);
                    if ($cek == 1) {
                        echo "<br>password : " . $password['pass'] . "";
                    } else {
                        echo "akun ftidak ditemukan";
                    }
                } ?>
            </form>
        </div>
    </div>
</body>

</html>