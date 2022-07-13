<?php
ob_start();
?>

    <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <p class="card-title text-center fw-bold"><?= $articles[$i]->getContent()  ?></p>
                        <img src="image/<?= $articles[$i]->getPicture() ?>" class="w-100 p-3" alt="Plage">
                        <h5 class="card-text "><?= $articles[$i]->getTitle(); ?></h5>
                    </div>
                    <div class="card-body text-center">
                        <a href="" class="btn btn-info text-center" target="_blank" ">En savoir plus</a>
                    </div>

                </div>

            </div>

    </div>


<?php
$content = ob_get_clean();
$title = $article->getTitle();
require "template.php";
?>