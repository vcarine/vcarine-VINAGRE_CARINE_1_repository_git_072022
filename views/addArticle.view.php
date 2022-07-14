<?php
ob_start();
?>
    <form method="POST" action="<?= URL ?>articles/av" enctype="multipart/form-data">
        <div class="form-group mb-2">
            <label for="titre">Titre : </label>
            <input type="text" class="form-control" id="titre" name="titre">
        </div>
        <div class="form-group mb-2">
            <label for="commentaires">Articles: </label>
            <input type="number" class="form-control" id="nbPages" name="nbPages">
        </div>
        <div class="form-group mb-2">
            <label for="picture">Image : </label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-success">Valider</button>
    </form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'un article";
require "views/template.php";
?>