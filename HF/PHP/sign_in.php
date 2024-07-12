<?php
include_once 'includes/connect.php';
?>

<!DOCTYPE html>
<html>
<!-- A bejelentkező oldal: -->

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Roboto&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bejelentkezés</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php"  ?>

        <main class="tartalom">

            <h1>Bejelentkezés</h1>

            <table>
                <tr>
                    <td>
                        <form action="includes/sign_in_script.php" method="POST">

                            <input type="text" name="username" placeholder="Felhasználónév"><br><br>

                            <input type="password" name="password" placeholder="Jelszó"><br><br>

                            <button type="submit" name="submit">Bejelentkezés!</button><br><br>
                        </form>


                        <?php
                        if (isset($_GET['signin'])) {
                            $signinCheck = $_GET['signin'];

                            switch ($signinCheck) {
                                case 'fail':
                                    echo "<p>Nem megfelelő felhasználónév vagy jelszó!</p>";
                                    break;

                                case "success":
                                    header("Location: index.php");
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