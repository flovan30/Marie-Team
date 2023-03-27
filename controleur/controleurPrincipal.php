<?php

function controleurPrincipal($action)
{
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["destination"] = "destination.php";
    $lesActions["reservation"] = "reservation.php";
    $lesActions["tarifs"] = "tarifs.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["inscription"] = "inscription.php";
    $lesActions["profil"] = "profil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["panel"] = "panel.php";
    $lesActions["inscriptionreussie"] = "inscriptionReussie.php";


    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
