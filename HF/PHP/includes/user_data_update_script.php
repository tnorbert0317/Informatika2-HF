<?php
include_once 'connect.php';
session_start();

function sql_update($conn, $col, $new_value) {
    $conn;
    $user = $_SESSION["user"];
    $sql = "update felhasznalo set $col = '$new_value' where felhasznalonev = '$user';";
    return mysqli_query($conn, $sql);
}

function username_exist($conn, $username) {
    $conn;
    $sql = "select * from felhasznalo where felhasznalonev = '$username';";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        return true;
    }

    return false;
}

$new_name = mysqli_real_escape_string($conn, $_POST['new_name']);
$new_email = mysqli_real_escape_string($conn, $_POST['new_email']);
$new_username = mysqli_real_escape_string($conn, $_POST['new_username']);
$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

if(isset($_POST['edit'])) {

    if(!empty($new_name)) {
        $fail1 = "";
        if(!preg_match('/^[a-zA-Z\söüóőúéáűí]{1,45}$/', $new_name)) {
            $fail1 = "name";
        }
        else {
            if(!sql_update($conn, "nev", $new_name)) {
                header("Location: ../user_data_update.php?update=sqlfail_name");
                exit();
            }
            $success1 = "name";
        }
    }

    if(!empty($new_email)) {
        $fail2 = "";
        if(!filter_var($new_email, FILTER_VALIDATE_EMAIL) && (strlen($new_email) < 1 || strlen($new_email) > 45)) {
            $fail2 = "email";
        }
        else {
            if(!sql_update($conn, "email", $new_email)) {
                header("Location: ../user_data_update.php?update=sqlfail_email");
                exit();
            }
            $success2 = "email";
        }
    }

    if(!empty($new_username)) {
        $fail3 = "";
        if(strlen($new_username) < 1 || strlen($new_username) > 45){
            $fail3 = "lenght";
        }
        else {
            if(username_exist($conn, $new_username) == true) {
                $fail3 = "exist";
            }
            else {
                if(!sql_update($conn, "felhasznalonev", $new_username)) {
                    header("Location: ../user_data_update.php?update=sqlfail_username");
                    exit();
                }
                $success3 = "user";
                $_SESSION["user"] = $new_username;
            }
        }
    }

    if(!empty($new_password)) {
        $fail4 = "";
        if(strlen($new_password) < 1 || strlen($new_password) > 45){
            $fail4 = "password";
        }
        else {
            if(!sql_update($conn, "jelszo", $new_password)) {
                header("Location: ../user_data_update.php?update=sqlfail_password");
                exit();
            }
            $success4 = "password";
        }
    }

    $fail = $fail1.$fail2.$fail3.$fail4;
    $success = $success1.$success2.$success3.$success4;

    if(empty($new_name) && empty($new_email) && empty($new_username) && empty($new_password)) {
        header("Location: ../user_data_update.php?update_error=fail_empty");
        exit();
    }
    else {
        header("Location: ../user_data_update.php?update_error=$fail&update_success=$success");
        exit();
    }
}
?>