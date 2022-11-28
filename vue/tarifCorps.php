<main>
   <?php
      $liaisons= getLiaisons();
      $periodes= getPeriode();
   ?>
   <br><br>
   <form  action = "<?php $_PHP_SELF ?>" method = "POST">

   
   <label for="liaisons-select">Pour quelle liaison souhaitez vous voyager ?</label><br>
      <select name="liaisons" id="liaisons-select">
         <option value="">--Choisissez une option--</option>
         <?php
            for ($i = 0; $i < count($liaisons); $i++) {
               $port1 = getPortById($liaisons[$i]["idPort"]);
               $port2 = getPortById($liaisons[$i]["idPort_1"]);
               echo '<option value="'.$liaisons[$i]["codeLiaisons"].'">'.$port1[0]["nomPort"].' - '.$port2[0]["nomPort"].'</option>';
            }  
         ?>
      </select>  
      <br><br><br>

      <label for="period-select">Pour quelle période souhaitez vous voyager ?</label><br>
      <select name="periods" id="period-select">
         <option value="">--Choisissez une option--</option>
         <?php
            for ($i = 0; $i < count($periodes); $i++) {
               echo '<option value="'.$periodes[$i]["idPeriode"].'">'.$periodes[$i]["dateDebutPeriode"].' - '.$periodes[$i]["dateFinPeriode"].'</option>';
            }  
         ?>
      </select>

      <br><br>  

      <input type="submit"></input>

   </form>

   <br>

   

   <?php
   
      if(isset($_POST["periods"]) && isset($_POST["liaisons"])) {
         echo $_POST["liaisons"];
         echo $_POST["periods"];
         exit();
      } else {
         echo "CA MARCHE PAS";
      }
   ?>

</main>