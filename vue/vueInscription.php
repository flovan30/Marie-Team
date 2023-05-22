<style>
        @import url("css/inscription.css");
</style>

<div class="boxSignIn">

        <div class="formSignIn">
                <h1>Inscription</h1><br>

                <form action="modele/inscription.inc.php" method="POST">
                        <input class="textInputSignIn" type="text" class="" name="nomInscription" placeholder="Votre Nom" required /><br><br>
                        <input class="textInputSignIn" type="text" class="" name="mailInscription" placeholder="Votre Email" required /><br><br>
                        <input class="textInputSignIn" type="password" class="" name="mdpInscription" placeholder="Mot de passe" required /><br><br>
                        <input class="textInputSignIn" type="password" class="" name="mdpVerifInscription" placeholder="Verifiez votre mot de passe" required /><br><br>
                        <input class="textInputSignIn" type="text" class="" name="adresseInscription" placeholder="Votre Adresse" required  /><br><br>  
                        <input class="textInputSignIn" type="text" class="box-input" name="cpInscription" placeholder="Code Postal" /><br><br>
                
                        <input class="buttonSignIn SignInSubmit" type="submit" value="Confirmer"/><br><br>
                        <input class="buttonSignIn SignInSubmit" type="reset" value="Effacer"/><br><br>
                </form> 
                <a class="leaveButton" href="./?action=defaut">Retour a l'accueil</a><br>
        </div>  
        

        <p class="imageSignIn">
                <img src="./images/imgconnexion.jpg" />
        </p>
</div>