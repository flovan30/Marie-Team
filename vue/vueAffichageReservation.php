<style type="text/css">
    @import url("css/reservation.css");
</style>

<main>

    <?php
    // verification de si l'utilisateur a cliquer sur le boutton "Reserver" et est connecté
    if (isset($_POST['numTraversee']) && isset($_POST['idLiaison'])) {
        if (!isLoggedOn()) {
            header("Location: ./?action=connexion");
        }
        $numTraversee = $_POST['numTraversee'];
        $codeLiaison = $_POST['idLiaison'];
        // les variables ci-dessous sont utilisé pour afficher les informations de la reservation ou en temps que parametre pour des fonctions 
        $portDepart = getNomPortDepartByNumTraversee($numTraversee);
        $portArrivé = getNomPortArriveByNumTraversee($numTraversee);
        $infosTraversee = getInfosTraverseeByNumTraversee($numTraversee);
        $dateTraversee = getDateTraverseeByNumTraversee($numTraversee);
        $types = getAllType();

    ?>
        <h2>Fiche de reservation</h2>
        <h3>Liaison : <?= $portDepart ?> - <?= $portArrivé ?></h3>
        <h4>Traversee N° <?= $infosTraversee["numTraversee"] ?> Le <?php echo $dateTraversee['dateTraversee'] ?> </h4>
        <h3>Saisir les informations relatives à la réservation</h3>
        <form action="#" method="post">
            <div class="container_table">

                <table class="table">
                    <thead class="title_Table">
                        <tr>
                            <th>Type</th>
                            <th>Prix en €</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($types as $type) { ?>
                            <tr>
                                <td>
                                    <?= $type['libelleType'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <button type="submit" class="btn btn-primary">Enregistrer la reservation</button>
        </form>
    <?php
    } else {
        header("Location: ./?action=destination");
    }

    ?>
</main>