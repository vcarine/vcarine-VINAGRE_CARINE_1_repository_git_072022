<?php

use App\models\Article;

ob_start();
/** @var Article $article */
?>
    <div class="row">
        <div class="col-6">
            <img src="<?= URL?>/public/images/<?= $article->getImageLink() ?>" class="w-100 p-3" alt="Plage">
        </div>
        <div class="col-6">
            <p><?= $article->getTitle(); ?> - <?= $article->getCreatedAt()->format('d/m/Y - H:i:s') ?></p>
            <p><?= $article->getContent(); ?></p>
        </div>
    </div>
<?php

$content = ob_get_clean();
require "template.php";

?>
