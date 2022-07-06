<?php ob_start();?>

    Ici, le contenu de ma page listant les articles
<?php
    $content = ob_get_clean();
    $title = "Les articles";
    require "template.php";
?>


