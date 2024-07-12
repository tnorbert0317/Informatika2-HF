<?php while ($rows = mysqli_fetch_array($result)) : ?>
    <?php
    if ($i == 0) {
        echo "<h1>Találatok</h1>";
    }
    $i++;
    ?>
    <table>
        <tr>
            <td colspan="2">
                <?php echo $rows["marka_nev"] . " " . $rows["modell_nev"]; ?>
            </td>
            <td colspan="2">
                <?php echo $rows["ar"] . " Ft"; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo "Évjárat:"; ?>
            </td>
            <td>
                <?php echo $rows["evjarat"]; ?>
            </td>
            <td>
                <?php echo "Kihasználható akkumulátorméret:"; ?>
            </td>
            <td>
                <?php echo $rows["akku_meret_kwh"] . " kWh"; ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo "PS:"; ?>
            </td>
            <td>
                <?php echo $rows["teljesitmeny_le"]; ?>
            </td>
            <td>
                <?php echo "WLTP hatótáv:"; ?>
            </td>
            <td>
                <?php echo $rows["wltp_hatotav"] . " km"; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo "Leírás:"; ?>
            </td>
            <td colspan="2">
                <?php echo $rows["leiras"]; ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php echo "Eladó e-mail címe:"; ?>
            </td>
            <td colspan="2">
                <?php echo $rows["email"]; ?>
            </td>
        </tr>
    </table>
<?php endwhile; ?>
<?php if($i == 0) {echo "<h1>Nincs találat!</h1>";} ?>