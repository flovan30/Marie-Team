<style type="text/css">
    @import url("css/reservation.css");
</style>

<main>

    <?php
    // verification de si l'utilisateur a cliquer sur le boutton "Reserver" et est connecté
    if (isset($_POST['numTraversee'])) {
        if (!isLoggedOn()) {
            header("Location: ./?action=connexion");
        }
        $numTraversee = $_POST['numTraversee'];
        // code ci-dessous pour afficher les informations de la reservation 
        $infoTraversee = getInfoTraverseeByNumTraversee($numTraversee);
        gettype($infoTraversee);
    ?>
        <h2>Fiche de reservation</h2>
        <h3>Liaison : <?= getNomPortDepartByNumTraversee($numTraversee) ?> - <?= getNomPortArriveByNumTraversee($numTraversee) ?></h3>
        <h4>Traversee N° <?= $infoTraversee["numTraversee"] ?> Le <?php  ?> </h4>
    <?php
    } else {
        header("Location: ./?action=destination");
    }

    ?>
</main>