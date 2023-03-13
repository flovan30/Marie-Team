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
        if ($util["RoleUtilisateur"]=1) {
            echo "Technicien";
        }
        elseif ($util["RoleUtilisateur"]=2) {
            echo "Admin";
        }
        else {
            echo "Qu'est tu fou ici";
        }
        
        ?></p>
        </div>
    </div>
    
	<ul>
		<li><a href="#">Utilisateur</a></li> 
		<li><a href="#">Bateau</a></li>
		<li><a href="#">Port</a></li>
        <li><a href="#">Secteur</a></li>
        <li><a href="#">Liaison</a></li>
        <li><a href="#">Logs</a></li>
	</ul>
</div>
