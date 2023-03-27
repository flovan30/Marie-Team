<?php

include_once "connexionBDD.inc.php";

function TotalchiffreAffairedelaSemaine()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(prix) AS total FROM RESERVATION WHERE reservation.dates BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $total = $resultat['total'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $total;
}


function TotalchiffreAffaireDuMois()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(prix) AS total FROM RESERVATION WHERE reservation.dates BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $total = $resultat['total'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $total;
}

function TotalchiffreAffaireDeLannee()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(prix) AS total FROM RESERVATION WHERE reservation.dates BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $total = $resultat['total'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $total;
}

function TotalchiffreAffaire()
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(prix) AS total FROM RESERVATION");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        $total = $resultat['total'];
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $total;
}

