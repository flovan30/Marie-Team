<style>
        @import url("css/connexion.css");
</style>

<div class="boxLogin">

    <div class="formLogin">
        <h1>Connexion</h1><br>

        <form action="<?php $racine.'./?action=connexion'?>" method="POST">
            <input class="textInputLogin" type="text" name="AdresseMailUtilisateur" placeholder="Adresse Mail"/><br><br>
            <input class="textInputLogin" type="password" name="MdpUtilisateur" placeholder="Mot de passe" /><br>
            <a class="textLogin" href="#"><i>Mot de passe oublié ?</i></a><br><br>
            <hr>
            <br>
            <input class="buttonLogin loginSubmit" type="submit" value="CONNEXION"/><br><br>
        </form>
        <a href="./?action=inscription"><button class="buttonLogin signInButton">INSCRIPTION</button></a><br><br><br><br>
        <a class="leaveButton" href="./?action=defaut">Retour a l'accueil</a><br>
    </div>  

    <p class="imageLogin">
        <img src="./images/imgconnexion.jpg" />
    </p>

</div>