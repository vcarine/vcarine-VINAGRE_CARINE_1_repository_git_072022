<?php ob_start();

?>
    <!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="css" href="../../Public/css/style.css">
</head>
<body>

<?php
//    var_dump($errors);
 if(!empty($errors)):?>
<div class=" m-3 fw-bold alert alert-danger">
    <?php foreach($errors as $error):?>
        <p><?=$error;?></p>
    <?php endforeach;?>
</div>
<?php endif;?>

<section class="d-flex justify-content-center align-content-center w-100 h-100 ">
    <div class="m-5 p-5 rounded-3 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">Inscription</h1>


            <form class="form-bloc text-center " method="post" action="">
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="text"
                           name="username"
                           placeholder="Votre nom d'utilisateur"
                           value="<?= $username ?? '';?>">
                </div>
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="email"
                           name="email"
                           placeholder="Votre email"
                           value="<?= $email ?? ''; ?>"
                </div>
                <div class="form-groupe ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="password"
                           name="password"
                           placeholder="Mot de passe"
                </div>
                <div class="form-groupe  ">
                    <button class="btn btn-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                            type="submit">S'inscrire
                    </button>
                </div>
            </form>
            <p class=" text-center text-warning m-3 px-3">Déjà sur mon blog ? <a href="<?= URL ?>security/login"
                                                                                 class=" text-decoration-none">Connectez-vous</a>
            </p>


        </div>
    </div>

</section>


</body>
<?php
$content = ob_get_clean();
require "Views/template.php";
?>