<style  rel = "StyleSheet" type="text/css"> @import url("css/profil.css");</style>

<div class="table">
<div class="boxgauche">
<div class="titreboxgauche">    
<h1>Mon profil</h1>
</div>
<div class="titrenavprofil">
<a href="./?action=#">Mes informations</a>
</div>
<div class="deconnexionbutton">
<a href="./?action=deconnexion">se deconnecter</a>
</div>
</div>

<div class="boxdroite">
<div class="test">
<div class="titreboxdroite">
<h1>Mes informations :</h1>
</div>
<div class="blocprofil">
    <div class="nom">Nom : <?= $util["NomUtilisateur"] ?></div>
    <div class="adresse">Adresse : <?= $util["AdresseUtilisateur"] ?> </div>
    <div class="cp">Code Postal : <?= $util["CpUtilisateur"] ?> </div>
    <div class="mail">Email : <?= $util["RoleUtilisateur"] ?> </div>
</div>
</div>



<h1>Mes réservations de test :</h1>


<!-- faire une boucle si plusieur reservation --> 

<div class="blocprofil">
<div class="numreserve">Numéros de réservation : <?= $util["AdresseUtilisateur"] ?> </div>
<div class="liaison">Liaison : <?= $util["AdresseUtilisateur"] ?> </div>
<div class="prix">Prix : <?= $util["AdresseUtilisateur"] ?> </div>
<div class="reserve">Réservation : <?= $util["AdresseUtilisateur"] ?> </div>
</div>
</div>

