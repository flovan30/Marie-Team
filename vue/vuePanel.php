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
        if ($lastWeek[0]['totalPassagers'] == 0) {
            echo '0';
        } else {
            echo $lastWeek[0]['totalPassagers'];
        }
        

        $lastMonth = nbPassagersForLastMonth();
        $lastYear = nbPassagersForLastYear();
        $everytime = nbPassagersForEverytime();
        $evertimeByCategorie = nbPassagersForEverytimeByCodeCategorie();
        echo '<div>Nombre de passagers ayant reservé et ayant voyagé selon la catégorie :<div>';
        echo '
        <table>
            <tr>
                <td></td>
                <td>Par semaine</td>
                <td>Par mois</td>
                <td>Par an</td>
                <td>Depuis le début</td>
            </tr>
            <tr>
                <td>Catégorie "Passager"</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Catégorie "Véhicule < 2m"</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>  
            </tr>
            <tr>
                <td>Catégorie "Véhicule > 2m"</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Total';
                echo '</td><td>';

                echo '</td><td>';
                    if ($lastMonth[0]['totalPassagers'] == 0) {
                        echo '0';   
                    } else {
                        echo $lastMonth[0]['totalPassagers'];
                    }
                echo '</td><td>';
                    if($lastYear[0]['totalPassagers'] == 0) {
                        echo '0';   
                    } else {
                        echo $lastYear[0]['totalPassagers'];
                    }
                echo '</td><td>';
                    if ($everytime[0]['totalPassagers'] == 0) {
                        echo '0';   
                    } else {
                        echo $everytime[0]['totalPassagers'];
                    }
                echo '</td>  
            </tr>
      </table>
      ';

        ?>
    </section>
</div>