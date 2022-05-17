<?php
session_start();
require_once "scripts/functions.php";
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
                <h1>Nasze auta</h1>
            </nav>
        </section>
        <section class="flota">
            <?php
                showCar();
            ?>

            <div class="row">
                <div class="flota-col">
                    <img src="images/toyota-yaris.png">
                </div>
                <div class="flota-col">
                    <h1>Toyota Yaris</h1>
                    <p>
                        <b>Rok produkcji:</b> 2018
                        <br>
                        <b>Skrzynia biegów:</b> Manualna
                        <br>
                        <b>Pojemność:</b> 1500 cm3
                        <br>
                        <b>Moc silnika:</b> 111KM
                        <br>
                        <b>Rodzaj paliwa:</b> Benzyna
                        <br>
                        <b>Liczba miejsc:</b> 5
                        <br>
                        <b>Liczba drzwi:</b> 4/5
                        <br>
                        <b>Kolor:</b> Srebrny
                    </p>
                </div>
                <div class="flota-col">
                    <h1>Cennik</h1>
                    <p>
                        <b>1-7 dni:</b> 110 pln
                        <br>
                        <b>7-14 dni:</b> 90 pln
                        <br>
                        <b>Powyżej 14 dni:</b> 80 pln
                    </p>
                    <a href="" class="hero-btn red-btn">EXPLORE NOW</a>
                </div>
            </div>

            <div class="row">
                <div class="flota-col">
                    <img src="images/citroen-c3.png">
                </div>
                <div class="flota-col">
                    <h1>Citroen C3</h1>
                    <p>
                        <b>Rok produkcji:</b> 2018
                        <br>
                        <b>Skrzynia biegów:</b> Manualna
                        <br>
                        <b>Pojemność:</b> 1500 cm3
                        <br>
                        <b>Moc silnika:</b> 111KM
                        <br>
                        <b>Rodzaj paliwa:</b> Benzyna
                        <br>
                        <b>Liczba miejsc:</b> 5
                        <br>
                        <b>Liczba drzwi:</b> 4/5
                        <br>
                        <b>Kolor:</b> Srebrny
                    </p>
                </div>
                <div class="flota-col">
                    <h1>Cennik</h1>
                    <p>
                        <b>1-7 dni:</b> 110 pln
                        <br>
                        <b>7-14 dni:</b> 90 pln
                        <br>
                        <b>Powyżej 14 dni:</b> 80 pln
                    </p>
                    <a href="" class="hero-btn red-btn">EXPLORE NOW</a>
                </div>
            </div>
            <div class="row">
                <div class="flota-col">
                    <img src="images/nissan-juke.png">
                </div>
                <div class="flota-col">
                    <h1>Nissan Juke</h1>
                    <p>
                        <b>Rok produkcji:</b> 2018
                        <br>
                        <b>Skrzynia biegów:</b> Manualna
                        <br>
                        <b>Pojemność:</b> 1500 cm3
                        <br>
                        <b>Moc silnika:</b> 111KM
                        <br>
                        <b>Rodzaj paliwa:</b> Benzyna
                        <br>
                        <b>Liczba miejsc:</b> 5
                        <br>
                        <b>Liczba drzwi:</b> 4/5
                        <br>
                        <b>Kolor:</b> Srebrny
                    </p>
                </div>
                <div class="flota-col">
                    <h1>Cennik</h1>
                    <p>
                        <b>1-7 dni:</b> 110 pln
                        <br>
                        <b>7-14 dni:</b> 90 pln
                        <br>
                        <b>Powyżej 14 dni:</b> 80 pln
                    </p>
                    <a href="" class="hero-btn red-btn">EXPLORE NOW</a>
                </div>
            </div>
        </section>
        <section class="footer">
            <h4>AUTO<span style="color: #f44336">rent</span></h4>
            <div class="row">
                <div class="footer-about">
                    <i class="fa fa-map-marker"></i>
                    <p>Konstantego Ciołkowskiego 1, 15-245 Białystok</p>
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