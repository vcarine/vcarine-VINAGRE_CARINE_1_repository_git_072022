<?php ob_start();?>

<h1>Ma page d'articles </h1>

<?php
    $content = ob_get_clean();

    require "template.php";
?>


