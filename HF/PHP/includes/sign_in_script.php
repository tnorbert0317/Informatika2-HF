<?php
    //Hibakezelés és a belépés megvalósítása:
    session_start();
    $_SESSION["isSignedin"] = false;
    include_once 'connect.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //csak akkor fusson le ez a kód ha tényleg rákattintottak a "bejelentkezés" gombra
    if(isset($_POST['submit'])) {
        //leellenőrizzük, hogy minden rubrika ki lett-e töltve
        if(empty($username) || empty($password)) {
            header("Location: ../sign_in.php?signin=fail");
            exit();
        }
        else {
            $conn;
            $sql = "select * from felhasznalo where felhasznalonev = '$username';";
            $result = mysqli_query($conn, $sql);

            //A felhasználónév szerepel-e az adatbázisban:
            if(mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                if($row["jelszo"] == $password) {
                    $_SESSION["isSignedin"] = true;
                    $_SESSION["user"] = $username;
                    header("Location: ../sign_in.php?signin=success");
                }
            }
        }
    }

?>