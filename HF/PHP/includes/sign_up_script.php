<?php
    //Hibakezelés és a regisztráció megvalósítása:
    session_start();
    $_SESSION["isSignedin"] = false;
    include_once 'connect.php';

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //csak akkor fusson le ez a kód ha tényleg rákattintottak a "regisztrálok" gombra
    if(isset($_POST['submit'])) {
        //leellenőrizzük, hogy minden rubrika ki lett-e töltve
        if(empty($name) || empty($email) || empty($username) || empty($password)) {
            header("Location: ../sign_up.php?signup=empty");
            exit();
        }
        else {
            //e-mail cím helyességének ellenőrzése
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../sign_up.php?signup=email&name=$name&username=$username");
                exit();
            }
            else {
                //név karakterei megfelelőek-e
                if(!preg_match('/^[a-zA-Z\söüóőúéáűí]{1,45}$/', $name)) {
                    header("Location: ../sign_up.php?signup=name&email=$email&username=$username");
                    exit();
                }
                //felhasználónév nem foglalt-e
                else {
                    $conn;
                    $sql = "select felhasznalonev from felhasznalo where felhasznalonev = '$username';";
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) > 0) {
                        header("Location: ../sign_up.php?signup=username&name=$name&email=$email");
                        exit();
                    }
                    //sikeres regisztáció
                    else {
                        $sql = "INSERT INTO felhasznalo (nev, email, felhasznalonev, jelszo) VALUES ('$name', '$email', '$username', '$password');";
                        mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        $_SESSION["isSignedin"] = true;
                        $_SESSION["user"] = $username;
                        header("Location: ../sign_up.php?signup=success");
                    }
                }
            }
        }
    }

?>