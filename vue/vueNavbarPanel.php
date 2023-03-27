<style>
    @import url("css/navbarPanel.css");
</style>
<div class="sidebar">
    <div class="welcomeNav">
        <p>Profil : <?= $test = $util["NomUtilisateur"] ?></p>
    </div>
    <div class="titreNav">
        <p>Pannel</p>
        <div class="roleNav">
        <p>Votre status : <?php  
        if ($util["RoleUtilisateur"]==1) {
            echo "Technicien";
        }
        elseif ($util["RoleUtilisateur"]==2) {
            echo "Admin";
        }
        else {
            echo "Qu'est-ce que tu fous ici";
        }
        
        ?></p>
        </div>
    </div>
    
	<ul>
		<li><a href="#Privileges">Table des privilèges</a></li>
        <li><a href="#nbReservationMoy">Réservations moyennes</a></li> 
		<li><a href="#chiffreAffaire">Chiffre d'affaire</a></li>
		<li><a href="#nbPersonneTransp">Nombre de passagers</a></li>

	</ul>
</div>
