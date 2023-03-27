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
            echo "Qu'est tu fou ici";
        }
        
        ?></p>
        </div>
    </div>
    
	<ul>
		<li><a href="#">Liaison</a></li>
        <li><a href="#">Nombre de reservation en moyenne</a></li> 
		<li><a href="#">Chiffre d'affaire</a></li>
		<li><a href="#">Le nb de personne transporté</a></li>
        <li><a href="#">nb de personne par catégorie</a></li>

	</ul>
</div>
