<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.destination.inc.php";

$listeSecteur = getSecteur();

include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueAffichageDestination.php";
include "$racine/vue/vueFooter.php";
