<?php ob_start(); ?>

<section>
    <div id="login-body">
        <h1>S'identifier</h1>

        <form class="row row-cols-lg-auto g-3 align-items-center">
            <div class="col-12">
                <label class="visually-hidden" for=username>Username</label>
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control" id="username" name="username" placeholder="veuillez saisir un username" required>
                </div>
            </div>

            <div class="col-12">
                <label class="visually-hidden" for=password>Username</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">S'identifie</button>
            </div>
        </form>

        <p class="grey">Première visite ? <a href="">Inscrivez-vous</a>.</p>
    </div>
</section>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>
