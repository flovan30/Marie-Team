<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine ="..";
}

include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueCorpsAccueil.php";
include "$racine/vue/vueFooter.php";

?>