<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CarDealer</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200;8..144,300;8..144,400;8..144,600;8..144,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- font awesome 4 cdn -->
        <!-- https://www.youtube.com/watch?v=oYRda7UtuhA -->
    </head>
    <body>
        <section class="sub-header">
            <nav>
                <a href="index.php"><img src="images/logo.png"></a>
                <div class="nav-links" id="navLinks">
                    <i class="fa fa-times" onclick="hideMenu()"></i>
                    <ul>
                        <li>
                            <a href="index.php">HOME</a>
                        </li>
                        <li>
                            <a href="about.php">O NAS</a>
                        </li>
                        <li>
                            <a href="flota.php">FLOTA</a>
                        </li>
                        <li>
                            <a href="contact.php">KONTAKT</a>
                        </li>
                        <li>
                            <a href="login.php">
                                <?php
                                    if (isset($_SESSION['user'])) {
                                        echo '<a href="user_page.php">KONTO</a>';
                                    } else {
                                        echo '<a href="login.php">LOGIN</a>';
                                    }
                                ?>
                            </a>
                        </li>
                        <li>
                            <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<a href="scripts/logout.php">WYLOGUJ</a>';
                                }
                            ?>
                        </li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
            <h1>O nas</h1>
        </section>
        <section class="about-us">
            <div class="row">
                <div class="about-col">
                    <h1>AUTO<span style="color: #f44336">rent</span> to firma tworzona z pasji.</h1>
                    <p>Interesujemy si?? motoryzacj??, jeste??my na bie????co z nowymi trendami poszczeg??lnych marek, dlatego w naszej ofercie znajdziecie Pa??stwo wy????cznie nowe samochody. Wyr????nia je nowoczesny design, bogate wyposa??enie oraz niezwyk??y komfort jazdy na kr??tszych jak i d??u??szych trasach. Dzia??amy na terenie Bia??egostoku jak r??wnie?? ca??ej Polski.</p>
                    <a href="" class="hero-btn red-btn">SPRAWD?? DOST??PNE SAMOCHODY</a>
                </div>
                <div class="about-col">
                    <img src="images/about.jpg">
                </div>
            </div>
        </section>
        <section class="footer">
            <h4>AUTO<span style="color: #f44336">rent</span></h4>
            <div class="row">
                <div class="footer-about">
                    <i class="fa fa-map-marker"></i>
                    <p>Konstantego Cio??kowskiego 1, 15-245 Bia??ystok</p>
                </div>
                <div class="footer-about">
                    <i class="fa fa-clock-o"></i>
                    <p>Pon-Pt: 8:00 - 18:00 <br> Sobota: 9:00 - 15:00</p>
                </div>
                <div class="footer-about">
                    <i class="fa fa-envelope"></i>
                    <p>contact@autocars.pl</p>
                </div>
                <div class="footer-about">
                    <i class="fa fa-phone"></i>
                    <p>692-137-420</p>
                </div>
            </div>
            <div class="icons">
                <i class="fa fa-facebook"><a href="google.com"></a></i>
                <i class="fa fa-twitter"></i>
                <i class="fa fa-instagram"></i>
            </div>
        </section>
        <script>
            var navLinks = document.getElementById("navLinks");

            function showMenu(){
                navLinks.style.right = "0px";
            }

            function hideMenu(){
                navLinks.style.right = "-200px";
            }
        </script>
    </body>
</php>