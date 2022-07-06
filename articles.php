<?php ob_start();?>

<!--section projet-->

<section class="border-bottom">
    <div class="container mb-5 pb-5">
        <h2 class="text-center mt-mb-5 m-4 display-4">Algarve</h2>
        <p class="card-text">L’Algarve est la région la plus au sud du Portugal,
            bordée à l’ouest et au sud par l’océan Atlantique.
            L'algarve se démarque avec de nombreuses plages
            et son climat parfait pour des vacances au soleil.
             </p>
        <p class="fs-5 text-dark mb-md-5 mb-3 text-center">Le Portugal  </p>

        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
            <div>
                <div class="card">
                    <p class="card-text text-center">Voici 5 de nos plages préférées!. </p>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/Ponta-da-Piedade-Lagos.jpg" class="d-block w-100" alt="plage Portugal">
                                <h5 class="card-title text-center">Ponte da Piedade, Lagos </h5>
                                <p class="card-text">Ponta da Piedade se définie par ses falaises creusées dans la roche qui abritent des tunnels naturels et des cavernes secrètes. Ces falaises de couleur doré contrastent avec le vert et le turquoise de la mer, c’est absolument sublime. Pour visiter ces cavernes, il faut prendre un petit bâteau qui se trouve au bas des 182 marches.
                                    Il est aussi possible de faire une excursion de kayak ou en paddle board partant de la plage Batata.. </p>

                            </div>
                            <div class="carousel-item">
                                <img src="assets/praia-da-quinta-do-lago-5.jpg" class="d-block w-100" alt="...">
                                <h5 class="card-title text-center">Praia do Gigi, Quinta do lago</h5>
                                <p class="card-text">Joli paysage au Portugal.
                                    Si vous aimez la tranquillité, cette plage est pour vous. Vous devez traverser à pied un pont
                                    qui traverse la rivière protégée du parc naturelle Ria Formosa,
                                    Il y a un restaurant accessible sur cette plage ,e vue incroyable sur la mer.
                            </div>
                            <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="card-body">
                        <a href="#" class="btn btn-primary"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>



<?php
    $content = ob_get_clean();
    $title = "Les articles";
    require "template.php";
?>


