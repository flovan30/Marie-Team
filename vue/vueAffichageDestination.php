<style type="text/css">
    @import url("css/destination.css");
</style>
<main>
    <div class="listeSecteur">
        <form action="./?action=destination" method="POST">
            <select name="secteur" id="secteur">
                <?php
                for ($i = 0; $i < count($listeSecteur); $i++) {
                ?>
                    <option value="<?= $listeSecteur[$i]['idSecteur'] ?>"><?= $listeSecteur[$i]['nomSecteur'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" value="valider">
        </form>
        <br><br>
    </div>