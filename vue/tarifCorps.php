<main>
   <h1>Hello world</h1> 
   <?php
      $periodes= getPeriode();
      echo json_encode($periodes);
   ?>
   <br><br>
   <?php
      $liaisons= getLiaisons();
      echo json_encode($liaisons);
   ?> 
   <br><br>
   <?php
      $liaisonsN1= getLiaisonById(1);
      echo json_encode($liaisonsN1);
   ?>
    <br><br>
   <?php
      $periodeN3= getPeriodeById(3);
      echo json_encode($periodeN3);
   ?>
</main>