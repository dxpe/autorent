<?php
    session_start();
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    if(isset($_POST['user'])) {
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                $user = $_POST['user'];
                $type = $_POST['type'];
                $sql = "UPDATE users SET type = '$type' WHERE users.login = '$user'";
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
    header("Location: ../staff_panel.php")
?>