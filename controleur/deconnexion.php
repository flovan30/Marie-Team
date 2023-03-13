<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include "$racine/modele/connexion.inc.php";




logout();


header('Refresh:0 ; url=index.php');


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "authentification";
include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueCorpsAccueil.php";
    include "$racine/vue/vueFooter.php";


?>