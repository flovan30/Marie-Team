<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/connexion.inc.php";


if (isset($_POST["AdresseMailUtilisateur"]) && isset($_POST["MdpUtilisateur"])){
    $mail=$_POST["AdresseMailUtilisateur"];
    $mdp=$_POST["MdpUtilisateur"];
}
else
{
    $mail="";
    $mdp="";
}


login($mail,$mdp);

if (isLoggedOn()){
    include "$racine/controleur/profil.php";
}
else{ 

    $titre = "authentification";
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/vueFooter.php";
}

?>