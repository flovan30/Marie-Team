<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";

    $lesActions["reservation"] = "reservation.php";
    $lesActions["tarifs"] = "tarifs.php";

    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["deconnexion"] = "deconnexion.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}

?>