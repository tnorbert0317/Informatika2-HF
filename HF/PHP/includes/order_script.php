<td>
    <?php
    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (!(isset($_POST["order"]) || isset($_SESSION["order"]))) {
        echo
        '<form method="post">
                <select name="order">
                    <option value="any">Mindegy</option>
                    <option value="priceASC">Ár szerint növekvő</option>
                    <option value="priceDESC">Ár szerint csökkenő</option>
                    <option value="yearASC">Évjárat szerint növekvő</option>
                    <option value="yearDESC">Évjárat szerint csökkenő</option>
                    <option value="wltpASC">WLTP szerint növekvő</option>
                    <option value="wltpDESC">WLTP szerint csökkenő</option>
                    <option value="batteryASC">Akkumulátorméret szerint növekvő</option>
                    <option value="batteryDESC">Akkumulátorméret szerint csökkenő</option>
                </select>
                <br><br><button type="submit">Kiválasztás!</button>
            </form>';
    } else {
        if (isset($_POST["order"])) {
            $order = $_POST["order"];
            $_SESSION["order"] = $order;
        } else {
            $order = $_SESSION["order"];
        }
        switch ($order) {
            case "any":
                echo "Mindegy";
                break;
            case "priceASC":
                echo "Ár szerint növekvő";
                break;
            case "priceDESC":
                echo "Ár szerint csökkenő";
                break;
            case "yearASC":
                echo "Évjárat szerint növekvő";
                break;
            case "yearDESC":
                echo "Évjárat szerint csökkenő";
                break;
            case "wltpASC":
                echo "WLTP szerint növekvő";
                break;
            case "yearDESC":
                echo "WLTP szerint csökkenő";
                break;
            case "batteryASC":
                echo "Akkumulátorméret szerint növekvő";
                break;
            case "batteryDESC":
                echo "Akkumulátorméret szerint csökkenő";
                break;
        }
    }
    ?>
</td>