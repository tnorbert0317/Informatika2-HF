<?php
    include_once 'connect.php';
    session_start();
    if($_SESSION["isSignedin"] == true) {

        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        if(isset($_POST['ad_edit'])) {        
            if(empty($_POST['price'])) {
                header("Location: ../ad_update.php?edit_fail=empty");
                exit();
            }
            else {
                $ad_id = $_POST["ad_edit"];
                $sql = "UPDATE hirdetes SET ar = $price, leiras = '$desc' WHERE ID = $ad_id;";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
                header("Location: ../user_info.php?edit=success");
                exit();
            }
        }
        else {
            header("Location: ../user_info.php");
            exit();
        }
    }
?>