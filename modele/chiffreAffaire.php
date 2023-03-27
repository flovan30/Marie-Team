<?php

include_once "connexionBDD.inc.php";

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

