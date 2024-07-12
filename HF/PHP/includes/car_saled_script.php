<?php
    include_once "connect.php";
    $ad_id = mysqli_real_escape_string($conn, $_GET["saled"]);

    $sql = "UPDATE hirdetes SET eladas_datum = NOW() WHERE id = $ad_id;";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    header("Location: ../user_info.php?saled_success=true");
    exit();

?>