<?php
include_once "connexionBDD.inc.php";

function getSecteur()
{
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from secteur");
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

function getLiaisonByIdSecteur($idSecteur)
{
    $resultat = array();
    $cnx = connexionPDO();
    try {
        $req = $cnx->prepare("select * from liaison where idSecteur like :idSecteur");
        $req->bindValue(':idSecteur', $idSecteur, PDO::PARAM_STR);
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

function getPortById($idPort)
{
    $resultat = array();

    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $cnx = connexionPDO();

        $req = $cnx->prepare("select * from port where idPort like :idPort");
        $req->bindValue(':idPort', $idPort, PDO::PARAM_INT);

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


// ########## code logique destination commence ici ##############################
function getTraverseeByCodeLiaisonAndDate($codeLiaison, $date)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from traversee where codeLiaison like :codeLiaison AND dateTraversee like :date");
        $req->bindValue(':codeLiaison', $codeLiaison, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);

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

// recupere le nombre de place qui sont deja prise pour une traversee pour la categorie passager
function getNbPlacesPrisesPassager($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(quantité) AS 'PlacesPrisesPassager' FROM enregistrer INNER JOIN reservation ON enregistrer.numReservation = reservation.numReservation INNER JOIN traversee ON reservation.numTraversee = traversee.numTraversee WHERE traversee.numTraversee like :idTraversee AND enregistrer.codeCategorie = 'A'");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['PlacesPrisesPassager'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// recupere le nombre de place qui sont deja prise pour une traversee pour la categorie vehicule inférieur a 2m
function getNbPlacesPrisesVehiculeInf2m($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(quantité) AS 'PlacesPrisesVehiculeInf2m' FROM enregistrer INNER JOIN reservation ON enregistrer.numReservation = reservation.numReservation INNER JOIN traversee ON reservation.numTraversee = traversee.numTraversee WHERE traversee.numTraversee like :idTraversee AND enregistrer.codeCategorie = 'B'");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['PlacesPrisesVehiculeInf2m'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// recupere le nombre de place qui sont deja prise pour une traversee pour la categorie vehicule supérieur a 2m
function getNbPlacesPrisesVehiculeSup2m($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT SUM(quantité) AS 'PlacesPrisesVehiculeSup2m' FROM enregistrer INNER JOIN reservation ON enregistrer.numReservation = reservation.numReservation INNER JOIN traversee ON reservation.numTraversee = traversee.numTraversee WHERE traversee.numTraversee like :idTraversee AND enregistrer.codeCategorie = 'C'");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['PlacesPrisesVehiculeSup2m'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// recupére le nombre de place disponible au maximum dans le bateau pour chaque categorie
function getnbPlacesDispoPassagerByTraversee($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT contenir.capacitéMax AS 'nbPlacesDispoPassager' FROM bateau INNER JOIN traversee ON bateau.idBateau = traversee.idBateau INNER JOIN contenir ON bateau.idBateau = contenir.idBateau WHERE numTraversee like :idTraversee AND contenir.codeCategorie = 'A';");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['nbPlacesDispoPassager'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// en cours
function getnbPlacesDispoVehiculeInf2mByTraversee($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT contenir.capacitéMax AS 'nbPlacesDispoVehiculeInf2m' FROM bateau INNER JOIN traversee ON bateau.idBateau = traversee.idBateau INNER JOIN contenir ON bateau.idBateau = contenir.idBateau WHERE traversee.numTraversee like :idTraversee AND codeCategorie = 'B'");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['nbPlacesDispoVehiculeInf2m'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}
function getnbPlacesDispoVehiculeSup2mByTraversee($idTraversee)
{
    $resultat = array();
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT contenir.capacitéMax AS 'nbPlacesDispoVehiculeSup2m' FROM bateau INNER JOIN traversee ON bateau.idBateau = traversee.idBateau INNER JOIN contenir ON bateau.idBateau = contenir.idBateau WHERE traversee.numTraversee like :idTraversee AND codeCategorie = 'C'");
        $req->bindValue(':idTraversee', $idTraversee, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        if ($resultat) {
            return $resultat['nbPlacesDispoVehiculeSup2m'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

// calcul le nombre de place disponible pour une traversee
function getnbPlacesRestantePassager($idTraversee)
{
    $placePrises = getNbPlacesPrisesPassager($idTraversee);
    $placeDispo = getnbPlacesDispoPassagerByTraversee($idTraversee);

    return $placeDispo - $placePrises;
}

function getnbPlacesRestanteVehiculeInf2m($idTraversee)
{
    $placePrises = getNbPlacesPrisesVehiculeInf2m($idTraversee);
    $placeDispo = getnbPlacesDispoVehiculeInf2mByTraversee($idTraversee);

    return $placeDispo - $placePrises;
}

function getnbPlacesRestanteVehiculeSup2m($idTraversee)
{
    $placePrises = getNbPlacesPrisesVehiculeSup2m($idTraversee);
    $placeDispo = getnbPlacesDispoVehiculeSup2mByTraversee($idTraversee);

    return $placeDispo - $placePrises;
}
