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


        //instantiations des variables qui contiendront les quantités
        $quantitéAdulte = $_POST['Adulte'];
        $quantitéJunior = $_POST['Junior_8_à_18_ans'];
        $quantitéEnfant = $_POST['Enfant_0_à_7_ans'];
        $quantitéVoitureInf4m = $_POST['Voiture_inf_4m'];
        $quantitéVoitureInf5m = $_POST['Voiture_inf_5m'];
        $quantitéfourgon = $_POST['Fourgon'];
        $quantitéCampingCar = $_POST['Camping_Car'];
        $quantitéCamion = $_POST['Camion'];

        include "$racine/vue/vueAffichageConfirmationReservation.php";
        include "$racine/vue/vueFooter.php";
    }
} else {
    echo "<script>alert('Veuillez vous connecter pour acceder à cette page');</script>";
    echo "<script>setTimeout(function(){window.location.href = '?action=connexion';}, 0);</script>";
    exit();
}
