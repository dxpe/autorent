<?php
session_start();
if (isset($_FILES['upload'])) {
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    echo $_FILES['upload']['tmp_name'];

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $filename = $_FILES["upload"]["name"];
            $tempname = $_FILES["upload"]["tmp_name"];   
            $folder = "../images/".$filename;
            $sql = "INSERT INTO cars (car_name, car_year, gearbox, capacity, power, type, seats, doors, color, img, price_seven, price_fourteen, price_greater) VALUES ('test', 2019, 'manual', 1000, 100, 'benzyna', 4, '4/5', 'srebrny', '$filename', 100, 90, 80)";
            if(!$connection->query($sql)){
                echo "blad";
                echo $connection->error;
            }
            if (move_uploaded_file($tempname, $folder))  {
                    $msg = "Image uploaded successfully";
            } else {
                    $msg = "Failed to upload image";
            }
            echo $msg;
            $result = mysqli_query($connection, "SELECT * FROM cars");
            while ($row = mysqli_fetch_array($result)) {
                echo '<img src="../images/'.$row['img'].'" alt="">';
            }
            $row = $result->fetch_assoc();
            echo $row['img'];
            echo '<img src="../images/'.$row['img'].'" alt="">';
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
        <title>Upload test</title>
    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="upload" accept=".png, .gif, .jpg" required/>
            <input type="submit" value="Upload"/>
        </form>
    </body>
</html>