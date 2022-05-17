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
            <h1>Kontakt</h1>
        </section>
        <section class="location">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2395.103838707131!2d23.151865416001158!3d53.108327900213425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ff9585596585b%3A0x9bc1abddd7202405!2sKampus%20Uniwersytetu%20w%20Bia%C5%82ymstoku!5e0!3m2!1spl!2spl!4v1652452221980!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <section class="contact-us">
            <div class="row">
                <div class="contact-col">
                    <div>
                        <i class="fa fa-home"></i>
                        <span>
                            <h5>Konstantego Ciołkowskiego 1</h5>
                            <p>15-245 Białystok</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-phone"></i>
                        <span>
                            <h5>692-137-420</h5>
                            <p>Pon-Pt: 8:00 - 18:00 <br> Sobota: 9:00 - 15:00</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-envelope-o"></i>
                        <span>
                            <h5>email@mail.com</h5>
                            <p>contact@autocars.pl</p>
                        </span>
                    </div>
                </div>
                <div class="contact-col">
                    <form action="">
                        <input type="text" placeholder="Imie" required>
                        <input type="email" placeholder="e-mail" required>
                        <input type="text" placeholder="Temat" required>
                        <textarea rows="8" placeholder="Wiadomość" required></textarea>
                        <button type="submit" class="hero-btn red-btn">Wyślij wiadomość</button>
                    </form>
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