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
    <title>index</title>
    <link rel="stylesheet" type="text/css" href="1.css">
</head>

<body>

    <div class="weblap">

        <?php include "includes/header.php" ?>

        <main class="tartalom">
            <h1 id="index">Hírek</h1>
            <p><a href="https://villanyautosok.hu/" target=”_blank”>villanyautosok.hu</a><br><a href="https://totalcar.hu/" target=”_blank”>totalcar.hu</a><br><a href="https://www.vezess.hu/" target=”_blank”>vezess.hu</a></p>
        </main>

        <footer class="lablec">
            <?php include "includes/footer.php" ?>
        </footer>

    </div>

</body>

</html>