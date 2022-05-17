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
        <!-- https://coolors.co/353535-3c6e71-ffffff-d9d9d9-284b63 -->
    </head>
    <body>
        <section class="header">
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
            <div class="text-box">
                <h1>Wypożyczalnia aut</h1>
                <p>Bez limitu kilometrów. <br> Oferty dopasowane do <span style="color: #f44336; font-weight: 600;"> Twoich </span> potrzeb</p>
                <a href="flota.php" class="hero-btn">Sprawdź ofertę</a>
            </div>
        </section>
        <section class="selling">
            <h1>DLACZEGO AUTO<span style="color: #f44336">rent</span>?</h1>
            <p>Zajmujemy się wynajmowaniem samochodów od wielu lat. Nasi klienci są zawsze zadowoleni. <br>
                Wybierz wygodniejszy środek transportu dla siebie lub swoich pracowników.
                Wypożycz samochód na firmę i płać tylko za okres, w którym jest Ci niezbędny.</p>
            <div class="row">
                <div class="selling-col">
                    <h3>NISKIE KOSZTA WYNAJMU AUT</h3>
                    <p>Gwarantujemy konkurencyjne ceny.</p>
                </div>
                <div class="selling-col">
                    <h3>PRZEJRZYSTA UMOWA WYNAJMU</h3>
                    <p>Nie potrzebujesz prawnika, żeby zrozumieć umowę najmu samochodu.</p>
                </div>
                <div class="selling-col">
                    <h3>AUTA BEZ LIMITU KILOMETRÓW</h3>
                    <p>Ciesz się jazdą nie martwiąc się, że przekroczysz limit kilometrów!</p>
                </div>
            </div>
        </section>
        <section class="cars">
            <h1>NASZE AUTA</h1>
            <div class="row">
                <div class="cars-col">
                    <img src="images/toyota-yaris.png" href="google.com" alt="">
                    <div class="layer">
                        <h3>Toyota Yaris</h3>
                        <a href="flota.php" class="car-btn">Sprawdź ofertę</a>
                    </div>
                </div>
                <div class="cars-col">
                    <img src="images/citroen-c3.png" alt="">
                    <div class="layer">
                        <h3>Citroen C3</h3>
                        <a href="flota.php" class="car-btn">Sprawdź ofertę</a>
                    </div>
                </div>
                <div class="cars-col">
                    <img src="images/nissan-juke.png" alt="">
                    <div class="layer">
                        <h3>Nissan Juke</h3>
                        <a href="flota.php" class="car-btn">Sprawdź ofertę</a>
                    </div>
                </div>
            </div>
            <a href="flota.php" class="hero-btn red-btn">Zobacz więcej</a>
        </section>
        <section class="testimonials">
            <h1>OPINIE KLIENTÓW</h1>
            <div class="row">
                <div class="testimonial-col">
                    <img src="images/user1.png">
                    <div>
                        <p>Piorunująca szybkość dostawy samochodu pod drzwi!</p>
                        <h3>Reeve Tesla</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>
                </div>
                <div class="testimonial-col">
                    <img src="images/user2.png">
                    <div>
                        <p>Super naprawde swietne samochody</p>
                        <h3>Chad</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </section>
        <section class="contactus">
            <h1>Masz pytania odnośnie naszych usług?</h1>
            <a href="contact.php" class="hero-btn">SKONTAKTUJ SIĘ Z NAMI</a>
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