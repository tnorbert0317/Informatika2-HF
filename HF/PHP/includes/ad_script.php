<?php
    session_start();
    include_once 'connect.php';

    if($_SESSION["isSignedin"] == true) {

        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);

        //csak akkor fusson le ez a kód ha tényleg rákattintottak a "Hírdetésfeladás!" gombra
        if(isset($_POST['ad'])) {
            if(isset($_SESSION['modells'])) {
                if(is_numeric($_SESSION['modells']) == true) {
                    if(empty($price) || empty($year)) {
                        header("Location: ../ad.php?ad=empty");
                        exit();
                    }
                    else {
                        $modell = $_SESSION['modells'];
                        $sql = "select * from auto_modellek where id = '$modell';";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        $array = explode("-", $row['gyartas_kezdete']);
                        if($year < $array[0]) {
                            header("Location: ../ad.php?ad=year");
                            exit();
                        }
                        //minden szükséges mező jól ki van töltve, a hírdetésfeladás lehetséges:
                        else {
                            $user = $_SESSION['user'];
                            $sql = "INSERT INTO hirdetes (feltoltes_datum, felhasznalo_id, leiras, ar, evjarat, auto_modellek_id) VALUES (NOW(), (SELECT id FROM felhasznalo WHERE felhasznalonev = '$user'), '$desc', $price, $year, $modell);";
                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                            header("Location: ../user_info.php?ad=success");
                            exit();
                        }    
                    }
                }
                else {
                    header("Location: ../ad.php?ad=notnum");
                    exit();
                }
            }
            else {
                header("Location: ../ad.php?ad=modell");
                exit();
            }
        }
    }

?>