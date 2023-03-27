<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine ="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/chiffreAffaire.php";
include_once "$racine/modele/nbPassager.php";
include_once "$racine/modele/verification.admin.php";

$mail = getMailLoggedOn();
$util = getUtilisateurByMail($mail);

if ($util["RoleUtilisateur"]==1 || $util["RoleUtilisateur"]==2) { 

    print_r($util["RoleUtilisateur"]);
include "$racine/vue/vueNavbarPanel.php";
include "$racine/vue/vuePanel.php";

}
else {
    include "$racine/vue/vueNavbar.php";
include "$racine/vue/vueCorpsAccueil.php";
include "$racine/vue/vueFooter.php";
}


?>