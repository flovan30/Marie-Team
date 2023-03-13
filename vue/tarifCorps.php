<style type="text/css">
   @import url("css/tarifCorps.css");
</style>

<main>
   <?php
   $liaisons = getLiaisons();
   $periodes = getPeriode();
   ?>
   <br><br>

   <div class="parentGrill">

      <div class="formLists">

         <form action="<?php $_PHP_SELF ?>" method="POST">

            <div class="selectForm oneForm">

               <label for="liaisons-select">Pour quelle liaison souhaitez vous voyager ?</label><br><br>
               <select name="liaisons" id="liaisons-select">
                  <option value="">-- Choisissez une option --</option>
                  <?php
                  for ($i = 0; $i < count($liaisons); $i++) {
                     $port1 = getPortById($liaisons[$i]["idPort"]);
                     $port2 = getPortById($liaisons[$i]["idPort_1"]);
                     echo '<option value="' . $liaisons[$i]["codeLiaison"] . '">' . $port1[0]["nomPort"] . ' - ' . $port2[0]["nomPort"] . '</option>';
                  }
                  ?>
               </select>

            </div>

            <div class="selectForm twoForm">

               <label for="period-select">Pour quelle période souhaitez vous voyager ?</label><br><br>
               <select name="periods" id="period-select">
                  <option value="">-- Choisissez une option --</option>
                  <?php
                  for ($i = 0; $i < count($periodes); $i++) {
                     echo '<option value="' . $periodes[$i]["idPeriode"] . '">' . $periodes[$i]["dateDebutPeriode"] . ' - ' . $periodes[$i]["dateFinPeriode"] . '</option>';
                  }
                  ?>
               </select>

<<<<<<< HEAD
         </div>
   </div><br><br>  
         
         <div class="inputContainer">
            <input class="threeForm" type="submit"></input>
         </div>   
=======
            </div>
      </div><br><br>
>>>>>>> 38acbc49ac51fa4fc7de991cade34cbe648fe3cc

      <div class="inputContainer">
         <input class="threeForm" type="submit"></input>
      </div>

   </div>

   </form><br><br><br>

   <?php

   if (isset($_POST["periods"]) && isset($_POST["liaisons"])) {

   ?>
      <hr><br><br>
   <?php

      $periode = $_POST["periods"];
      $liaison = $_POST["liaisons"];
      $tarif = getTarifByIds($periode, $liaison);

      echo "Passager :<br>";
      echo "Adulte : " . $tarif[0]["prix"] . "€ <br>";
      echo "Junior (8 à 18 ans) : " . $tarif[1]["prix"] . "€ <br>";
      echo "Enfant (0 à 7 ans) : " . $tarif[2]["prix"] . "€ <br>";
      echo "Véhicule <2m <br>";
      echo "Voiture inf. 4m : " . $tarif[3]["prix"] . "€ <br>";
      echo "Voiture inf. 5m : " . $tarif[4]["prix"] . "€ <br>";
      echo "Véhicule >2m :<br>";
      echo "Fourgon : " . $tarif[5]["prix"] . "€ <br>";
      echo "Campign Car : " . $tarif[6]["prix"] . "€ <br>";
      echo "Camion : " . $tarif[7]["prix"] . "€ <br>";
   } else {
   }
   ?>

<<<<<<< HEAD
               $periode = $_POST["periods"];
               $liaison = $_POST["liaisons"];
               $tarif= getTarifByIds($periode, $liaison);

      ?> 
            
         
      <?php  
               echo "<div class='tarifLists oneTarif'><div class='columnPass textLign'>Passager :</div><br>";
               echo "<div class='columnPass bigVerticalBar'>Adulte : <br>".$tarif[0]["prix"]."€ </div><br>";
               echo "<div class='columnPass verticalBar'>Junior (8 à 18 ans) : <br>".$tarif[1]["prix"]."€ </div><br>";
               echo "<div class='columnPass verticalBar'> Enfant (0 à 7 ans) : <br>".$tarif[2]["prix"]."€ </div><br>";
               echo "</div><div class='tarifLists twoTarif'><div class='columnPass textLign'>Véhicule <2m :</div><br>";
               echo "<div class='columnPass bigVerticalBar'>Voiture inf. 4m : <br>".$tarif[3]["prix"]."€ </div><br>";
               echo "<div class='columnPass verticalBar'>Voiture inf. 5m : <br>".$tarif[4]["prix"]."€ </div><br>";
               echo "</div><div class='tarifLists threeTarif'><div class='columnPass textLign'>Véhicule >2m :</div><br>";
               echo "<div class='columnPass bigVerticalBar'>Fourgon : <br>".$tarif[5]["prix"]."€ </div><br>";
               echo "<div class='columnPass verticalBar'>Campign Car : <br>".$tarif[6]["prix"]."€ </div><br>";
               echo "<div class='columnPass verticalBar'>Camion : <br>".$tarif[7]["prix"]."€ </div><br></div>";  
               exit(); 
            } else {
               
         }
      ?>
      
   
=======
>>>>>>> 38acbc49ac51fa4fc7de991cade34cbe648fe3cc

</main>