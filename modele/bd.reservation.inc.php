<?php
function getNomPortArriveByNumTraversee($numTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT port.nomPort AS 'port_arrive' FROM port INNER JOIN liaison ON port.idPort = liaison.idPort_1 INNER JOIN traversee ON liaison.codeLiaison = traversee.codeLiaison WHERE traversee.numTraversee like :numTraversee;");
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['port_arrive'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getNomPortDepartByNumTraversee($numTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT port.nomPort AS 'port_depart' FROM port INNER JOIN liaison ON port.idPort = liaison.idPort INNER JOIN traversee ON liaison.codeLiaison = traversee.codeLiaison WHERE traversee.numTraversee like :numTraversee;");
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['port_depart'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}
function getInfosTraverseeByNumTraversee($numTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM traversee WHERE traversee.numTraversee like :numTraversee;");
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getDateTraverseeByNumTraversee($numTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT CONCAT(DATE_FORMAT(dateTraversee, '%d '), MONTHNAME(dateTraversee), DATE_FORMAT(dateTraversee, ' %Y')) AS 'dateTraversee' FROM traversee WHERE traversee.numTraversee like :numTraversee;");
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// les fonction ci-dessous servent a trouver le prix de chaque type 
function getAllType()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM type");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getInfoTypeByLibelleType($libelleType)
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM type WHERE libelleType like :libelleType");
        $req->bindValue(':libelleType', $libelleType, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getIdPeriodeWithDateActuelle()
{
    $resutat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT idPeriode FROM periode WHERE NOW() BETWEEN periode.dateDebutPeriode AND periode.dateFinPeriode");
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['idPeriode'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getPrixByCodeCategorieAndNumTypeAndIdPeriode($codeCategorie, $numType, $idPeriode, $codeLiaison)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT prix FROM tarifer WHERE codeCategorie LIKE :codeCategorie AND numType LIKE :numType AND idPeriode LIKE :idPeriode AND codeLiaison = :codeLiaison");
        $req->bindValue(':codeCategorie', $codeCategorie, PDO::PARAM_STR);
        $req->bindValue(':numType', $numType, PDO::PARAM_INT);
        $req->bindValue(':idPeriode', $idPeriode, PDO::PARAM_INT);
        $req->bindValue(':codeLiaison', $codeLiaison, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return intval($resultat['prix']);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}
