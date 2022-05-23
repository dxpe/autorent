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

function showMessages() {
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $result = mysqli_query($connection, "SELECT * FROM contact");
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="row">';
                echo '<div class="testimonial-col" style="flex-basis: 100%;">';
                echo '<div>';
                echo '<p><b>Od: </b>'.$row['name'].' <b>Temat: </b>'.$row['subject'].' <b>Email: </b>'.$row['email'].' </p>';
                echo '<h3>'.$row['msg'].'</h3>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            $connection->close();
        }
    } catch (Exception $e) {
        echo "Blad serwera ".$e;
    }
}

function adminUserChange() {
    if ($_SESSION['type'] == 2) {
        echo<<<END
                <div class="selling-col">
                    <h3>ZMIEŃ UPRAWNIENIA UŻYTKOWNIKA</h3>
                    <div class="add-box">
                        <form action="scripts/user_change_script.php" method="post">
                            <input type="text" style="color: black" placeholder="Nazwa użytkownika" name="user" required>
                            <input type="number" style="color: black" placeholder="Flaga" name="type" required>
                            <input type="submit" value="Zmień flagę">
                            <p>
                                Flagi:
                                <br>
                                0 - użytkownik
                                <br>
                                1 - pracownik
                                <br>
                                2 - admin
                            </p>
                        </form>
                    </div>
                </div>
        END;
    }
}

function userRentAdd() {
        echo<<<END
                <div class="selling-col">
                    <h3>DODAJ WYPOŻYCZENIE</h3>
                    <div class="add-box">
                        <form method="post" action="scripts/user_rent_script.php">
                            <input type="text" style="color: black" placeholder="Nazwa samochodu" name="car_name_add" required>
                            <input type="text" style="color: black" placeholder="Nazwa użytkownika" name="user_add" required>
                            <input type="submit" value="Dodaj">
                        </form>
                    </div>
                </div>
        END;
}

function userRentDel() {
    echo<<<END
            <div class="selling-col">
                <h3>USUŃ WYPOŻYCZENIE</h3>
                <div class="add-box">
                    <form method="post" action="scripts/user_rent_script.php">
                        <input type="text" style="color: black" placeholder="Nazwa samochodu" name="car_name_del" required>
                        <input type="text" style="color: black" placeholder="Nazwa użytkownika" name="user_del" required>
                        <input type="submit" value="Usuń">
                    </form>
                </div>
            </div>
    END;
}

function showRents() {
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $user = $_SESSION['u_id'];
            $result = mysqli_query($connection, "SELECT * FROM cars c JOIN rents r on c.car_id = r.car_id JOIN users u on u.user_id = r.user_id WHERE u.user_id = '$user'");
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

function showRentsAll() {
    require_once "connect_script.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    try {
        $connection = @new mysqli($host, $db_user, $db_password, $db_name);
        if ($connection->connect_errno!=0) {
            throw new Exception(mysqli_connect_errno());
        } else {
            $result = mysqli_query($connection, "SELECT * FROM rents, cars, users WHERE rents.user_id = users.user_id AND rents.car_id = cars.car_id");
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
                    echo '<h1>Wypozyczony przez: '.$row['login'].'</h1>';
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