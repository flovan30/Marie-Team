<style type="text/css"> @import url("css/tarifCorps.css");</style>

<main>
   <?php
      $liaisons= getLiaisons();
      $periodes= getPeriode();
   ?>
   <br><br>
   <div class="parentGrill">
      <form  action = "<?php $_PHP_SELF ?>" method = "POST">
      <div class="oneForm">
         <label for="liaisons-select">Pour quelle liaison souhaitez vous voyager ?</label><br>
            <select name="liaisons" id="liaisons-select">
               <option value="">--Choisissez une option--</option>
               <?php
                  for ($i = 0; $i < count($liaisons); $i++) {
                     $port1 = getPortById($liaisons[$i]["idPort"]);
                     $port2 = getPortById($liaisons[$i]["idPort_1"]);
                     echo '<option value="'.$liaisons[$i]["codeLiaison"].'">'.$port1[0]["nomPort"].' - '.$port2[0]["nomPort"].'</option>';
                  }  
               ?>
            </select> 
         </div> 
            <br><br><br>

         <div class="twoForm">
            <label for="period-select">Pour quelle période souhaitez vous voyager ?</label><br>
            <select name="periods" id="period-select">
               <option value="">--Choisissez une option--</option>
               <?php
                  for ($i = 0; $i < count($periodes); $i++) {
                     echo '<option value="'.$periodes[$i]["idPeriode"].'">'.$periodes[$i]["dateDebutPeriode"].' - '.$periodes[$i]["dateFinPeriode"].'</option>';
                  }  
               ?>
            </select>
         </div>

         <br><br>  
         
         <div class="threeForm">
            <input type="submit"></input>
         </div>
      </form>
      <br>
      </div>

      

      <?php
      
         if(isset($_POST["periods"]) && isset($_POST["liaisons"])) {

               $periode = $_POST["periods"];
               $liaison = $_POST["liaisons"];
               $tarif= getTarifByIds($periode, $liaison);
               
               echo "Passager :<br>";
               echo "Adulte : ".$tarif[0]["prix"]."€ <br>";
               echo "Junior (8 à 18 ans) : ".$tarif[1]["prix"]."€ <br>";
               echo "Enfant (0 à 7 ans) : ".$tarif[2]["prix"]."€ <br>";
               echo "Véhicule <2m <br>";
               echo "Voiture inf. 4m : ".$tarif[3]["prix"]."€ <br>";
               echo "Voiture inf. 5m : ".$tarif[4]["prix"]."€ <br>";
               echo "Véhicule >2m :<br>";
               echo "Fourgon : ".$tarif[5]["prix"]."€ <br>";
               echo "Campign Car : ".$tarif[6]["prix"]."€ <br>";
               echo "Camion : ".$tarif[7]["prix"]."€ <br>";  
               exit();
            } else {
               
         }
      ?>
   

</main>