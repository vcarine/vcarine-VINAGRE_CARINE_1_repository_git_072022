
<?php ob_start();?>

Ici, le contenu de la page d'accueil
<?php
$content = ob_get_clean();
$title = "La liste de mes articles";
require "template.php";
?>