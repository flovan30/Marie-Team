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

// pour affiche dans les reservations
function getNbPlacesPrisesPassager($idTraversee)
{
}

function getNbPlacesPrisesVehiculeInf2m($idTraversee)
{
}

function getNbPlacesPrisesVehiculeSup2m($idTraversee)
{
}
