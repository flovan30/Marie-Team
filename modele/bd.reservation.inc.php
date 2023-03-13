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
function getInfoTraverseeByNumTraversee($numTraversee)
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
