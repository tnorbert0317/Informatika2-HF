<?php
include_once 'includes/connect.php';
?>

<!DOCTYPE html>
<html>
<!-- A regisztrációs oldal: -->

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regisztráció</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php"  ?>

        <main class="tartalom">

            <h1>Regisztráció</h1>

            <table>
                <tr>
                    <td>
                        <br>
                        <p>Az összes mezőt töltse ki!</p><br>

                        <form action="includes/sign_up_script.php" method="POST">
                            <?php
                            if (isset($_GET['name'])) {
                                $name = $_GET['name'];
                                echo '<input type="text" name="name" placeholder="Név" value="' . $name . '">';
                            } else {
                                echo '<input type="text" name="name" placeholder="Név">';
                            }
                            echo "  (Kis és nagybetűk, maximum 45 karakter)" . "<br><br>";
                            if (isset($_GET['email'])) {
                                $email = $_GET['email'];
                                echo '<input type="text" name="email" placeholder="E-mail" value="' . $email . '">';
                            } else {
                                echo '<input type="text" name="email" placeholder="E-mail">';
                            }
                            echo "  (Érvényes e-mail, maximum 45 karakter)" . "<br><br>";
                            if (isset($_GET['username'])) {
                                $username = $_GET['username'];
                                echo '<input type="text" name="username" placeholder="Felhasználónév" value="' . $username . '">';
                            } else {
                                echo '<input type="text" name="username" placeholder="Felhasználónév">';
                            }
                            echo "  (Maximum 45 karakter)" . "<br><br>";
                            ?>
                            <input type="password" name="password" placeholder="Jelszó"> (Maximum 45 karakter)
                            <br><br>
                            <button type="submit" name="submit">Regisztrálok!</button>
                        </form>

                        <?php
                        if (isset($_GET['signup'])) {
                            $signupCheck = $_GET['signup'];

                            switch ($signupCheck) {
                                case 'empty':
                                    echo "<p>Nem töltötte ki az összes mezőt!</p>";
                                    break;

                                case 'email':
                                    echo "<p>Helytelen e-mail cím!</p>";
                                    break;

                                case 'name':
                                    echo "<p>Nem megfelelő karakterekt használt a név megadásakor!</p>";
                                    break;

                                case 'username':
                                    echo "<p>A felhasználónév már foglalt!</p>";
                                    break;

                                case 'success':
                                    echo "Sikeres regisztráció!";
                                    break;
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