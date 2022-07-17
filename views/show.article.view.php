<?php ob_start(); ?>


<?php

$content = ob_get_clean();
$title = $article->getContent();
require "template.php";

?>