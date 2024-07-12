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
    <title>keresés</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php";  ?>

        <main class="tartalom">

            <h1>Keresés modell alapján</h1>

            <?php $var = "search_modell.php";
            include "includes/modell_search.php"; ?>
            <?php
            $result = false;
            if (isset($_SESSION["order"])) {
                switch ($_SESSION["order"]) {
                    case "any":
                        $ORDER_BY = "ORDER BY hirdetes_id ASC";
                        break;
                    case "priceASC":
                        $ORDER_BY = "ORDER BY ar ASC";
                        break;
                    case "priceDESC":
                        $ORDER_BY = "ORDER BY ar DESC";
                        break;
                    case "yearASC":
                        $ORDER_BY = "ORDER BY evjarat ASC";
                        break;
                    case "yearDESC":
                        $ORDER_BY = "ORDER BY evjarat DESC";
                        break;
                    case "wltpASC":
                        $ORDER_BY = "ORDER BY wltp_hatotav ASC";
                        break;
                    case "yearDESC":
                        $ORDER_BY = "ORDER BY wltp_hatotav DESC";
                        break;
                    case "batteryASC":
                        $ORDER_BY = "ORDER BY akku_meret_kwh ASC";
                        break;
                    case "batteryDESC":
                        $ORDER_BY = "ORDER BY akku_meret_kwh DESC";
                        break;
                }
                if (isset($_GET["cars"])) {
                    $var = $_GET["cars"];
                    if ($var == "any") {
                        $sql = "SELECT *, hirdetes.id hirdetes_id FROM hirdetes JOIN auto_modellek ON auto_modellek_id = auto_modellek.id JOIN auto_markak ON auto_markak_id = auto_markak.id JOIN felhasznalo ON felhasznalo_id = felhasznalo.id WHERE eladas_datum IS NULL $ORDER_BY;";
                        $result = mysqli_query($conn, $sql);
                    }
                }
                if (isset($_GET["modells"])) {
                    $var = $_GET["modells"];
                    if (strpos($var, "#car") == false) {
                        $sql = "SELECT *, hirdetes.id hirdetes_id FROM hirdetes JOIN auto_modellek ON auto_modellek_id = auto_modellek.id JOIN auto_markak ON auto_markak_id = auto_markak.id JOIN felhasznalo ON felhasznalo_id = felhasznalo.id WHERE auto_modellek_id = $var AND eladas_datum IS NULL $ORDER_BY;";
                        $result = mysqli_query($conn, $sql);
                    } else {
                        $array = explode("#", $var);
                        $var = $array[0];
                        $sql = "SELECT *, hirdetes.id hirdetes_id FROM hirdetes JOIN auto_modellek ON auto_modellek_id = auto_modellek.id JOIN auto_markak ON auto_markak_id = auto_markak.id JOIN felhasznalo ON felhasznalo_id = felhasznalo.id WHERE auto_markak_id = $var AND eladas_datum IS NULL $ORDER_BY;";
                        $result = mysqli_query($conn, $sql);
                    }
                }
            }
            $i = 0;
            ?>

            <?php
            if ($result != false && isset($_SESSION["order"])) {
                include_once 'includes/search_result.php';
            }
            ?>
            <?php if ($result != false) {
                unset($_SESSION["order"]);
            } ?>

        </main>

        <footer class="lablec">
            <?php include "includes/footer.php" ?>
        </footer>

    </div>

</body>

</html>