<form action="./?action=destination" method="POST">
    <select name="liaison" id="liaison">

        <?php
        for ($i = 0; $i < count($listeLiaison); $i++) {
            $port1 = getPortById($listeLiaison[$i]["idPort"]);
            $port2 = getPortById($listeLiaison[$i]["idPort_1"]);
            echo "<option value='" . $listeLiaison[$i]["codeLiaison"] . "'>" . $port1[0]['nomPort'] . " - " . $port2[0]['nomPort'] . "</option>";
        }
        ?>
    </select>
    <?php
    $today = date("Y-m-d");
    $dateJP1 = date("Y-m-d", strtotime($today . ' +1 day'));
    ?>
    <input type="date" name="dateDestination" id="dateDestination" <?php echo "min='$dateJP1'"; ?>>
    <input hidden type="number" name="idSecteur" id="idSecteur" value="<?= $secteur ?>">
    <input type="submit" value="Afficher">
</form>