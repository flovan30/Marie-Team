<?php

include "bd.utilisateur.inc.php";


function login($mail, $mdp)
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($mail);
    $mdpBD = $util["MdpUtilisateur"];
    $user = $util["NomUtilisateur"];
    $role = $util["RoleUtilisateur"];
    $adresseUtilisateur = $util["AdresseUtilisateur"];
    $CpUtilisateur = $util["CpUtilisateur"];

    if (($mdpBD) == hash('sha256', $mdp)) {
        $_SESSION["AdresseMailUtilisateur"] = $mail;
        $_SESSION["MdpUtilisateur"] = $mdpBD;
        $_SESSION["NomUtilisateur"] = $user;
        $_SESSION["RoleUtilisateur"] = $role;
        $_SESSION["AdresseUtilisateur"] = $adresseUtilisateur;
        $_SESSION["CpUtilisateur"] = $CpUtilisateur;
    }
}




function logout()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    session_destroy();
}

function getMailLoggedOn()
{
    if (isLoggedOn()) {
        $ret = $_SESSION["AdresseMailUtilisateur"];
    } else {
        $ret = "";
    }
    return $ret;
}

function isLoggedOn()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["AdresseMailUtilisateur"])) {
        $util = getUtilisateurByMail($_SESSION["AdresseMailUtilisateur"]);
        if (
            $util["AdresseMailUtilisateur"] == $_SESSION["AdresseMailUtilisateur"] && $util["MdpUtilisateur"] == $_SESSION["MdpUtilisateur"]
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
