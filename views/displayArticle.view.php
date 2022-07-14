<?php
ob_start();
?>

    <div class="row">
        <div class="col-6">
            <img src="<?= URL ?>public/images/<?= $livre->getPicture(); ?>">
        </div>
        <div class="col-6">
            <p>Titre : <?= $livre->getTitle(); ?></p>
            <p>Article : <?= $livre->getContent(); ?></p>

        </div>
    </div>

<?php
$content = ob_get_clean();
$titre = $livre->getTitre();
require "views/template.php";
?>