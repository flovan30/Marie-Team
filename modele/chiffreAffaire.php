<?php

include_once "connexionBDD.inc.php";

function chiffreAffaire()
{
   
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByMail($mail)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where AdresseMailUtilisateur=:AdresseMailUtilisateur");
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

    if (!empty($resultat)) {
        echo "<script type='text/javascript'>
        alert('Tableau non vide')
        document.location.href = '../?action=connxeion';</script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Tableau vide')
        document.location.href = '../?action=connexion';</script>";
    }
}
