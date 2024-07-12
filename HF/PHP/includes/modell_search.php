<!--
    Keresés márka és modell alapján:

    Márka   Modell  Változó
    mindegy mindegy $_GET["cars"] = "any"
    valami  mindegy $_GET["modells"] = "márka_id#car"
    valami  valami  $_GET["modells"] = "modell_id"
-->

<div>
    <table>
        <tr>
            <td>
                <p>Márka</p>
            </td>
            <td>
                <p>Modell</p>
            </td>
            <?php if($var == "search_modell.php") {echo "<td><p>Rendezés</p></td>";} ?>
        </tr>
        <tr>
            <td>
                <?php
                if (!isset($_GET["modells"])) {
                    if (!isset($_GET["cars"])) {
                        echo '<form action="'.$var.'" method="get">
                                <select name="cars">
                                <option value="any">Mindegy</option>';
                        $sql = "SELECT * FROM auto_markak ORDER BY marka_nev;";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo '<option value="' . $row["id"] . '">' . $row["marka_nev"] . '</option>';
                        }
                        echo '</select>
                                <br><br><button type="submit">Kiválasztás!</button>
                                </form>';
                    } else {
                        $car = $_GET["cars"];
                        if ($car != "any") {
                            $sql = "SELECT * FROM auto_markak WHERE id = $car";
                            $result = mysqli_query($conn, $sql);
                            $car_name = mysqli_fetch_array($result);
                            echo $car_name["marka_nev"];
                        } else {
                            echo "Mindegy";
                        }
                    }
                } else {
                    if (strpos($_GET["modells"], "#car") == false) {
                        $modell_id = $_GET["modells"];
                        $sql = "SELECT auto_modellek.id AS modell_id, marka_nev FROM auto_modellek JOIN auto_markak ON auto_markak_id = auto_markak.id HAVING modell_id = $modell_id";
                        $result = mysqli_query($conn, $sql);
                        $car_name = mysqli_fetch_array($result);
                        echo $car_name["marka_nev"];
                    } else {
                        $array = explode("#", $_GET["modells"]);
                        $car = $array[0];
                        $sql = "SELECT * FROM auto_markak WHERE id = $car";
                        $result = mysqli_query($conn, $sql);
                        $car_name = mysqli_fetch_array($result);
                        echo $car_name["marka_nev"];
                    }
                }
                ?>
            </td>

            <td>
                <?php
                if (!isset($_GET["modells"])) {
                    if (isset($_GET["cars"])) {
                        $car = $_GET["cars"];
                        if ($car != "any") {
                            $sql = "SELECT auto_modellek.id auto_modellek_id, modell_nev FROM  auto_modellek JOIN auto_markak ON auto_markak_id = auto_markak.id WHERE auto_markak.id = $car";
                            $result = mysqli_query($conn, $sql);
                            $car = $car . "#car";
                            echo '<form action="'.$var.'" method="get">
                                    <select name="modells">
                                    <option value="' . $car . '">Mindegy</option>';
                            while ($modell = mysqli_fetch_array($result)) {
                                echo '<option value="' . $modell["auto_modellek_id"] . '">' . $modell["modell_nev"] . '</option>';
                            }
                            echo '</select>
                                    <br><br><button type="submit">Kiválasztás!</button>
                                    </form>';
                        } else {
                            echo "Mindegy";
                        }
                    } else {
                        echo "Először a márkát kell kiválasztani!";
                    }
                } else {
                    $modell = $_GET["modells"];
                    if (strpos($modell, "#car") == false) {
                        $sql = "SELECT * FROM auto_modellek WHERE id = $modell";
                        $result = mysqli_query($conn, $sql);
                        $modell_name = mysqli_fetch_array($result);
                        echo $modell_name["modell_nev"];
                    } else {
                        echo "Mindegy";
                    }
                }
                ?>
            </td>
            <?php if($var == "search_modell.php") {include_once 'order_script.php';} ?>
        </tr>
    </table>
</div>