<div style="margin-left: 300px">
    
    <section id=Privileges>
        
    </section>
    
    <section id=nbReservationMoy>

    </section>
    
    <section id=chiffreAffaire>
        <?php 


        $lastWeekCA = TotalchiffreAffairedelaSemaine();
        echo "<div>Le chiffre d'affaire de cette semaine est de : </div>";
        if ($lastWeekCA == 0) {
            echo '0';
        } else {
            echo $lastWeek;
        }


        $lastMonthCA = TotalchiffreAffaireDuMois();
        echo "<div>Le chiffre d'affaire de ce mois-ci est de : </div>";
        if ($lastMonthCA == 0) {
        echo '0';   
        } else {
        echo $lastMonthCA;
        }

        $lastYearCA = TotalchiffreAffaireDeLannee();
        echo "<div>Le chiffre d'affaire de cette année-ci est de : </div>";
        if ($lastYearCA == 0) {
        echo '0';   
        } else {
        echo $lastYearCA;
        }

        $everytimeCA = TotalchiffreAffaire();
        echo "<div>Le chiffre d'affaire total est de : </div>";
        if ($everytimeCA== 0) {
        echo '0';   
        } else {
        echo $everytimeCA;
        }

    
        
        ?>
        
    </section>
    <br><br><br>
    <section id=nbPersonneTransp>
        <?php

        $lastWeekPassager = nbPassagersForLastWeek();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé cette dernière semaine :<div>';
        if ($lastWeekPassager[0]['totalPassagers'] == 0) {
            echo '0';
        } else {
            echo $lastWeekPassager[0]['totalPassagers'];
        }
        

        $lastMonthPassager = nbPassagersForLastMonth();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé ce dernier mois :<div>';
        if ($lastMonthPassager[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $lastMonthPassager[0]['totalPassagers'];
        }

        $lastYearPassager = nbPassagersForLastYear();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé cette dernière année :<div>';
        if ($lastYearPassager[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $lastYearPassager[0]['totalPassagers'];
        }

        $everytimePassager = nbPassagersForEverytime();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé depuis le début de Marie Team :<div>';
        if ($everytimePassager[0]['totalPassagers'] == 0) {
            echo '0';   
        } else {
            echo $everytimePassager[0]['totalPassagers'];
        }

        ?>
    </section>
</div>