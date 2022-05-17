<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
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
                            <a href="login.php">LOGIN</a>
                        </li>
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
            <div class="text-box">
                <div class="singin">
                    <form action="scripts/login_script.php" method="post">
                        <h2>Zaloguj się</h2>
                        <input type="text" placeholder="Nazwa użytkownika" name="login">
                        <input type="password" placeholder="Hasło" name="password">
                        <input type="submit" value="Zaloguj">
                        <?php
                            if(isset($_SESSION['blad'])){
                                echo '<p style="font-size: 20px;">Nieprawidłowy login lub hasło</p>';
                            }
                        ?>
                        <p style="font-size: 20px">Nie masz konta? <a href="register.php" style="color: #fff">Zarejestruj się</a></p>
                    </form>
                </div>
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