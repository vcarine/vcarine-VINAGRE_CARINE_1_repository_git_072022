<?php ob_start(); ?>


<div class="row">
    <div class="col-6">
        <img src="<?=URL?> public/images/"<?= $article->getPicture()?>>
    </div>

</div>

<?php

$content = ob_get_clean();
$title = $article->getTitle();

require "template.php";

?>