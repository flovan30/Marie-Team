<?php

include "bd.utilisateur.inc.php";


function login($mail, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($mail);
    $mdpBD = $util["MdpUtilisateur"];
    if (($mdpBD) == hash('sha256' , $mdp)) {
        $_SESSION["AdresseMailUtilisateur"] = $mail;
        $_SESSION["MdpUtilisateur"] = $mdpBD;
    }
}

function getMailLoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["AdresseMailUtilisateur"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["AdresseMailUtilisateur"]);
    unset($_SESSION["MdpUtilisateur"]);
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["AdresseMailUtilisateur"])) {
        $util = getUtilisateurByMail($_SESSION["AdresseMailUtilisateur"]);
        if ($util["AdresseMailUtilisateur"] == $_SESSION["AdresseMailUtilisateur"] && $util["MdpUtilisateur"] == $_SESSION["MdpUtilisateur"]
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