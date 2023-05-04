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
            <h4>Au nom de : <?= $nomU ?> domicilié au <?= $adresseU, $cpU ?> <i>VILLE</i></h4>!
        </div>
    </div>
</main>