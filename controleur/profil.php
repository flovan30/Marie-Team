<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}

include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/bd.confirmationReservation.php";

$menuBurger = array();
$menuBurger[] = array("url" => "./?action=profil", "label" => "Consulter mon profil");
$menuBurger[] = array("url" => "./?action=updProfil", "label" => "Modifier mon profil");


if (isLoggedOn()) {
    //call function to find email of logged on user and return it to $mail variable 

    $mail = getMailLoggedOn();
    $util = getUtilisateurByMail($mail);
    $info = getTotalReservationByUserInfo($mail);
    $ligne = getCountReservationByUserInfo($mail);
    

    $titre = "Mon profil";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueMonProfil.php";
    include "$racine/vue/vueFooter.php";


} else {
    $util = 'test';
}

?>