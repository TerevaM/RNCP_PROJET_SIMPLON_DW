<?php ob_start();
?>
<div class="container-fluid d-flex justify-content-center flex-column">
    <h1 class="bg-secondary m-5">Edition de : <?= $albums->getName(); ?></h1>
    <div class="container my-5 bg-primary">
<form method="POST" action="<?= URL ?>heros/editvalid" class="container p-5">
  <div class="mb-3">
    <label for="name" class="form-label text-white">Nom</label>
    <input name="name" type="text" class="form-control" value="<?= $hero->getName() ?>">
 </div>
  <div class="mb-3">
    <label for="category" class="form-label text-white">categorie</label>
    <input name="category" type="text" class="form-control" value="<?= $hero->getCategory() ?>" >
  </div>
  <div class="mb-3">
    <label for="life" class="form-label text-white">life</label>
    <input name="life" type="number" class="form-control" value="<?= $hero->getVie() ?>">
  </div>
  <div class="mb-3">
    <label for="attack" class="form-label text-white">attack</label>
    <input name="attack" type="number" class="form-control" value="<?= $hero->getAttaque() ?>">
  </div>
  <div class="mb-3">
    <label for="first_cap" class="form-label text-white">first cap</label>
    <input name="first_cap" type="text" class="form-control" value="<?= $hero->getFirst_cap() ?>">
  </div>
  <div class="mb-3">
    <label for="second_cap" class="form-label text-white">second cap</label>
    <input name="second_cap" type="text" class="form-control" value="<?= $hero->getSecond_cap() ?>">
  </div>
  <div class="mb-3">
    <label for="passif" class="form-label text-white">passif</label>
    <input name="passif" type="text" class="form-control" value="<?= $hero->getPassif() ?>">
  </div>
  <input type="hidden" name="id_hero" value="<?= $hero->getId() ?>">
  <button type="submit" class="btn btn-secondary">Submit</button>
</form>
</div>
</div>

<?php
$content = ob_get_clean();
require_once "01_base_html.php";

?>