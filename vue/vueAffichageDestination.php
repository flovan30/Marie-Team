<style type="text/css">
    @import url("css/destination.css");
</style>
<main>
    <div class="listeSecteur">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <select name="secteur" id="secteur">
                <?php
                for ($i = 0; $i < count($listeSecteur); $i++) {
                ?>
                <?php echo "<option value='" . $listeSecteur[$i]["idSecteur"] . "'>" . $listeSecteur[$i]["nomSecteur"] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="valider">
        </form>
        <br><br>

        <?php
        // if isset fonction recupérer
        if (isset($_POST['secteur'])) {
            $secteur = $_POST['secteur'];
            $listeLiaison = getLiaisonByIdSecteur($secteur);
        ?>

            <form action="<?php $_PHP_SELF ?>" method="POST">
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
                <input type="submit" value="Afficher">
            </form>

            <?php
        }
        if (isset($_POST['liaison']) && isset($_POST['dateDestination'])) {
            $liaison = $_POST['liaison'];
            $date = $_POST['dateDestination'];
            $traversee = getTraverseeByCodeLiaisonAndDate($liaison, $date);


            for ($i = 0; $i < count($traversee); $i++) {
                $nbPlacePassageeRestante = getnbPlacesRestantePassager($traversee[$i]['numTraversee']);
                $nbPlaceVehiculeInf2mRestante = getnbPlacesRestanteVehiculeInf2m($traversee[$i]['numTraversee']);
                $nbPlaceVehiculeSup2mRestante = getnbPlacesRestanteVehiculeSup2m($traversee[$i]['numTraversee']);

                if ($nbPlacePassageeRestante == 0 && $nbPlaceVehiculeInf2mRestante == 0 && $nbPlaceVehiculeSup2mRestante == 0) {
                    $button = "value='Plus assez de place' disabled";
                } else {
                    $button = "value='Reserver'";
                }
            ?>
                <h3>Num : <?= $traversee[$i]['numTraversee'] ?> | date : <?= $traversee[$i]['dateTraversee'] ?> à <?= $traversee[$i]['heureDepartTraversee'] ?> | Passager : <?= $nbPlacePassageeRestante ?> | Véh.inf.2m : <?= $nbPlaceVehiculeInf2mRestante ?> | Véh.sup.2m : <?= $nbPlaceVehiculeSup2mRestante ?> <form action="./?action=reservation" method="POST"><input type="hidden" name="numTraversee" value="<?= $traversee[$i]['numTraversee'] ?>"><input type="submit" <?= $button ?>></form>
                </h3>
        <?php
            }
        }
        ?>
    </div>
</main>