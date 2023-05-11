<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.confirmationReservation.php";

include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

// verification de si l'utilisateur a cliquer sur le boutton "Reserver" et est connecté
if (isLoggedOn()) {

    $adresseMailU = $_SESSION["AdresseMailUtilisateur"];
    $nomU = strtoupper($_SESSION["NomUtilisateur"]);
    $adresseU = $_SESSION["AdresseUtilisateur"];
    $cpU = $_SESSION["CpUtilisateur"];

    include "$racine/vue/vueNavbar.php";

    // verification si l'utilisateur à validé le formulaire avec les quantités 
    if (isset($_POST['codeLiaison']) && isset($_POST['numTraversee']) && isset($_POST['Adulte']) && isset($_POST['Junior_8_à_18_ans']) && isset($_POST['Enfant_0_à_7_ans']) && isset($_POST['Voiture_inf_4m']) && isset($_POST['Voiture_inf_5m']) && isset($_POST['Fourgon']) && isset($_POST['Camping_Car']) && isset($_POST['Camion'])) {
        $numTraversee = $_POST['numTraversee'];
        $codeLiaison = $_POST['codeLiaison'];

        $portDepart = getNomPortDepartByNumTraversee($numTraversee);
        $portArrivé = getNomPortArriveByNumTraversee($numTraversee);
        $infosTraversee = getInfosTraverseeByNumTraversee($numTraversee);
        $dateTraversee = getDateTraverseeByNumTraversee($numTraversee);
        $heuretraversee = getHeureTraverseeByNumTraversee($numTraversee);
        $types = getAllType();
        $periodeActuelle = intval(getIdPeriodeWithDateActuelle());

        //instantiations des variables qui contiendront les QUANTITÉS        
        $quantitéType = array();
        $quantitéType['Adulte'] = $_POST['Adulte'];
        $quantitéType['Junior_8_à_18_ans'] = $_POST['Junior_8_à_18_ans'];
        $quantitéType['Enfant_0_à_7_ans'] = $_POST['Enfant_0_à_7_ans'];
        $quantitéType['Voiture_inf_4m'] = $_POST['Voiture_inf_4m'];
        $quantitéType['Voiture_inf_5m'] = $_POST['Voiture_inf_5m'];
        $quantitéType['Fourgon'] = $_POST['Fourgon'];
        $quantitéType['Camping_Car'] = $_POST['Camping_Car'];
        $quantitéType['Camion'] = $_POST['Camion'];

        echo ("quantité => ");
        print_r($quantitéType);
        echo ("<br>");

        // déclaraiton du tableau qui contiendra les PRIX
        $prixType = array();
        foreach ($types as $type) {
            $infosType = getInfoTypeByLibelleType($type['libelleType']);
            $type['libelleType'] = str_replace(" ", "_", $type['libelleType']);
            $type['libelleType'] = str_replace(".", '', $type['libelleType']);
            $prix = getPrixByCodeCategorieAndNumTypeAndIdPeriode($infosType['codeCategorie'], $infosType['numType'], $periodeActuelle, $codeLiaison);
            $prixType[$type['libelleType']] = $prix;
        }

        echo ("prix => ");
        print_r($prixType);
        echo ("<br><br>");

        // declaration du tableau assossiatif libelleType est la clé et prixTTC est la valeur le prix total calculé en fonction de la quantité
        $prixTotalType = array();
        $prixTTC = 0;
        foreach ($types as $type) {
            $type['libelleType'] = str_replace(" ", "_", $type['libelleType']);
            $type['libelleType'] = str_replace(".", '', $type['libelleType']);
            $prixTTCType = $prixType[$type['libelleType']] * $quantitéType[$type['libelleType']];

            // prix total de la réservation
            $prixTTC = $prixTTC + $prixTTCType;

            // tableau avec le prix total de chaque type
            $prixTotalType[$type['libelleType']] = $prixTTCType;
        }

        echo ("prix total par type => ");
        print_r($prixTotalType);
        echo ("<br>");
        echo ("prix TTC => ");
        echo ($prixTTC);
        echo ("<br><br>");

        // createReservationWithUserSession($_SESSION["NomUtilisateur"], $util["AdresseUtilisateur"], $util["CpUtilisateur"], $numTraversee, $prixTTC);
        $numReservation = getNumReservationByUserInfo($_SESSION['NomUtilisateur'], $util["AdresseUtilisateur"], $util["CpUtilisateur"], $numTraversee);

        // enregistrement des types dans la table 'enregistrer'
        foreach ($types as $type) {
            $type['libelleType'] = str_replace(" ", "_", $type['libelleType']);
            $infosType = getInfoTypeByLibelleType($type['libelleType']);
            // echo ($infosType['codeCategorie'] . " / ");
            // echo ($infosType['numType'] . " / ");
            // echo ($numReservation . " / ");
            $type['libelleType'] = str_replace(".", '', $type['libelleType']);
            // echo ($quantitéType[$type['libelleType']] . "<br>");

            // enregistrement dans la BDD si la quantité est supérieur à 0
            if ($quantitéType[$type['libelleType']] > 0) {
                createEnregistrementWithInfoTypeAndNumReservation($infosType['codeCategorie'], $infosType['numType'], $numReservation, $quantitéType[$type['libelleType']]);
            }
        }

        include "$racine/vue/vueAffichageConfirmationReservation.php";
        include "$racine/vue/vueFooter.php";
    }
} else {
    echo "<script>alert('Veuillez vous connecter pour acceder à cette page');</script>";
    echo "<script>setTimeout(function(){window.location.href = '?action=connexion';}, 0);</script>";
}
