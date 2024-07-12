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
    <title>hirdetésszerkesztés</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php"  ?>

        <main class="tartalom">

            <?php
            if (isset($_GET["edit"])) {
                $edit_id = mysqli_real_escape_string($conn, $_GET["edit"]);
                $sql = "SELECT *, hirdetes.id hirdetes_id FROM hirdetes JOIN auto_modellek ON auto_modellek_id = auto_modellek.id JOIN auto_markak ON auto_markak_id = auto_markak.id HAVING hirdetes_id = $edit_id;";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo '<h1>' . $row["evjarat"] . ' ' . $row["marka_nev"] . ' ' . $row["modell_nev"] . ' hirdetésének szerkesztése</h1>';
            } else {
                header("Location: ../user_info.php");
                exit();
            }
            ?>
            <table>
                <tr>
                    <td>
                        <form action="includes/ad_edit_script.php" method="post">
                            <textarea name="desc" cols="30" rows="10" placeholder="Leírás"><?php echo $row["leiras"]; ?></textarea><br><br>
                            <?php $num = $row["ar"];
                            echo '<input name="price" type="number" min="0" placeholder="Ár (Ft)" step="1" value=' . $num . '>'; ?>
                            <?php echo '<button type="submit" name="ad_edit" value=' . $edit_id . '>Szerkesztés!</button>'; ?>
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