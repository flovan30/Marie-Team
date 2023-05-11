<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.reservation.inc.php";

include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

// verification de si l'utilisateur a cliquer sur le boutton "Reserver" et est connecté
if (isLoggedOn()) {

    $prixType = array();

    if (isset($_POST['numTraversee']) && isset($_POST['idLiaison'])) {
        // déclaration de la variable qui contiendra le numéro de la traversee en glolbale afin de pouvoir l'utiliser à l'exterieur de la condition
        $numTraversee = $_POST['numTraversee'];
        $codeLiaison = $_POST['idLiaison'];

        // les variables ci-dessous sont utilisé pour afficher les informations de la reservation ou en temps que parametre pour des fonctions 
        $portDepart = getNomPortDepartByNumTraversee($numTraversee);
        $portArrivé = getNomPortArriveByNumTraversee($numTraversee);
        $infosTraversee = getInfosTraverseeByNumTraversee($numTraversee);
        $dateTraversee = getDateTraverseeByNumTraversee($numTraversee);
        $heuretraversee = getHeureTraverseeByNumTraversee($numTraversee);
        $types = getAllType();
        $periodeActuelle = intval(getIdPeriodeWithDateActuelle());

        // déclaraiton du tableau qui contiendra les prix des types de réservation
        foreach ($types as $type) {
            $infosType = getInfoTypeByLibelleType($type['libelleType']);
            $prix = getPrixByCodeCategorieAndNumTypeAndIdPeriode($infosType['codeCategorie'], $infosType['numType'], $periodeActuelle, $codeLiaison);
            $prixType[$type['libelleType']] = $prix;
        }
        print_r($prixType);
        include "$racine/vue/vueNavbar.php";
        include "$racine/vue/vueAffichageReservation.php";
        include "$racine/vue/vueFooter.php";
    }
} else {
    echo "<script>alert('Veuillez vous connecter pour acceder à cette page');</script>";
    echo "<script>setTimeout(function(){window.location.href = '?action=connexion';}, 0);</script>";
    exit();
}
