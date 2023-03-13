<!DOCTYPE html>
<html lang="fr">
<?php 
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.utilisateur.inc.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marie-Team</title>
    <style>
        @import url("css/navbar.css?v=1");
        @import url("css/corpsAccueil.css?v=1");
        @import url("css/footer.css?v=1");
    </style>
    
</head>

<body>
    <nav>
        <ul class="menuGeneral">
            <li class="logoNavbar"><a href="./?action=accueil"><img src="images/LogoMarie-Team.png" alt="logo" /></a></li>


            <div class=liensDroite>
                <li><a href="./?action=accueil">Accueil</a></li>
                <li><a href="./?action=destination">Destination</a></li>
                <li><a href="./?action=tarifs">Nos tarifs</a></li>
                <?php 

                $mail = getMailLoggedOn();
                $util = getUtilisateurByMail($mail);

                if (!empty($util) ) { 
                $username = $_SESSION['NomUtilisateur'];

                $first_letter = strtoupper(substr($username, 0, 1));


                echo "<div class='pdpnavbar'><a href='#' class='menu-button'>" . $first_letter . '</a>
                    <nav>
                    <ul class="menu-links">
                        <li><a href="./?action=connexion">Profil</a></li>';
                    if ($util['RoleUtilisateur']==1 || $util['RoleUtilisateur']==2){
                       echo '<li><a href="./?action=panel">Panel</a></li>';
                    }

                    echo'
                    <li><a href="./?action=deconnexion">Se déconnecter</a></li>
                    </ul>
                    </nav>
                    </div>';
                
                }
                else {
                    echo '<div class="pdpnavbar"><li><a href="./?action=connexion"><img class="imgpro" src="images/connexion.png" alt="profil" /></a></li></div>';
                }
                ?>
                <script>
     const menuButton = document.querySelector('.menu-button');
    const menuLinks = document.querySelector('.menu-links');
  menuButton.addEventListener('click', function() {
    menuLinks.classList.toggle('show-menu');
  });
</script>
            </div>
        </ul>
    </nav>
    <div id="corps">

