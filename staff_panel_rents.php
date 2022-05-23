<?php
session_start();
// if ($_SESSION['type'] == 0) {
//     header('Location: index.php');
// }
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
                <h1>
                    <?php
                    echo $_SESSION['user'];
                    echo "<br>"
                    ?>
                    WYPOŻYCZENIA KLIENTÓW
                </h1>
                <?php
                    if ($_SESSION['type'] != 0) {
                        echo '<a href="staff_panel.php" class="hero-btn">POWRÓT</a>';
                    }
                ?>
            </nav>
        </section>
        <section class="flota">
            <?php
            require_once "scripts/functions.php";
            showRentsAll();
            ?>
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