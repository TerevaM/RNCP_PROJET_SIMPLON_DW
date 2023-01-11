<?php ob_start(); ?>


<div class="accueil container-fluid" style="height:400vh">   
<section class="p-5" id="accueil"><div id="slogan">Ceci est un slogan</div></section>
<!-- a propos -->
<section class="p-5" id="a_propos"><a href="">a propos</a></section>
<!-- albums photos  -->
<section class="p-5" id="albums_photos"><a href="<?= URL ?>albums_photos">albums photos</a></section>
<!-- me contacter -->
<section class="p-5" id="me_contacter">Me contacter</section>
<!-- connexion inscription -->
<section class="p-5" id="connexion_inscription">Connexion inscription</section>
</div>
<?php

$content = ob_get_clean();
require_once "01_base_html.php";

?>