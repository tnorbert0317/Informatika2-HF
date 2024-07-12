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
    <title>hirdetésfeladás</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php";  ?>

        <main class="tartalom">

            <h1>Hirdetésfeladás</h1>

            <?php
            $var = "ad.php";
            include "includes/modell_search.php";
            if (isset($_GET['modells'])) {
                $_SESSION['modells'] = $_GET['modells'];
            }
            ?>
            <br>
            <table>
                <tr>
                    <td>
                        <form action="includes/ad_script.php" method="post">
                            <textarea name="desc" cols="30" rows="10" placeholder="Leírás"></textarea><br><br>
                            <input name="price" type="number" min="0" placeholder="Ár (Ft)" step="1">
                            <select name="year">
                                <option value="" disabled selected>Évjárat</option>
                                <?php
                                $modell = $_SESSION['modells'];
                                $sql = "select * from auto_modellek where id = '$modell';";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result);
                                $array = explode("-", $row['gyartas_kezdete']);
                                for ($i = $array[0]; $i <= date("Y"); $i++) {
                                    echo "<option value=$i>$i</option>";
                                }
                                ?>
                            </select>
                            <br><br><button type="submit" name="ad">Hirdetésfeladás!</button>
                        </form>
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