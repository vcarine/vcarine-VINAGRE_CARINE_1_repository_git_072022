<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="Public/css/security.css">


</head>
<body>

<section>
    <div id="login-body">
        <h1>S'identifier</h1>

        <form method="post" action="index.php">
            <input type="email" name="email" placeholder="Votre adresse email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <button type="submit">S'identifier</button>
            <label id="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
        </form>


        <p class="grey">Première visite  ? <a href="">Inscrivez-vous</a>.</p>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
</body>
</html>