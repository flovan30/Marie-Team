<style type="text/css">
    @import url("css/confirmation_reservation.css");
</style>
<main>
    <h1>Confirmation de la réservation</h1>
    <br>
    <div class="recap">
        <h3>Liaison : <?= $portDepart ?> - <?= $portArrivé ?></h3>
        <h3>
            Traversée N° <?= $infosTraversee["numTraversee"] ?> Le <?php echo $dateTraversee['dateTraversee'] ?> à <?= $heuretraversee ?>
        </h3>
        <div class="personal_info">
            <h4>Votre réservation à été enregistrée</h4><br>
            <h4>Au nom de : <?= $nomU ?> domicilié au <?= $adresseU, " ", $cpU ?> <i>VILLE</i></h4>
            <h4>Vous avez réservé :</h4><br>
            <?php foreach ($types as $type) {
                $type['libelleType'] = str_replace(" ", "_", $type['libelleType']);
                $type['libelleType'] = str_replace(".", '', $type['libelleType']);
            ?>
                <p><?= $quantitéType[$type['libelleType']] ?> : <?= $type['libelleType'] ?></p>
            <?php } ?>
            <br>
            <h3>Pour un mointant total à régler de <?= $prixTTC ?> €</h3>
            <a href="#" disabled>Modalité de paiement</a>

            <p>
                Vous retrouverez ses informations dans la rubriques "Mes réservations" sur votre compte.
            </p>
        </div>
        <!-- bouton pour retrourner à l'accueil -->
        <a class="hommeButton" href="?action=accueil">Retour à l'accueil</a>
    </div>
</main>