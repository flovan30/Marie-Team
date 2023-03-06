<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/bd.reservation.inc.php";


include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueAffichageReservation.php";
include "$racine/vue/vueFooter.php";
