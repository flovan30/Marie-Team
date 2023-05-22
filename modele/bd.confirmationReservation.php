<?php

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

function getHeureTraverseeByNumTraversee($numTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT DATE_FORMAT(heureDepartTraversee, '%H:%i') AS 'heureDepartTraversee' FROM traversee WHERE traversee.numTraversee like :numTraversee;");
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['heureDepartTraversee'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

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

function createReservationWithUserSession($nomReservation, $adresseReservation, $cpReservation, $numTraversee, $prix , $mail)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO reservation (nomReservation, adresseReservation, cpReservation, villeReservation, numTraversee, dates, prix , AdresseMailUtilisateur) VALUES (:nomReservation, :adresseReservation, :cpReservation, 'ville', :numTraversee, NOW(), :prix, :AdresseMailUtilisateur)");
        $req->bindValue(':nomReservation', $nomReservation, PDO::PARAM_STR);
        $req->bindValue(':adresseReservation', $adresseReservation, PDO::PARAM_STR);
        $req->bindValue(':cpReservation', $cpReservation, PDO::PARAM_STR);
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->bindValue(':prix', $prix, PDO::PARAM_INT);
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// récupère le numReservation de la dernière réservation de l'utilisateur
function getTotalReservationByUserInfo($mail)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM reservation WHERE AdresseMailUtilisateur = :AdresseMailUtilisateur");
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
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

function getNumReservationByUserInfo($nomReservation, $adresseReservation, $cpReservation, $numTraversee, $mail)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT numReservation FROM reservation WHERE nomReservation LIKE :nomReservation AND adresseReservation LIKE :adresseReservation AND cpReservation LIKE :cpReservation AND numTraversee LIKE :numTraversee AND adresseMailUtilisateur LIKE :adresseMailUtilisateur ORDER BY numReservation DESC LIMIT 1");
        $req->bindValue(':nomReservation', $nomReservation, PDO::PARAM_STR);
        $req->bindValue(':adresseReservation', $adresseReservation, PDO::PARAM_STR);
        $req->bindValue(':cpReservation', $cpReservation, PDO::PARAM_STR);
        $req->bindValue(':numTraversee', $numTraversee, PDO::PARAM_INT);
        $req->bindValue(':adresseMailUtilisateur', $mail, PDO::PARAM_STR);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return intval($resultat['numReservation']);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

function getCountReservationByUserInfo($mail)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) AS total FROM reservation WHERE AdresseMailUtilisateur = :AdresseMailUtilisateur");
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetchColumn();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}

function getLaReservationByUserInfo($mail)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT COUNT(*) AS total FROM reservation WHERE AdresseMailUtilisateur = :AdresseMailUtilisateur");
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetchColumn();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $ligne;
}



function createEnregistrementWithInfoTypeAndNumReservation($codeCategorie, $numType, $numReservation, $quantite)
{
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO enregistrer (codeCategorie, numType, numReservation, quantité) VALUES (:codeCategorie, :numType, :numReservation, :quantite)");
        $req->bindValue(':codeCategorie', $codeCategorie, PDO::PARAM_STR);
        $req->bindValue(':numType', $numType, PDO::PARAM_INT);
        $req->bindValue(':numReservation', $numReservation, PDO::PARAM_INT);
        $req->bindValue(':quantite', $quantite, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}
