<?php ob_start(); ?>

<h1 class="text-white">Accueil</h1>

<?php

$content = ob_get_clean();
require_once "01_base_html.php";

?>