<?php include("config.php"); ?>
<?php
session_start();
if ($_SESSION["user"]["jenis_pengguna"] != 1) {
    session_unset();
    header("Location: login.php");
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basdat Travel Agency</title>
    <link rel="stylesheet" href="css/pusatstyle.css" />

</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
        box-sizing: border-box
    }

    body {
        font-family: Verdana, sans-serif;
        margin: 0;
        background: rgb(173, 223, 223);

    }

    .mySlides {
        display: none;
    }

    img {
        vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 100%;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #090a47;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #131212;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {

        .prev,
        .next,
        .text {
            font-size: 11px
        }
    }
</style>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><img src="tmp/logored.png" style="float:left;width:100px;height:100px;"></div>
            <div class="namaweb">
                <h1>Basdat Travel Agency</h1>
            </div>
            <div class="Menu">
                <ul>
                    <li><a href="logout.php" class="log-button">Logout</a></li>
                    <li><a href="daftarpesananadmin.php">Daftar Pesanan</a></li>
                    <li><a href="pesanan.php">Pesanan</a></li>
                    <li><a href="#aboutus">About Us</a></li>
                    <li><a href="#rekomendasi">Rekomendasi</a></li>
                    <li><a href="admin.php">Home</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="https://images.unsplash.com/photo-1591017683260-655b616bfb17?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1100&q=80" style="width:100%; height: 800px;">
            <div class="text">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="https://images.unsplash.com/photo-1634991599324-cb0ee4942962?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=875&q=80" style="width:100%; height: 800px;">
            <div class="text">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="https://images.unsplash.com/photo-1510611280575-f007416f59f2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" style="width:100%; height: 800px;">
            <div class="text">Caption Three</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

    </div>
    <br>
    <br>
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <br>
        <br>
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>


    <div class="wraper">
        <!--Untuk Konten 1-->
        <section id="konten-1">
            <div class="kontenimg-1"><img src="https://i.pinimg.com/736x/09/f7/d5/09f7d537d05d22e7c1688e5dbb45b8e0.jpg" style="float:left;width:50%px;height:450px;"></div>
            <div class="kolom">
                <p class="Deskripsi-1">Uod Batavia</p>
                <h2>Kota Tua</h2>
                <p>Kota Tua Jakarta, juga dikenal dengan sebutan Batavia Lama (Oud Batavia), adalah sebuah wilayah kecil di Jakarta, Indonesia. Wilayah khusus ini memiliki luas 1,3 kilometer persegi melintasi Jakarta Utara dan Jakarta Barat (Pinangsia, Taman Sari dan Roa Malaka).
                    <br><br><br>
                    Dijuluki "Permata Asia" dan "Ratu dari Timur" pada abad ke-16 oleh pelayar Eropa, Jakarta Lama dianggap sebagai pusat perdagangan untuk benua Asia karena lokasinya yang strategis dan sumber daya melimpah.
                </p>
                <p><a href="https://www.google.co.id/maps/place/Kota+Tua,+Mangga+Besar,+Kec.+Taman+Sari,+Kota+Jakarta+Barat,+Daerah+Khusus+Ibukota+Jakarta/@-6.1311315,106.8397586,13z/data=!3m1!4b1!4m5!3m4!1s0x2e69f607534bb7c7:0x42eab7e4f2537065!8m2!3d-6.1376448!4d106.8171245" class="location-1" target="_blank">Lokasi</a></p>
            </div>
        </section>
        <!--Untuk Konten 2-->
        <section id="konten-2">
            <div class="kolom-1">
                <p class="Deskripsi-1">Pelabuhan Utama Padjajaran</p>
                <h2>Pelabuhan Sunda Kelapa</h2>
                <p>Nama pelabuhan ini menurut naskah-naskah kuno seperti Carita Parahyangan ialah Kalapa, tetapi orang-orang Portugis menyebutkannya Sunda Kelapa yang terletak di muara sungai Ciliwung dan telah menjadi pelabuhan Kerajaan Sunda teramai di pantai utara Jawa Barat, bedasarkan catatan Tomi Pires yang berkunjung pada tahun 1513.
                    <br><br><br>
                    Kemasyuran Pelabuhan Sunda Kelapa yang pernah menjadi Pelabuhan Internasional sampai kini masih dapat dilihat seperti berbagai bangunan gudang di sekitar pelabuhan, lebih tepatnya lagi pada Pasar Ikan. Selain itu, terdapat juga bangunan menara pengawas serta berbagai artefak temuan survei maupun penggalian arkeologi di sekitar Pasar Ikan dan Pelabuhan Sunda Kelapa
                </p>

                <p><a href="https://www.google.co.id/maps/place/Pelabuhan+Sunda+Klp./@-6.1220962,106.8068174,15.75z/data=!4m5!3m4!1s0x2e6a1dfb221d49b9:0x9cda85f4cf523a3d!8m2!3d-6.1220659!4d106.8075136" class="location-1" target="_blank">Lokasi</a></p>
            </div>
            <img src="https://images.unsplash.com/photo-1635380208459-b34560afacb1?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1471&q=80" style="float:right;width:800px;height:450px;">
        </section>


        <section id="rekomendasi">
            <div class="tengah">
                <div class="kolom">
                    <h2>Recommended</h2>
                    <p>Jakarta juga memiliki tempat hiburan dan rekreatif lainnya seperti dibawah ini</p>

                </div>
                <h2>Paket Tersedia</h2>
                <div class="rekomendasi-list">
                    <div class="rekomendasi-1">
                        <img src="https://images.unsplash.com/photo-1561371451-7411d78e95d6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1032&q=80">
                        <h3>Pulau Tidung</h3>
                        <p>"Tempat Snorkling yang tidak jauh dari Ibu Kota dapat menjadi pilihan untuk liburan pada weekend"</p>
                        <p><a href="https://www.google.com/maps/place/Pulau+Tidung,+Kepulauan+Seribu+Sel.,+Kabupaten+Kepulauan+Seribu,+Daerah+Khusus+Ibukota+Jakarta/@-5.8079855,106.5005834,14z/data=!3m1!4b1!4m5!3m4!1s0x2e41dfef46f7acb3:0xc22d0e04b6c5b362!8m2!3d-5.8032053!4d106.5237907" class="location-1" target="_blank">Lokasi</a> <a href="pesanan.php" class="location-1" target="_blank">Pesan</a></p>
                        </p>
                    </div>

                    <div class="rekomendasi-1">
                        <img src="https://images.unsplash.com/photo-1550602122-f68d7b4f66b6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1032&q=80">
                        <h3>Pantai Ancol</h3>
                        <p>"Bosen ke mall terus hari weekend, Pantai Ancol dapat dijadikan pilihan utama sebagai wahana air dekat dari rumah anda"</p>
                        <p><a href="https://www.google.com/maps/place/Pantai+Ancol/@-6.1209341,106.8521043,16.5z/data=!4m5!3m4!1s0x2e6a1e3c1ca938d1:0x1ccccec14fd711af!8m2!3d-6.1194215!4d106.8502435" class="location-1" target="_blank">Lokasi</a> <a href="pesanan.php" class="location-1" target="_blank">Pesan</a></p>

                    </div>

                    <div class="rekomendasi-1">
                        <img src="https://images.unsplash.com/photo-1600846309541-420e33acda4e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1032&q=80">
                        <h3>Stadiun Gelora Bung Karno</h3>
                        <p>"Bingung mau sepedaan, jogging dan skeatboard-an dimana? Ya, Komplek GBK solusinya."</p>
                        <p><a href="https://www.google.com/maps/place/Stadion+Utama+Gelora+Bung+Karno/@-6.2185648,106.7996082,17z/data=!3m2!4b1!5s0x2e69f14cd1188515:0x9738e4475463a560!4m5!3m4!1s0x2e69f14d30079f01:0x2e74f2341fff266d!8m2!3d-6.2185701!4d106.8017969" class="location-1" target="_blank">Lokasi</a> <a href="pesanan.php" class="location-1" target="_blank">Pesan</a></p>
                        </p>
                    </div>
                </div>
            </div>

        </section>

        <div id="kontak">
            <div class="wraper">
                <div class="footer">
                    <div class="footer-section">
                        <section id="aboutus"></section>
                        <h3>BasdaTravGency.id</h3>
                        </section>

                    </div>

                    <div class="footer-section">
                        <h3> Tugas Basdat</h3>


                    </div>

                    <div class="footer-section">
                        <h3>Basdat Travel Agency Social</h3>
                    </div>

                </div>
            </div>
        </div>

</body>
</head>

</html>