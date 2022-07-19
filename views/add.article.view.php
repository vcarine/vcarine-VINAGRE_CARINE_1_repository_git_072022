<?php

use App\models\Article;

ob_start();
/** @var Article $article */
?>

    <section class="contact w-100 h-100 rounded mt-5 p-1  bg-light"   id="contact">

        <h2 class="text-center display-6 m-5 p-2" style="background-color: #333; color: #aaa;"><strong>Commentaires</strong></h2>


        <p class="text-center">Laisser un commentaires sur cet article</p>


        <p class="text-center">Vous devez être connecté(e) à votre compte utilisateur pour pouvoir laisser un
            commentaire.</p>

        <div class="m-5 " id="form">
            <div class="container-form text-center ">
                <div id="form-row" class="row justify-content-center align-items-center">
                    <form class="form-bloc text-center">
                        <div class="form-groupe p-3">
                            <label  style="color: #666666; " for="title" ></label>
                            <input class="w-50 mb-2 pb-2 border-bottom border-1"
                                   style="border: 0; outline: 0; background : 0; "
                                   type="text" required maxlength="16" id="title" placeholder="Titre">
                        </div>
                        <div class="form-groupe  fw-bold m-2 text-center " >
                            <textarea class="w-50 h-50 border-2 p-3 "
                                      style="; outline: 0; background : #ffffff; resize: none; color : #666666;  border-color: #8b97d7; "
                                      id="txt" cols="45" rows="10"
                                      placeholder ="Votre commentaire"></textarea>
                        </div>

                        <div class="form-groupe  fw-bold  text-center">
                            <input class=" button-sub hover-overlay  w-auto p-2  border border-2  btn btn-outline-dark rounded-pill align-center"
                                   style="border: 0; outline: 0;  color : #f1f1f1 font-size : 18px"
                                   type="submit"
                                   value="ENVOYER"">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-light text-center my-auto p-1 ">
        <span class="mb-3 mb-md-0 text-muted text-decoration-none lh-1 fw-bold">Tout Droits réservés © 2022 Carine Vinagre</span>
        <div id="contact">
            <p> Si vous voulez me contacter, n'hésitez pas à m'envoyer un email à <a
                        href="mailto:vcarine.dev@gmail.com"><b class="mail">vcarine.dev@gmail.com</b></a></p>
        </div>
    </footer>

<?php

$content = ob_get_clean();
require "template.php";

?>