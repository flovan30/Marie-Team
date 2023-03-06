<?php 

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";

$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");
$menuBurger[] = Array("url"=>"./?action=updProfil","label"=>"Modifier mon profil");


if (isLoggedOn()){
    $mail = getMailLoggedOn();
    $util = getUtilisateurByMail($mail);

    $titre = "Mon profil";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/vueFooter.php";
    
}


else {
    $util = 'test';
}
