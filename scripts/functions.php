<?php
function showCar() {
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $result = mysqli_query($connection, "SELECT * FROM cars");
            while ($row = mysqli_fetch_array($result)) {
                    echo '<div class="row">';
                    echo '<div class="flota-col">';
                    echo '<img src="images/'.$row['img'].'" alt="">';
                    echo '</div>';
                    echo '<div class="flota-col">';
                    echo '<h1>'.$row['car_name'].'</h1>';
                    echo '<p>';
                    echo '<b>Rok produkcji:</b> '.$row['car_year'].'';
                    echo '<br>';
                    echo '<b>Skrzynia biegów:</b> '.$row['gearbox'].'';
                    echo '<br>';
                    echo '<b>Pojemność:</b> '.$row['capacity'].' cm3';
                    echo '<br>';
                    echo '<b>Moc silnika:</b> '.$row['power'].'KM';
                    echo '<br>';
                    echo '<b>Rodzaj paliwa:</b> '.$row['type'].'';
                    echo '<br>';
                    echo '<b>Liczba miejsc:</b> '.$row['seats'].'';
                    echo '<br>';
                    echo '<b>Liczba drzwi:</b> '.$row['doors'].'';
                    echo '<br>';
                    echo '<b>Kolor:</b> '.$row['color'].'';
                    echo '</p>';
                    echo '</div>';
                    echo '<div class="flota-col">';
                    echo '<h1>Cennik</h1>';
                    echo '<p>';
                    echo '<b>1-7 dni:</b> '.$row['price_seven'].' pln';
                    echo '<br>';
                    echo '<b>7-14 dni:</b> '.$row['price_fourteen'].' pln';
                    echo '<br>';
                    echo '<b>Powyżej 14 dni:</b> '.$row['price_greater'].' pln';
                    echo '</p>';
                    echo '<a href="contact.php" class="hero-btn red-btn">Zamów już teraz!</a>';
                    echo '</div>';
                    echo '</div>';
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo "Blad serwera ".$e;
    }
}
?>