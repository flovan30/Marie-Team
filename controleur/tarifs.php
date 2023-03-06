<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine ="..";
}

include "$racine/modele/tarifs.php";


include "$racine/vue/vueNavbar.php";
include "$racine/vue/tarifCorps.php";
include "$racine/vue/vueFooter.php";

?>