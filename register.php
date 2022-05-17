<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['email'])) {
    $succes = true;

    $user = $_POST['login'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $email_safe = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (strlen($user) > 10 || strlen($user) < 3) {
        $succes = false;
        $_SESSION['e_user'] = "Login musi zawierać od 3 do 10 znaków.";
    }

    if (ctype_alnum($user) == false) {
        $succes = false;
        $_SESSION['e_user'] = "Nick może składać się tylko z liter i cyfr.";
    }

    if (strcmp($password, $repeat_password) != 0) {
        $succes = false;
        $_SESSION['e_password'] = "Hasła muszą się zgadzać.";
    }

    if (filter_var($email_safe, FILTER_VALIDATE_EMAIL) == false || ($email != $email_safe)) {
        $succes = false;
        $_SESSION['e_email'] = "Niepoprawny adres email.";
    }

    require_once "scripts/connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $result_email = $connection->query("SELECT user_id FROM users WHERE email='$email'");
            $result_login = $connection->query("SELECT user_id FROM users WHERE login='$user'");
            if (!$result_email || !$result_login) {
                throw new Exception($connection->error);
            }

            $email_count = $result_email->num_rows;
            $login_count = $result_login->num_rows;

            if ($email_count > 0) {
                $succes = false;
                $_SESSION['e_email'] = "Istnieje już taki email!";
                unset($_SESSION['e_email']);
            }

            if ($login_count > 0) {
                $succes = false;
                $_SESSION['e_user'] = "Istnieje już taka nazwa użytkownika!";
                unset($_SESSION['e_user']);
            }

            if ($succes == true) {
                if ($connection->query("INSERT INTO users (login, password, name, surname, email, phone, type) VALUES ('$user', '$password', '$name', '$surname', '$email', '$phone', 0)")){
                    session_destroy();
                    header('Location: index.php');
                } else {
                    throw new Exception($connection->error);
                }
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
                    <form method="post">
                        <h2>Rejestracja</h2>
                        <input type="text" placeholder="Nazwa użytkownika" name="login">
                        <?php
                            if (isset($_SESSION['e_user'])) {
                                echo '<span style="font-size: 10px; color: red;">'.$_SESSION['e_user'].'</span>';
                                unset($_SESSION['e_user']);
                            }
                        ?>
                        <input type="email" placeholder="Adres e-mail" name="email">
                        <?php
                            if (isset($_SESSION['e_email'])) {
                                echo '<span style="font-size: 10px; color: red;">'.$_SESSION['e_email'].'</span>';
                                unset($_SESSION['e_email']);
                            }
                        ?>
                        <input type="password" placeholder="Hasło" name="password">
                        <input type="password" placeholder="Powtórz hasło" name="repeat_password">
                        <?php
                            if (isset($_SESSION['e_password'])) {
                                echo '<span style="font-size: 10px; color: red;">'.$_SESSION['e_password'].'</span>';
                                unset($_SESSION['e_password']);
                            }
                        ?>
                        <input type="text" placeholder="Imie" name="name">
                        <input type="text" placeholder="Nazwisko" name="surname">
                        <input type="text" placeholder="Numer telefonu" name="phone">
                        <input type="submit" value="Zarejestruj">
                        <p style="font-size: 20px">Masz już konto? <a href="login.php" style="color: #fff">Zaloguj się</a></p>
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
<html>