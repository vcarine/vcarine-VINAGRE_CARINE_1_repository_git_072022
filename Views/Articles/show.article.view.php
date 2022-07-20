<?php

use App\models\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
        <p class="text-start fw-bold text-info display-6 m-5"><?= $article->getContent(); ?></p>
        <div class="col-6 mt-auto">

            <img src="<?= URL?>/public/images/<?= $article->getImageLink() ?>" class="w-100 p-3" alt="Plage">
        </div>
        <div class="col-6 mt-5">
            <p><?= $article->getTitle(); ?>
                <p class="text-end text-secondary"><?= $article->getCreatedAt()->format('d/m/Y - H:i:s') ?></p>

        </div>
    </div>
<div class=" text-center">
    <a href="<?= URL?>articles" class="btn btn-primary text-center" target="_blank">Retour</a>
</div>

<?php

$content = ob_get_clean();
require "Views/template.php";

?>
