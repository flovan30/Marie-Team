<style>
        @import url("css/connexion.css");
</style>

<div class="boxLogin">
    <h1>Connexion</h1><br>

    <form action="<?php $racine.'./?action=connexion'?>" method="POST">
        <input class="textInputLogin" type="text" name="AdresseMailUtilisateur" placeholder="Adresse Mail"/><br><br>
        <input class="textInputLogin" type="password" name="MdpUtilisateur" placeholder="Mot de passe" /><br>
        <a class="textLogin" href="#"><i>Mot de passe oublié ?</i></a><br><br>
        <hr>
        <br>
        <input class="buttonLogin loginSubmit" type="submit" value="CONNEXION"/><br><br>
    </form>
    <button class="buttonLogin signInButton"><a href="./?action=inscription">INSCRIPTION</a></button><br><br><br>
    <a class="leaveButton" href="./?action=defaut"><- Retour a l'accueil</a><br>
</div>
