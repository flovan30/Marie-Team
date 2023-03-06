<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/connexion.inc.php";




    $titre = "Inscription";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/vueFooter.php";


?>