<?php ob_start(); ?>

    <div class="row">
        <div class="col-6">
            <img src="<?= URL ?> public/images/<?= $article->getImage_link(); ?>" alt="article_show">
        </div>
        <div class="col-6">
            <p>Titre : <?= $article->getTitle($url[2]); ?> </p>
            <p>Contenu : <?= $article->getContent(); ?> </p>
            <p>Auteur : <?= $article->getAuthor(); ?> </p>
        </div>
    </div


<?php

$content = ob_get_clean();

require "template.php";

?>