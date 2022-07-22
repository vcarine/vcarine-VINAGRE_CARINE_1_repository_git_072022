<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Public/css/style.css">

</head>
<body>

<section class="d-flex justify-content-center align-content-center w-100 h-100 ">
    <div class="m-5 rounded-3 opacity-25 bg-dark ">
        <div class="login px-5 py-2">
            <h1 class="text-secondary text-center m-2">S'identifier</h1>

            <form class="form-bloc text-center " method="post" >
                <div class="form-groupe m-3 px-5 ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="text"
                           name="username"
                           placeholder="Votre nom d'utilisateur" required/>
                </div>
                <div class="form-groupe m-3 px-5 ">
                    <input class=" rounded w-100  m-3 p-2 border border-light border-3 form-control" type="password" name="password"
                           placeholder="Mot de passe" required/>
                </div>
                <div class="form-groupe m-3 px-5 ">
                    <button class="btn btn-danger text-white  m-3 p-2 w-100 rounded-1 border border-dark form-control"
                            type="submit">Se connecter</button>
                </div>
            </form>
            <p class=" text-center text-warning m-3 px-3">Première visite sur mon blog ? <a
                        href="<?= URL ?>security/register" class=" text-decoration-none">Inscrivez-vous</a></p>
        </div>
    </div>
    <?php
    if(count($errors) != 0){
        echo('<ul>');
        foreach ($errors as $error){
            echo('<li>'.$error.'</li>');
        }
        echo('</ul>');
    }
    ?>

</section>

</body>

<?php
$content = ob_get_clean();
require "Views/template.php";
?>
