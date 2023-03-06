<?php

function connexionPDO() {
    $login = "root";
    $mdp = "";
    $bd = "marieteam";
    $serveur = "localhost";

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}


function getUtilisateurByMail($mail) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where AdresseMailUtilisateur like :AdresseMailUtilisateur");
        $req->bindValue(':AdresseMailUtilisateur', $mail, PDO::PARAM_STR);
        $req->execute();
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            if (is_array($ligne)) {
                $resultat[] = $ligne;
            }
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


$mail = "flo@gmail.com";
$util = getUtilisateurByMail($mail);
for ($i = 0; $i < count($util); $i++) { 
$util[$i]["NomUtilisateur"] ;
}
?>