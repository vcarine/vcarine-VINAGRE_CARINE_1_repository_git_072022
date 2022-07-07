
<?php ob_start();?>


<div class="  d-flex flex-column p-5 m-3">
    <div class="row mb-3">
        <div class="col mb-5">
            <div class=" mb-4 px-4 py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="portrait text-center col-lg-5">
                            <img src="assets/Maphoto.jpg" alt="photo img">
                        </div>
                        <p class="text-animation"></p>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4 fs-2"> De Vendeur Gestionaire à développeur </h5>
                            <p class="card-text text-justify fs-5">Actuellement en reconversion professionnelle, j'ai commencé ma carrière comme
                            <span class="text-warning fw-bold">Vendeur gestionnaire</span> à Métro Cash & Carry à Saint-Étienne pendant 15 ans
                            jusqu'en 2020. </p>

                            <p class="card-text text-justify fs-5"> Attiré depuis toujours par l'informatique et le développement, j'ai entamé en novembre 2020 ma
                                reconversion profesionnelle. </p>
                            <p class="card-text text-justify fs-5"> J'ai été en formation à templs complet jusqu'en novembre 2021 pour obtenir le <span class="text-warning fw-bold">titre RNCP de Développeur Web et Web Mobile </span>
                                à Saint-Just Saint-Rambert.</p>
                            <p class="card-text text-justify fs-5"> Mars 2022, nouvelle aventure pour obtenir Diplôme niveau 6 (Bac +3/4) <span class="text-warning fw-bold" >Développeur d'application PHP / Symfony </span> 100 % en ligne avec Openclassroom. </p>

                            <a class="btn btn-success btn-lg rounded mt-5" role="button"  type="submit" href="#" target="_blank"><i class="fab fa-GitHub" aria-hidden="true"></i>Télécharger mon CV </a>
                            <a class="btn btn-info btn-lg rounded mt-5" role="button"  type="submit" href="#" target="_blank">Mon GitHub </a>
                            <a  class="btn-accueil btn-accueil1">CV</a>
                            <a href="#port" target="_blank" class="btn-accueil btn-accueil2">Mes Projets</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
$content = ob_get_clean();

require "template.php";
?>