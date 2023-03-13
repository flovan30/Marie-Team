<?php
include_once "connexionBDD.inc.php";

function getNomPortArriveByNumTraversee()
{
    /*
    SELECT port.nomPort AS "port arrive"
FROM port
INNER JOIN liaison ON port.idPort = liaison.idPort_1
INNER JOIN traversee ON liaison.codeLiaison = traversee.codeLiaison
WHERE traversee.numTraversee like 2;
*/
}
