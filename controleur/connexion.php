<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/connexion.inc.php";


if (isset($_POST["AdresseMailUtilisateur"]) && isset($_POST["MdpUtilisateur"])){
    $mailU=$_POST["AdresseMailUtilisateur"];
    $mdpU=$_POST["MdpUtilisateur"];
}
else
{
    $mailU="";
    $mdpU="";
}

if (isLoggedOn()){
    include "$racine/controleur/monProfil.php";
}
else{ 

    $titre = "authentification";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/vueFooter.php";
}

?>