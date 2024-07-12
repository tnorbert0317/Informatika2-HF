<?php
include_once 'includes/connect.php';
?>

<!DOCTYPE html>

<html lang="hu">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adatszerkesztés</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php"  ?>

        <main class="tartalom">

            <h1>Felhasználói adatok módosítása</h1><br><br>

            <table>
                <tr>
                    <td>
                        <p>Csak azok az adatok fognak módosulni, ahol a mező ki van töltve!</p><br>
                        <form action="includes/user_data_update_script.php" method="post">

                            <input type="text" name="new_name" placeholder="Új név"><br><br>
                            <input type="text" name="new_email" placeholder="Új email"><br><br>
                            <input type="text" name="new_username" placeholder="Új felhasználónév"><br><br>
                            <input type="password" name="new_password" placeholder="Új jelszó"><br><br>

                            <button type="submit" name="edit">Módosítás!</button>

                        </form>

                        <?php
                        if (isset($_GET['update_error'])) {
                            $updateCheck = $_GET['update_error'];

                            if ($updateCheck == 'fail_empty') {
                                echo "<p>Nem történt módosítás, mert egyetlen mező sem volt kitöltve!</p>";
                            }

                            if (!(strpos($updateCheck, "name") === false)) {
                                echo "<p>Az új név nem megfelelő! (Csak kis és nagybetűk engedélyezettek, maximális hossz 45 karakter.)</p>";
                            }

                            if (!(strpos($updateCheck, "email") === false)) {
                                echo "<p>Az új e-mail nem megfelelő! (Csak érvényes e-mai címek engedélyezettek, maximális hossz 45 karakter.)</p>";
                            }

                            if (!(strpos($updateCheck, "lenght") === false)) {
                                echo "<p>Az új felhasználónév nem megfelelő! (Maximális hossz 45 karakter.)</p>";
                            }

                            if (!(strpos($updateCheck, "exist") === false)) {
                                echo "<p>Az új felhasználónév már foglalt!</p>";
                            }

                            if (!(strpos($updateCheck, "password") === false)) {
                                echo "<p>Az új jelszó nem megfelelő! (Maximális hossz 45 karakter.)</p>";
                            }
                        }

                        if (isset($_GET['update_success'])) {
                            $updateCheck = $_GET['update_success'];

                            if (!(strpos($updateCheck, "name") === false)) {
                                echo "<p>A név módosítása sikeresen megtörtént!</p>";
                            }

                            if (!(strpos($updateCheck, "email") === false)) {
                                echo "<p>Az e-mail módosítása sikeresen megtörtént!</p>";
                            }

                            if (!(strpos($updateCheck, "user") === false)) {
                                echo "<p>A felhasználónév módosítása sikeresen megtörtént!</p>";
                            }

                            if (!(strpos($updateCheck, "password") === false)) {
                                echo "<p>A jelszó módosítása sikeresen megtörtént!</p>";
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>

        </main>

        <footer class="lablec">
            <?php include "includes/footer.php" ?>
        </footer>

    </div>

</body>

</html>