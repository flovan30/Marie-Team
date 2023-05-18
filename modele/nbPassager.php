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
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
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
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
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
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
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
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastWeekByCodeCategorieA()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'A'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW();");
        $req->execute();    
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastWeekByCodeCategorieB()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'B'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW();");
        $req->execute();    
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastWeekByCodeCategorieC()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'C'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW();");
        $req->execute();    
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastMonthByCodeCategorieA()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'A'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastMonthByCodeCategorieB()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'B'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastMonthByCodeCategorieC()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'C'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastYearByCodeCategorieA()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'A'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastYearByCodeCategorieB()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'B'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersLastYearByCodeCategorieC()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'C'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersForEverytimeByCodeCategorieA()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'A'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 800 DAY) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersForEverytimeByCodeCategorieB()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'B'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 800 DAY) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function nbPassagersForEverytimeByCodeCategorieC()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select sum(e.quantité) AS totalPassagers, e.codeCategorie
        FROM enregistrer e, reservation r, traversee t
        WHERE e.numReservation = r.numReservation AND r.numTraversee = t.numTraversee
        AND codeCategorie = 'C'
        AND t.dateTraversee BETWEEN DATE_SUB(NOW(), INTERVAL 800 DAY) AND NOW();");
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}