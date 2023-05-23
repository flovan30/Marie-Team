<?php

function getNamePort()
{
    $resultat = array();
    $cnx = connexionPDO();
    try {
        $req = $cnx->prepare("select nomPort from port");
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

function getNameSecteur()
{
    $resultat = array();
    $cnx = connexionPDO();
    try {
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

function getIdSecteur($NomSecteur){
    $cnx = connexionPDO();
    try {
        $req = $cnx->prepare("select idSecteur from secteur where nomSecteur = :nomSecteur");
        $req->bindValue(':nomSecteur', $NomSecteur, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne) {
            return $ligne['idSecteur'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getIdPort($NomPort){
    $cnx = connexionPDO();
    try {
        $req = $cnx->prepare("select idPort from port where nomPort = :nomPort");
        $req->bindValue(':nomPort', $NomPort, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        if ($ligne) {
            return $ligne['idPort'];
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function AddLiaison($port1 , $port2 , $distancePort , $NomSecteur) {
    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("INSERT INTO liaison (distanceLiaison, idPort, idPort_1, idSecteur) VALUES (:distanceLiaison, :idPort, :idPort_1, :idSecteur)");
        $req->bindValue(':distanceLiaison', $distancePort, PDO::PARAM_INT);
        $req->bindValue(':idPort', $port1, PDO::PARAM_INT);
        $req->bindValue(':idPort_1', $port2, PDO::PARAM_INT);
        $req->bindValue(':idSecteur', $NomSecteur, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return 0;
}

?>