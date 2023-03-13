<style type="text/css">
    @import url("css/reservation.css");
</style>

<main>

    <?php
    // verification de si l'utilisateur a cliquer sur le boutton "Reserver" et est connecté
    if (isset($_POST['numTraversee'])) {
        if (!isLoggedOn()) {
            header("Location: ./?action=connexion");
        }
        // code ci-dessous
        echo $_POST['numTraversee'];
    } else {
        header("Location: ./?action=destination");
    }

    ?>
</main>