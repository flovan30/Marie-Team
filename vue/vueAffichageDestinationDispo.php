<?php
for ($i = 0; $i < count($traversee); $i++) {
    $nbPlacePassageeRestante = getnbPlacesRestantePassager($traversee[$i]['numTraversee']);
    $nbPlaceVehiculeInf2mRestante = getnbPlacesRestanteVehiculeInf2m($traversee[$i]['numTraversee']);
    $nbPlaceVehiculeSup2mRestante = getnbPlacesRestanteVehiculeSup2m($traversee[$i]['numTraversee']);

    if ($nbPlacePassageeRestante == 0 && $nbPlaceVehiculeInf2mRestante == 0 && $nbPlaceVehiculeSup2mRestante == 0) {
        $button = "value='Plus assez de place' disabled";
    } else {
        $button = "value='Reserver'";
    }
?>
    <div class="item-traversee">
        <h3>Num : <?= $traversee[$i]['numTraversee'] ?> | date : <?= $traversee[$i]['dateTraversee'] ?> à <?= $traversee[$i]['heureDepartTraversee'] ?> | Passager : <?= $nbPlacePassageeRestante ?> | Véh.inf.2m : <?= $nbPlaceVehiculeInf2mRestante ?> | Véh.sup.2m : <?= $nbPlaceVehiculeSup2mRestante ?>
            <form action="./?action=reservation" method="POST">
                <input hidden type="number" name="numTraversee" value="<?= $traversee[$i]['numTraversee'] ?>">
                <input hidden type="number" name="idLiaison" value="<?= $liaison ?>">
                <input class="submit-btn" type="submit" <?= $button ?>>
            </form>
        </h3>
    </div>
<?php
}
?>
</div>
</main>