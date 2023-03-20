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
                    <option value="<?= $listeSecteur[$i]['idSecteur'] ?>"><?= $listeSecteur[$i]['nomSecteur'] ?></option>
                <?php
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
                <input hidden type="number" name="idSecteur" id="idSecteur" value="<?= $secteur ?>">
                <input type="submit" value="Afficher">
            </form>

            <?php
        }
        // pour trouver ça il faut une requete qui recupère le nom a partir du son ID 
        if (isset($_POST['liaison']) && isset($_POST['dateDestination']) && isset($_POST['idSecteur'])) {
            $liaison = $_POST['liaison'];
            $date = $_POST['dateDestination'];
            $idSecteur = $_POST['idSecteur'];
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
                <h3>Num : <?= $traversee[$i]['numTraversee'] ?> | date : <?= $traversee[$i]['dateTraversee'] ?> à <?= $traversee[$i]['heureDepartTraversee'] ?> | Passager : <?= $nbPlacePassageeRestante ?> | Véh.inf.2m : <?= $nbPlaceVehiculeInf2mRestante ?> | Véh.sup.2m : <?= $nbPlaceVehiculeSup2mRestante ?>
                    <form action="./?action=reservation" method="POST">
                        <input hidden type="number" name="numTraversee" value="<?= $traversee[$i]['numTraversee'] ?>">
                        <input hidden type="number" name="idLiaison" value="<?= $liaison ?>">
                        <input type="submit" <?= $button ?>>
                    </form>
                </h3>
        <?php
            }
        }
        ?>
    </div>
</main>