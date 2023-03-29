<div style="margin-left: 300px">
<style>
        @import url("css/pannel.css");
</style>


    <?php 
        if ($util["RoleUtilisateur"]==2) { 
    ?>
    <section id="Privileges">
  <h2>Privilèges</h2>
  <?php
  $techniciens = VerifRoleTechnicien();
  $admins = VerifRoleAdmin();
  ?>
  <table>
    <caption>Liste des utilisateurs avec des privilèges</caption>
    <thead>
      <tr>
        <th>Rôle</th>
        <th>ID</th>
        <th>Nom</th>
        <th>Adresse mail</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($techniciens as $utilisateur) {
        echo "<tr>";
        echo "<td>Technicien</td>";
        echo "<td>{$utilisateur['idUtilisateur']}</td>";
        echo "<td>{$utilisateur['nomUtilisateur']}</td>";
        echo "<td>{$utilisateur['adresseMailUtilisateur']}</td>";
        echo "</tr>";
      }
      foreach ($admins as $utilisateur) {
        echo "<tr>";
        echo "<td>Admin</td>";
        echo "<td>{$utilisateur['idUtilisateur']}</td>";
        echo "<td>{$utilisateur['nomUtilisateur']}</td>";
        echo "<td>{$utilisateur['adresseMailUtilisateur']}</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</section>
    </section>
    <?php
        }
    ?>
    
    <section id=nbReservationMoy>

    </section>
    
    <section id="chiffreAffaire">
    <h2>Chiffre d'affaire</h2>
    <table>
        <thead>
            <tr>
                <th>Période</th>
                <th>Chiffre d'affaire</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Semaine</td>
                <td><?php echo TotalchiffreAffairedelaSemaine() ?: '0'; ?></td>
            </tr>
            <tr>
                <td>Mois</td>
                <td><?php echo TotalchiffreAffaireDuMois() ?: '0'; ?></td>
            </tr>
            <tr>
                <td>Année</td>
                <td><?php echo TotalchiffreAffaireDeLannee() ?: '0'; ?></td>
            </tr>
            <tr>
                <td>Total</td>
                <td><?php echo TotalchiffreAffaire() ?: '0'; ?></td>
            </tr>
        </tbody>
    </table>
</section>

    <br><br><br>
    <section id=nbPersonneTransp>
        <?php


        $lastWeek = nbPassagersForLastWeek();
        if ($lastWeek[0]['totalPassagers'] == 0) {
            echo '0';
        } else {
            echo $lastWeekPassager[0]['totalPassagers'];
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