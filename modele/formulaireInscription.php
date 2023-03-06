<?php


function VerifInscription() {

$maj = FALSE;
$min = FALSE;
$chi = FALSE;
$cara = FALSE;
$longeurMdp = FALSE ;
$mail = 0;
$nume=0;
$location=1;

$Nomvalide = false ;
$Emailvalide = false ;
$CPvalide = false ;
$Mdpvalide = false ;


if (isset($_POST['AdresseUtilisateur'])) {
    $adressebd = $_POST['AdresseUtilisateur'];
}

if (isset($_POST['MdpUtilisateur'])) { 
    $lengthMdp = strlen($_POST['MdpUtilisateur']);
}

if (isset($_POST['NomUtilisateur'])) { 
    $long = strlen($_POST['NomUtilisateur']);
} 

if (isset($_POST['CPUtilisateur'])) { 
    $CP = strlen($_POST['CPUtilisateur']);
}   

if ( isset($_POST['NomUtilisateur'])== 1 && isset($_POST['AdresseUtilisateur'])==1 &&  isset($_POST['MdpUtilisateur'])==1 && isset($_POST['CPUtilisateur'])){ 
    
    $prenombd = $_POST['prenom'];
    $nombd = $_POST['nom'];
    $mailbd = $_POST['mail'];
    $telbd = $_POST['tel'];
    $mdpbd = $_POST['mdp'];

    for($i=0; $i < $lengthMdp ; $i++) { 
        if ($_POST['MdpUtilisateur'][$i]>=chr(65) && $_POST['MdpUtilisateur'][$i]<=chr(90)) {
            $maj = TRUE;
        }

        if ($_POST['MdpUtilisateur'][$i]>=chr(97) && $_POST['MdpUtilisateur'][$i]<=chr(122)) {
            $min = TRUE;
        }

        if ($_POST['mMdpUtilisateurdp'][$i]>=chr(48) && $_POST['MdpUtilisateur'][$i]<=chr(57)) {
            $chi = TRUE;
        }

        if (($_POST['MdpUtilisateur'][$i]>=chr(33) && $_POST['MdpUtilisateur'][$i]<=chr(47)) || ($_POST['MdpUtilisateur'][$i]>=chr(58) && $_POST['MdpUtilisateur'][$i]<=chr(64)) || ($_POST['MdpUtilisateur'][$i]>=chr(91) && $_POST['MdpUtilisateur'][$i]<=chr(96)) || ($_POST['MdpUtilisateur'][$i]>=chr(123) && $_POST['MdpUtilisateur'][$i]<=chr(126))) {
            $cara = TRUE;
        } 
        
        if ($lengthMdp > 8){
            $longeurMdp = TRUE;
        }
    }


    if ($maildoublons !=1) { 
        for($i=0; $i < $long; $i++) { 
            if ($_POST['mail'][$i]==chr(64)){
                $mailvalide = true;
            }   
        }
    }
    else {
        $mailExistance = "cette adresse mail a été déja utilisé";
    }
    

    if ( $CP == 5 ) {
        for($i=0; $i < $length; $i++) { 
            if ($_POST['tel'][$i] >=chr(48) && $_POST['tel'][$i] <=chr(57)){
                $telvalide=true;
            }
        }
    }

    if ( isset($_POST['NomUtilisateur'])){
        $prenomvalide=true;
    }
    if ( isset($_POST['A'])){
        $nomvalide=true;
    }




    if ($maj == FALSE || $min == FALSE || $chi == FALSE || $cara == FALSE || $longeurMdp == FALSE) {
        $message ="votre mot de passe dois contenir au moins un majuscule,une minujuscule, un chiffre et un caractère et dois avoir au moins 8 caractères";
    }

    else {
        $mdpvalide = true;
    }
    
}

}

?>