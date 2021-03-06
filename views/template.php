<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!--    css-->
    <link rel="stylesheet" href="public/style.css">
    <!--    bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
    <!--    fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">


</head>
<body>

<!--Section Barre de navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse  " id="navbarColor01">
            <ul class="navbar-nav w-100 d-flex justify-content-start ">
                <li class="nav-item">
                    <a class="nav-link active" href="accueil">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articles">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <ul class="navbar-nav w-100 d-flex justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php">Connexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


            <div class="container">
                <?=$content ?>
            </div>



<!--    js -->
<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
<script src="app.js"></script>
</body>
</html>


