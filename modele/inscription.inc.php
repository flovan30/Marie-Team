<?php 

if ( isset($_POST['nomInscription'])==1 && isset($_POST['mailInscription'])==1 && isset($_POST['mdpInscription'])==1 && isset($_POST['mdpVerifInscription'])==1 && isset($_POST['adresseInscription'])==1 && isset($_POST['cpInscription'])){ 
    
    $nomvalide = $_POST['nomInscription'];
    $mailvalide = $_POST['mailInscription'];
    $mdpvalide = $_POST['mdpInscription'];
    $adressevalide = $_POST['adresseInscription'];
    $cpvalide = $_POST['cpInscription'];
    $mdpVerifvalide = $_POST['mdpVerifInscription'];
    $connexion = 0;
    if ($mdpvalide == $mdpVerifvalide) { 
    $server="localhost";
    $name="root";   
    $mdp="";
    $base=mysqli_connect($server,$name,$mdp,"marieteam");

    /* Verification mail */


    $resultat = mysqli_query($base, "SELECT AdresseMailUtilisateur FROM utilisateur");

    while ($verifiMail = mysqli_fetch_row($resultat)) { 
        if ($verifiMail==$adressevalide){
                    $connexion = 1; 
                }  
        }  
        
    
    
        if ($base){ 
            $requete = 'INSERT INTO utilisateur (NomUtilisateur,AdresseMailUtilisateur,MdpUtilisateur,AdresseUtilisateur,CpUtilisateur) VALUES ("'. $nomvalide . '","' . $mailvalide . '","' . hash('sha256',$mdpvalide)  . '","' . $adressevalide . '",' . $cpvalide .  ')';
            mysqli_query($base, $requete);
            echo $requete;
            echo "test reussite";
            

            echo "<script type='text/javascript'>
            alert('Votre compte a été bien registré')</script>";

        }
        else { 
            echo "<script type='text/javascript'>
            alert('test loupé   ')</script> ";
        }
    }
    else {
        echo "<script type='text/javascript'>
        alert('Mot de passe différents')
        document.location.href = '../?action=inscription';</script>";
    }
    
}
else {
    echo "error formulaire";
}

?>