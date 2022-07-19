<?php

use App\models\Article;

ob_start();
/** @var Article $article */
?>

    <div class="m-5" id="form">
        <div class="container">
            <div id="form-row" class="row justify-content-center align-items-center">
                <div id="form-column " class="col-md-6">
                    <div id="form-box" class="col-md-12">
                        <form id="form-form" class="form" action="" method="post">

                            <div class="form-group m-2">
                                <label for="titre" class="text-info">Titre :</label><br>
                                <input type="text" name="titre" id="titre" class="form-control">
                            </div>
                            <div class="form-group m-2">
                                <label for="content" class="text-info">Commentaire :</label><br>
                                <textarea class="form-control" id="content" rows="3"></textarea>

                            </div>
                            <div class="form-group m-2">
                                <label for="comment" class="text-info">Note / 5 :</label><br>
                                <input type="number" name="comment" id="comment" class="form-control">
                            </div>

                            <div id="register-link" class="text-center m-3 ">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

$content = ob_get_clean();
require "template.php";

?>