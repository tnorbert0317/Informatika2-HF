<?php
include_once 'includes/connect.php';
session_start();
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
    <title>felhasználó</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <?php
    function sql_select($conn, $col)
    {
        $conn;
        $user = $_SESSION["user"];
        $sql = "select * from felhasznalo where felhasznalonev = '$user';";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        echo $result[$col];
    }

    if (isset($_GET["ad"])) {
        if ($_GET['ad'] == "success") {
            echo '<script>alert("Sikeres hirdetésfeladás!")</script>';
        }
    }

    if (isset($_GET["saled_success"])) {
        if ($_GET['saled_success'] == "true") {
            echo '<script>alert("Rögzítettük az eladás dátumát!")</script>';
        }
    }

    if (isset($_GET["edit"])) {
        if ($_GET['edit'] == "success") {
            echo '<script>alert("Sikeres szerkesztés!")</script>';
        }
    }
    ?>

    <div class="weblap">

        <?php include "includes/header.php"  ?>

        <main class="tartalom">

            <div>
                <h1>Felhasználói adatok</h1>

                <table class="user_data">
                    <tr>
                        <td>Név</td>
                        <td><?php $name = sql_select($conn, "nev"); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php $email = sql_select($conn, "email"); ?></td>
                    </tr>
                    <tr>
                        <td>Jelszó</td>
                        <td><?php $password = sql_select($conn, "jelszo"); ?></td>
                    </tr>
                    <tr>
                        <td><br><a href="user_data_update.php"><button>Adatok módosítása</button></a></td>
                    </tr>
                </table>
            </div>

            <div>
                <h1>Hirdetéseim</h1>

                <?php
                $user = $_SESSION['user'];
                $sql = "SELECT *, hirdetes.id hirdetes_id FROM hirdetes JOIN auto_modellek ON auto_modellek_id = auto_modellek.id JOIN auto_markak ON auto_markak_id = auto_markak.id WHERE felhasznalo_id = (SELECT id FROM felhasznalo WHERE felhasznalonev = '$user');";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <table>
                            <tr>
                                <td>
                                    <?php echo "Márka:"; ?>
                                </td>
                                <td>
                                    <?php echo $rows["marka_nev"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo "Modell:"; ?>
                                </td>
                                <td>
                                    <?php echo $rows["modell_nev"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo "Évjárat: "; ?>
                                </td>
                                <td>
                                    <?php echo $rows["evjarat"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo "Ár:"; ?>
                                </td>
                                <td>
                                    <?php echo $rows["ar"] . " Ft"; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php echo "Leírás:"; ?>
                                </td>
                                <td>
                                    <?php echo $rows["leiras"]; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php
                                    $ad_id = $rows['hirdetes_id'];
                                    $sql_ad = "SELECT * FROM hirdetes WHERE id = $ad_id;";
                                    $result_ad = mysqli_query($conn, $sql_ad);
                                    $row_ad = mysqli_fetch_array($result_ad);
                                    if ($row_ad["eladas_datum"] != null) {
                                        echo "Eladás dátuma:";
                                    } else {
                                        echo '<form action="ad_update.php" method="get">';
                                        echo '<button type="submit" name="edit" value=' . $ad_id . '>Szerkesztés</button>';
                                        echo '</form>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row_ad["eladas_datum"] != null) {
                                        echo $row_ad["eladas_datum"];
                                    } else {
                                        echo '<form action="includes/car_saled_script.php" method="get">';
                                        echo '<button type="submit" name="saled" value=' . $ad_id . '>Eladva!</button>';
                                        echo '</form>';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </tr>
                <?php endwhile; ?>

            </div>

        </main>

        <footer class="lablec">
            <?php include "includes/footer.php" ?>
        </footer>

    </div>

</body>

</html>