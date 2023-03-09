<style type="text/css">
    @import url("css/reservation.css");
</style>

<main>

    <?php
    // if isset idTraversee from vueAffichageDestination.php echo the idTraversee
    if (isset($_POST['numTraversee'])) {
        $numTraversee = $_POST['numTraversee']; ?>
        <?= $numTraversee ?>

    <?php
    } else {
        header("Location: ./?action=destination");
    }

    ?>
</main>