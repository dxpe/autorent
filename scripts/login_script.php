<?php
session_start();
require_once "connect_script.php";

$connection = @new mysqli($host, $db_user, $db_password, $db_name);

if ($connection->connect_errno!=0) {
    echo "Error: ".$connection->connect_errno;
} else {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    if ($result = @$connection->query(sprintf("SELECT * FROM users WHERE login='%s' AND password='%s'", mysqli_real_escape_string($connection, $login), mysqli_real_escape_string($connection, $password)))) {
        $user_count = $result->num_rows;
        if ($user_count > 0) {
            $row = $result->fetch_assoc();

            $_SESSION['user'] = $row['login'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['type'] = $row['type'];

            unset($_SESSION['blad']);

            $result->free_result();

            header('Location: ../index.php');
        } else {
            $_SESSION['blad'] = true;
            header('Location: ../login.php');
        }
    }
    $connection->close();
}

?>