<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine\modele\bd.destination.inc.php";

$listeSecteur = getSecteur();

include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueAffichageDestination.php";


if (isset($_POST['secteur'])) {
    $secteur = $_POST['secteur'];
    $listeLiaison = getLiaisonByIdSecteur($secteur);
    include_once "$racine/vue/vueAffichageLiaison.php";
}

// recupération des informations pour l'affichage des destinations 
if (isset($_POST['liaison']) && isset($_POST['dateDestination']) && isset($_POST['idSecteur'])) {
    $liaison = $_POST['liaison'];
    $date = $_POST['dateDestination'];
    $idSecteur = $_POST['idSecteur'];
    $traversee = getTraverseeByCodeLiaisonAndDate($liaison, $date);
    include_once "$racine/vue/vueAffichageDestinationDispo.php";
}

include "$racine/vue/vueFooter.php";
