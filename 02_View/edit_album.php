<?php ob_start();
?>
<h1 class="px-5 text-white">Edit de l'album : <?= $album->getName() ?></h1>
<div class="container my-5 py-5 bg-primary">
<form method="POST" action="<?= URL ?>albums_photos/editvalid" class="container p-5">
    <div class="mb-3">
        <label for="name" class="form-label text-white">Nom</label>
        <input name="name" type="text" class="form-control" value="<?= $album->getName()?>">
    </div>
    <div class="mb-3">
        <label for="category" class="form-label text-white">Categorie</label>
        <input name="category" type="text" class="form-control" value="<?= $album->getCategory()?>">
    </div>
      <input type="hidden" name="id_album" value="<?= $album->getId() ?>">
    <button type="submit" class="btn btn-secondary">Submit</button>
</form>
</div>
<?php

$content = ob_get_clean();
require_once "01_base_html.php";

?>