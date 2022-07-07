
<?php ob_start();?>

<!-- Section Accueil-->
<!--<div class="text-white bg-dark text-center d-flex flex-column align-items-center w-100 h-75 p-3 mx-auto" id="accueil">
    <div class="portrait ">
        <img src="assets/Maphoto.jpg" alt="photo img">
    </div>
    <p class="text-animation"></p>
</div>-->

<div class="  d-flex flex-column p-3 ">
    <div class="row mb-2">
        <div class="col mb-5">
            <div class=" mb-3  px-4 py-5">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="portrait ">
                            <img src="assets/Maphoto.jpg" alt="photo img">
                        </div>
                        <p class="text-animation"></p>
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body m-4">
                            <h5 class="card-title text-center mb-4"> De Vendeur Gestionaire à développeur </h5>
                            <p class="card-text text-justify">Actuellement en reconversion professionnelle, j'ai commencé ma carrière comme
                            <span class="text-warning fw-bold">Vendeur gestionnaire</span> à Métro Cash & Carry à Saint-Étienne pendant 15 ans
                            jusqu'en 2020. </p>

                            <p class="card-text text-justify"> Attiré depuis toujours par l'informatique et le développement, j'ai entamé en novembre 2020 ma
                                reconversion profesionnelle. </p>
                            <p class="card-text text-justify"> J'ai été en formation à templs complet jusqu'en novembre 2021 pour obtenir le <span class="text-warning fw-bold">titre RNCP de Développeur Web et Web Mobile </span>
                                à Saint-Just Saint-Rambert.</p>
                            <p class="card-text text-justify"> Mars 2022, nouvelle aventure pour obtenir Diplôme niveau 6 (Bac +3/4) <span class="text-warning fw-bold" >Développeur d'application PHP / Symfony </span> 100 % en ligne avec Openclassroom. </p>
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