<?php
session_start();
// if ($_SESSION['type'] == 0) {
//     header('Location: index.php');
// }

if (isset($_FILES['upload'])) {
    require_once "scripts/connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $filename = $_FILES["upload"]["name"];
            $tempname = $_FILES["upload"]["tmp_name"];
            $folder = "images/".$filename;

            $car_name = $_POST['car_name'];
            $car_year = $_POST['car_year'];
            $gearbox = $_POST['gearbox'];
            $capacity = $_POST['capacity'];
            $power = $_POST['power'];
            $type = $_POST['type'];
            $seats = $_POST['seats'];
            $doors = $_POST['doors'];
            $color = $_POST['color'];
            $price_seven = $_POST['price_seven'];
            $price_fourteen = $_POST['price_fourteen'];
            $price_greater = $_POST['price_greater'];

            $sql = "INSERT INTO cars (car_name, car_year, gearbox, capacity, power, type, seats, doors, color, img, price_seven, price_fourteen, price_greater) VALUES ('$car_name', '$car_year', '$gearbox', '$capacity', '$power', '$type', '$seats', '$doors', '$color', '$filename', '$price_seven', '$price_fourteen', '$price_greater')";
            if(!$connection->query($sql)){
                echo "blad";
                echo $connection->error;
            } else {
                if (move_uploaded_file($tempname, $folder))  {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
                echo $msg;
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo "Blad serwera ".$e;
    }
} else if (isset($_POST['car_name_delete'])) {
    require_once "scripts/connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $car_name = $_POST['car_name_delete'];
            $sql = "DELETE FROM cars WHERE car_name = '$car_name'";
            if(!$connection->query($sql)){
                echo "blad";
                echo $connection->error;
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo "Blad serwera ".$e;
    }
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
                    ?>
                </h1>
                <?php
                    if ($_SESSION['type'] != 0) {
                        echo '<a href="staff_panel_rents.php" class="hero-btn">WYPOŻYCZENIA KLIENTÓW</a>';
                    }
                ?>
            </nav>
        </section>
        <section class="selling">
            <div class="row">
                <div class="selling-col">
                    <h3>DODAJ AUTO</h3>
                    <div class="add-box">
                        <form method="post" enctype="multipart/form-data">
                            <input type="text" style="color: black" placeholder="Nazwa samochodu" name="car_name" required>
                            <input type="number" style="color: black" placeholder="Rocznik" name="car_year">
                            <input type="text" style="color: black" placeholder="Skrzynia biegów" name="gearbox" required>
                            <input type="number" style="color: black" placeholder="Pojemność" name="capacity" required>
                            <input type="number" style="color: black" placeholder="Moc silnika" name="power" required>
                            <input type="text" style="color: black" placeholder="Rodzaj paliwa" name="type" required>
                            <input type="number" style="color: black" placeholder="Liczba miejsc" name="seats" required>
                            <input type="text" style="color: black" placeholder="Liczba drzwi" name="doors" required>
                            <input type="text" style="color: black" placeholder="Kolor" name="color" required>
                            <input type="number" style="color: black" placeholder="Cena 1-7 dni" name="price_seven" required>
                            <input type="number" style="color: black" placeholder="Cena 7-14 dni" name="price_fourteen" required>
                            <input type="number" style="color: black" placeholder="Cena powyżej 14 dni" name="price_greater" required>
                            Plik ze zdjęciem
                            <input type="file" name="upload" accept=".png, .gif, .jpg" required/>
                            <input type="submit" value="Dodaj auto">
                        </form>
                    </div>
                </div>
                <div class="selling-col">
                    <h3>USUŃ AUTO</h3>
                    <div class="add-box">
                        <form method="post" enctype="multipart/form-data">
                            <input type="text" style="color: black" placeholder="Nazwa samochodu" name="car_name_delete" required>
                            <input type="submit" value="Usuń auto">
                        </form>
                    </div>
                </div>
                <?php
                require_once ("scripts/functions.php");
                adminUserChange();
                userRentAdd();
                userRentDel();
                ?>
            </div>
        </section>
        <section class="testimonials">
            <h1>Wiadomości klientów</h1>
            <?php
            require_once "scripts/functions.php";
            showMessages();
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