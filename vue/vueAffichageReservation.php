<style type="text/css">
    @import url("css/reservation.css");
</style>

<main>
    <h5>Fiche de reservation</h5>
    <p>Liaison : <?= $portDepart ?> - <?= $portArrivé ?></p>
    <p>Traversée N° <?= $infosTraversee["numTraversee"] ?> Le <?php echo $dateTraversee['dateTraversee'] ?> à <?= $heuretraversee ?> </p>
    <h5>Saisir les informations relatives à la réservation</h5>
    <form action="./?action=confirmationReservation" method="post">
        <div class="container_table">

            <table class="table">
                <thead class="title_Table">
                    <tr>
                        <th>Type</th>
                        <th>Prix en euro</th>
                        <th>Quantité</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $type) { ?>
                        <tr>
                            <td>
                                <?= $type['libelleType'] ?>
                            </td>
                            <td>
                                <?php
                                print_r($prixType[$type['libelleType']]);
                                // instanciation du tableau qui contiendra les types associer au prix
                                $tabTypes = array(
                                    $type['libelleType'] => $prixType
                                );
                                ?> €
                            </td>
                            <?php
                            // suppression des espaces et des points pour éviter les erreur sur le 'name' de l'input
                            $type['libelleType'] = str_replace(" ", "_", $type['libelleType']);
                            $type['libelleType'] = str_replace(".", '', $type['libelleType']);
                            ?>
                            <td>
                                <input type="number" min="0" value="0" max="20" name="<?php echo ($type['libelleType']) ?>" id="">
                                maximum 20
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <input hidden type="text" name="numTraversee" value="<?= $numTraversee ?>">
        <input hidden type="text" name="codeLiaison" value="<?= $codeLiaison ?>">
        <button type="submit" class="submit-btn">Enregistrer la reservation</button>
    </form>
</main>