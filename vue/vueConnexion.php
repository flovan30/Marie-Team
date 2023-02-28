<h1>Connexion</h1>

<form action="<?php $racine.'./?action=connexion'?>" method="POST">
    <input type="text" name="AdresseMailUtilisateur" placeholder="Adresse Mail"/>
    <input type="password" name="MdpUtilisateur" placeholder="Mot de passe" />
    <a href="#"><i>Mot de passe oublié ?</i></a>
    <input type="submit" value="CONNEXION"/>

</form>
<a href="./?action=inscription">Pas encore inscrit ? cliquez ICI</a>
<a href="./?action=defaut"><- Retour a l'accueil</a>

