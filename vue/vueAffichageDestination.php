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
            // echo print_r($traversee);

            for ($i = 0; $i < count($traversee); $i++) {
            ?>
                <h3>Numeros de la traversée : <?= $traversee[$i]['numTraversee'] ?> | date de la traversée : <?= $traversee[$i]['dateTraversee'] ?> | heure de départ : <?= $traversee[$i]['heureDepartTraversee'] ?> <form action=""><input type="hidden" name="numTraversee" value="<?= $traversee[$i]['numTraversee'] ?>"><input type="submit" value="Réserver"></form>
            <?php
            }
        }
            ?>
    </div>
</main>