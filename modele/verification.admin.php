<?php

include_once "connexionBDD.inc.php";

function VerifRoleTechnicien()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select idUtilisateur, nomUtilisateur, adresseMailUtilisateur from utilisateur where RoleUtilisateur = 1;");
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

function VerifRoleAdmin()
{
     try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select idUtilisateur, nomUtilisateur, adresseMailUtilisateur from utilisateur where RoleUtilisateur = 2;");
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

?>