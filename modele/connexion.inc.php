<?php

include "bd.utilisateur.inc.php";


function login($mail, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($mail);
    $mdpBD = $util["mdpUtilisateur"];

    if (($mdpBD) == hash('sha256' , $mdp)) {
        $_SESSION["mailCo"] = $mail;
        $_SESSION["mdpCo"] = $mdpBD;
        //$_SESSION["idcompte"] = $idCompte;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["mail"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getUtilisateurByMail($_SESSION["mail"]);
        if ($util["mail"] == $_SESSION["mail"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("test@bts.sio", "sio");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>