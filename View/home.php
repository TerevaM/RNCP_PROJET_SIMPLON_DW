<?php ob_start(); ?>


<?php

var_dump($albums);
$content = ob_get_clean();
require_once "base_html.php";

?>