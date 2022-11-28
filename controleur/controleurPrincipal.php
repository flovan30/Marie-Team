<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["destination"] = "reservation.php";
    $lesActions["tarifs"] = "tarif.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}

?>