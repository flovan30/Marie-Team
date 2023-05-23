<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
include_once "$racine/modele/chiffreAffaire.php";
include_once "$racine/modele/nbPassager.php";
include_once "$racine/modele/verification.admin.php";
include_once "$racine/modele/bd.liaison.inc.php";

$mail = getMailLoggedOn();
$util = getUtilisateurByMail($mail);

$listePort = getNamePort();
$listeSecteur = getNameSecteur();

if (isset($_POST['Port1']) && isset($_POST['Port2']) && isset($_POST['distance']) && isset($_POST['secteur'])) { 

$port1 = $_POST['Port1'];
$port2 = $_POST['Port2'];
$distancePort = $_POST['distance'];
$NomSecteur = $_POST['secteur'];

$NomSecteur = getIdSecteur($NomSecteur);
$port1 = getIdPort($port1);
$port2 = getIdPort($port2);
 

echo 'port 1 => ' . $port1 . '<br> port 2 => ' . $port2 . '<br>distance => ' . $distancePort . '<br> Nom secteur => ' . $NomSecteur;


AddLiaison($port1 , $port2 , $distancePort , $NomSecteur);

} else {
    echo "error fatal ";
}





if ($util["RoleUtilisateur"]==1 || $util["RoleUtilisateur"]==2) { 
    include "$racine/vue/vueNavbarPanel.php";
    include "$racine/vue/vuePanel.php";

}
else {
    include "$racine/vue/vueNavbar.php";
    include "$racine/vue/vueCorpsAccueil.php";
    include "$racine/vue/vueFooter.php";
}


?>