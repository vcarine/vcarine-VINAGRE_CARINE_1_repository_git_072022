<?php
ob_start();
?>

    <div class="row ">

        <div class="col-6">
            <img src="<?= URL ?>public/images/<?= $article->getPicture() ?>" class="w-100 p-3" alt="Plage">
        </div>
        <div class="col-6">
            <p class="card-title text-center fw-bold"><?= $article->getContent() ?></p>
        </div>
    </div>



<?php
$content = ob_get_clean();
require "template.php";
?>