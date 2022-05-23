<?php
    session_start();
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
    if(isset($_POST['car_name_del'])) {
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                $user = $_POST['user_del'];
                $car = $_POST['car_name_del'];
                $sql = "DELETE FROM rents WHERE user_id = (SELECT user_id FROM users WHERE login = '$user') and car_id = (SELECT car_id FROM cars WHERE car_name = '$car')";
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

    if(isset($_POST['car_name_add'])) {
        try {
            $connection = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($connection->connect_errno!=0) {
                throw new Exception(mysqli_connect_errno());
            } else {
                $user = $_POST['user_add'];
                $car = $_POST['car_name_add'];
                $sql = "INSERT INTO rents (id, user_id, car_id) VALUES (NULL, (SELECT user_id FROM users WHERE name = '$user'), (SELECT car_id FROM cars WHERE car_name = '$car'))";
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