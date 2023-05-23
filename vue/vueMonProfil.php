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
    <div class="mail">Email : <?= $util["AdresseMailUtilisateur"] ?> </div>
</div>
</div>



<h1>Mes reservations : </h1>


<!-- faire une boucle si plusieur reservation -->



<?php 
if ($ligne >= 1) { 
for ($i = 0; $i < $ligne; $i++) {

?>

<div class="blocprofil">
<div class="numreserve">Numéros de réservation : <?= $info[$i]['numReservation'] ?> </div>
<div class="liaison">Nom de la Réservation : <?= $info[$i]["nomReservation"] ?> </div>
<div class="liaison">Date de la réservation : <?= $info[$i]["dates"] ?> </div>
<div class="prix">Prix : <?= $info[$i]["prix"] ?>€ </div>
</div>

<?php
};
}else { ?>

    <div class="blocprofil">
    <div class="reservationNonDispo">Pas de réservation disponible</div>
    </div>

<?php
}
?>
</div>

