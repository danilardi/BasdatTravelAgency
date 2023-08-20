<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basdat Travel Agency</title>
    <link rel="stylesheet" href="css/signupstyle.css" />

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
                    <li><a href="login.php" class="log-button">Logins</a></li>
                    <li><a href="login.php">Pesanan</a></li>
                    <li><a href="#aboutus">About Us</a></li>
                    <li><a href="#rekomendasi">Rekomendasi</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <body>

        <form method="post" style="border:1px solid #ccc">
            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="Username"><b>User Name</b></label>
                <input type="text" placeholder="Username" name="username" required>

                <label for="Nama"><b>Nama Lengkap</b></label>
                <input type="text" placeholder="Nama Lengkap" name="nama_lengkap" required>

                <label for="ttl"><b>Tanggal Lahir</b></label><br><br>
                <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir" required>
                <br><br>
                <label for="jenis"><b>Jenis Kelamin</b>
                    <br><br>
                    <input type="radio" id="html" name="jenis_kelamin" value="lk">
                    <label for="html">Laki-Laki</label><br>
                    <br>
                    <input type="radio" id="css" name="jenis_kelamin" value="pr">
                    <label for="css">Perempuan</label><br>
                </label>

                <br>

                <label for="notelp"><b>Nomor Telpon</b></label>
                <input type="text" placeholder="Nomor Telpon" name="nomor_hp" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="verifpass" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="rekomendasi-1">
                    <p> <a href="login.php" class="location-1" target="_blank">Cancel</a> <input class="location-1" type="submit" name="daftar" value="LOGIN" /></p>
                </div>
            </div>
        </form>

    </body>


</html>


<?php

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $username = filter_input(INPUT_POST, 'username',  FILTER_SANITIZE_STRING);;
    $nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap',  FILTER_SANITIZE_STRING);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nomor_hp = filter_input(INPUT_POST, 'nomor_hp',  FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $verifpass = $_POST["verifpass"];



    if ($password == $verifpass) {
        // buat query
        $query = pg_query("INSERT INTO pengguna (username, nama, tanggal_lahir, gender, nomor_hp, email, pass, jenis_pengguna) VALUES ('$username', '$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin', '$nomor_hp', '$email', '$password', 2)");

        // apakah query simpan berhasil?
        if ($query == TRUE) {
            // kalau berhasil alihkan ke halaman login.php dengan status=sukses
            header('Location: login.php?status=sukses');
        } else {
            // kalau gagal alihkan tetap di halaman signUp.php dengan status=gagal
            header('Location: sign-up.php?status=gagal');
        }
    } else {
        header('Location: sign-up.php?status=passbeda');
    }
} ?>