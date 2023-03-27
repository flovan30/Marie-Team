<div style="margin-left: 300px">
    
    <section id=Privileges>
        
    </section>
    
    <section id=nbReservationMoy>
    </section>
    
    <section id=chiffreAffaire>
        <p>prix total</p>
        <?php 

        $prixTotal = TotalchiffreAffaire();
        echo "<div>Le chiffre d'affaire de ce mois-ci est de : </div>";
        echo "<div class='TotalPrix'>". $prixTotal ." </div>";
        
        ?>
        
    </section>
    
    <section id=nbPersonneTransp>
        
    </section>
</div>