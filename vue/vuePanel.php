<div style="margin-left: 300px">
    
    <section id=Privileges>
        
    </section>
    
    <section id=nbReservationMoy>
        
    </section>
    
    <section id=chiffreAffaire>
        
    </section>
    
    <section id=nbPersonneTransp>
        <?php

        $lastWeek = nbPassagersForLastWeek();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé cette dernière semaine :<div>';
        if ($lastWeek[0]['totalPassagers'] == 0) {
            echo '0';
        } else {
            echo $lastWeek[0]['totalPassagers'];
        }
        

        $lastMonth = nbPassagersForLastMonth();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé ce dernier mois :<div>';
        if ($lastMonth[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $lastMonth[0]['totalPassagers'];
        }

        $lastYear = nbPassagersForLastYear();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé cette dernière année :<div>';
        if ($lastYear[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $lastYear[0]['totalPassagers'];
        }

        $everytime = nbPassagersForEverytime();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé depuis le début de Marie Team :<div>';
        if ($everytime[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $everytime[0]['totalPassagers'];
        }

        ?>
    </section>
</div>