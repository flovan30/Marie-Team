<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "$racine/modele/connexion.inc.php";


if (isset($_POST["mail"]) && isset($_POST["mdp"])){
    $mailU=$_POST["mail"];
    $mdpU=$_POST["mdp"];
}
else
{
    $mailU="";
    $mdpU="";
}

login($mailU,$mdpU);

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