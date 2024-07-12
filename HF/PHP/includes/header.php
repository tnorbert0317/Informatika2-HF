<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>

<div class="fejlec_logo">
    <h1><a href="index.php">Használt E-autók</a></h1>
</div>

<div class="fejlec_menu">
    <table class="menu">
        <tr>
            <?php
            if (isset($_SESSION["isSignedin"])) {

                if ($_SESSION["isSignedin"] == true) {

                    if (isset($_SESSION["user"])) {
                        echo '
                        <td><a href = "search_modell.php">Keresés</a></td>
                        <td><a href = "ad.php">Hirdetésfeladás</a></td>
                        <td><a href = "user_info.php">' . $_SESSION["user"] . '</a></td>
                        <td><a href = "includes/sign_out_script.php">Kijelentkezés</a></td>
                        <td>
                            <div class="dropdown">
                                <p>Skin</p>
                                <div class="dropdown-content">
                                    <form class="color-picker" action="">
                                        <fieldset>
                                            <label for="dark" class="visually-hidden">Dark theme</label>
                                            <input type="radio" id="dark" name="theme" checked><br><br>
                                            <label for="blue" class="visually-hidden">Blue theme</label>
                                            <input type="radio" id="blue" name="theme"><br><br>
                                            <label for="pink" class="visually-hidden">Pink theme</label>
                                            <input type="radio" id="pink" name="theme"><br><br>
                                            <label for="green" class="visually-hidden">Green theme</label>
                                            <input type="radio" id="green" name="theme">
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </td>';
                    }
                } else {
                    echo '
                    <td><a href = "search_modell.php">Keresés</a></td>
                    <td><a href = "javascript:alert(\'Regisztrálj vagy jelentkezz be!\')">Hirdetésfeladás</a></td>
                    <td><a href = "sign_in.php">Belépés</a></td>
                    <td><a href = "sign_up.php">Regisztráció</a></td>
                    <td>
                        <div class="dropdown">
                            <p>Skin</p>
                            <div class="dropdown-content">
                                <form class="color-picker" action="">
                                    <fieldset>
                                        <label for="dark" class="visually-hidden">Dark theme</label>
                                        <input type="radio" id="dark" name="theme" checked><br><br>
                                        <label for="blue" class="visually-hidden">Blue theme</label>
                                        <input type="radio" id="blue" name="theme"><br><br>
                                        <label for="pink" class="visually-hidden">Pink theme</label>
                                        <input type="radio" id="pink" name="theme"><br><br>
                                        <label for="green" class="visually-hidden">Green theme</label>
                                        <input type="radio" id="green" name="theme">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </td>';
                }
            } else {
                echo '
                <td><a href = "search_modell.php">Keresés</a></td>
                <td><a href = "javascript:alert(\'Regisztrálj vagy jelentkezz be!\')">Hirdetésfeladás</a></td>
                <td><a href = "sign_in.php">Belépés</a></td>
                <td><a href = "sign_up.php">Regisztráció</a></td>
                <td>
                    <div class="dropdown">
                        <p>Skin</p>
                        <div class="dropdown-content">
                            <form class="color-picker" action="">
                                <fieldset>
                                    <label for="dark" class="visually-hidden">Dark theme</label>
                                    <input type="radio" id="dark" name="theme" checked><br><br>
                                    <label for="blue" class="visually-hidden">Blue theme</label>
                                    <input type="radio" id="blue" name="theme"><br><br>
                                    <label for="pink" class="visually-hidden">Pink theme</label>
                                    <input type="radio" id="pink" name="theme"><br><br>
                                    <label for="green" class="visually-hidden">Green theme</label>
                                    <input type="radio" id="green" name="theme">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </td>';
            }
            ?>
        </tr>
    </table>
</div>