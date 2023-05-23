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

<section id=nbPersonneTransp>

        <?php

        $lastWeek = nbPassagersForLastWeek();
        $lastMonth = nbPassagersForLastMonth();
        $lastYear = nbPassagersForLastYear();
        $everytime = nbPassagersForEverytime();

        $lastWeekByCategorieA = nbPassagersLastWeekByCodeCategorieA();
        $lastMonthByCategorieA = nbPassagersLastMonthByCodeCategorieA();
        $lastYearByCategorieA = nbPassagersLastYearByCodeCategorieA();
        $evertimeByCategorieA = nbPassagersForEverytimeByCodeCategorieA();

        $lastWeekByCategorieB = nbPassagersLastWeekByCodeCategorieB();
        $lastMonthByCategorieB = nbPassagersLastMonthByCodeCategorieB();
        $lastYearByCategorieB = nbPassagersLastYearByCodeCategorieB();
        $evertimeByCategorieB = nbPassagersForEverytimeByCodeCategorieB();

        $lastWeekByCategorieC = nbPassagersLastWeekByCodeCategorieC();
        $lastMonthByCategorieC = nbPassagersLastMonthByCodeCategorieC();
        $lastYearByCategorieC = nbPassagersLastYearByCodeCategorieC();
        $evertimeByCategorieC = nbPassagersForEverytimeByCodeCategorieC();

        ?>

        <h2>Nombre de passagers</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Catégorie</th>
                    <th>Par semaine</th>
                    <th>Par mois</th>
                    <th>Par an</th>
                    <th>Depuis le début</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Passager</td>
                    <td><?php echo $lastWeekByCategorieA['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastMonthByCategorieA['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastYearByCategorieA['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $evertimeByCategorieA['totalPassagers'] ?: '0'; ?></td>
                </tr>
                <tr>
                    <td>Véhicule < 2m</td>
                    <td><?php echo $lastWeekByCategorieB['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastMonthByCategorieB['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastYearByCategorieB['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $evertimeByCategorieB['totalPassagers'] ?: '0'; ?></td>
                </tr>
                <tr>
                    <td>Véhicule > 2m</td>
                    <td><?php echo $lastWeekByCategorieC['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastMonthByCategorieC['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastYearByCategorieC['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $evertimeByCategorieC['totalPassagers'] ?: '0'; ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td><?php echo $lastWeek['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastMonth['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $lastYear['totalPassagers'] ?: '0'; ?></td>
                    <td><?php echo $everytime['totalPassagers'] ?: '0'; ?></td>
                </tr>
            </tbody>
        </table>
        <br><br><br>
</section>
<section id=nbPersonneTransp>
<h2>Ajout de liaison</h2>

<form action="./?action=panel" method="POST">
    <label for="port1">Port 1 :</label>
    <select name="Port1" id="port1">
        <?php 
        for ($i = 0; $i < count($listePort); $i++) {
            echo '<option value="'.$listePort[$i]['nomPort'].'">'.$listePort[$i]['nomPort'].'</option>';
        }
        ?>
    </select>
    <br>
    <p>Vers</p>
    <label for="port2">Port 2 :</label>
    <select name="Port2" id="port2">
        <?php 
        for ($i = 0; $i < count($listePort); $i++) {
            echo '<option value="'.$listePort[$i]['nomPort'].'">'.$listePort[$i]['nomPort'].'</option>';
        }
        ?>
    </select>
    <br><br>
    Distance : <input type="number" name="distance" step="1" required><br><br>
    <label for="secteur">Secteur :</label>
    <select name="secteur" id="secteur">
        <?php
        for ($i = 0; $i < count($listeSecteur); $i++) {
            echo '<option value="'.$listeSecteur[$i]['nomSecteur'].'">'.$listeSecteur[$i]['nomSecteur'].'</option>';
        }
        ?>
    </select><br><br>        
    <input class="buttonSignIn SignInSubmit" type="submit" value="Confirmer"/><br><br>
</form>

</section>

</div>