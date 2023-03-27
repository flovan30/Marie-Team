<?php

include_once "connexionBDD.inc.php";

function nbPassagersForLastWeek()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW();");
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

function nbPassagersForLastMonth()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW();");
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

function nbPassagersForLastYear()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW();");
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

function nbPassagersForEverytime()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1000 YEAR) AND NOW();");
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