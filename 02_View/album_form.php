<?php ob_start();
?>
<div class="container-fluid d-flex justify-content-center flex-column">
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
  <h1 class="bg-secondary m-5">Création d'un nouvel album :</h1>
  <div class="container my-5 bg-primary">
    <form method="POST" enctype="multipart/form-data" action="<?= URL ?>albums_photos/createValid" class="container p-5">
      <div class="mb-3">
        <label for="name" class="form-label text-white">Nom :</label>
        <input name="name" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label text-white">Categorie :</label>
        <input name="category" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="img" class="form-label text-white">Image :</label>
        <input type="file" name="image" accept="image/jpeg, image/png" id="image">
      </div>
      <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
  </div>
=======
>>>>>>> Stashed changes
    <h1 class="bg-white m-5">Nouvel album</h1>
    <div class="container my-5 bg-primary">
      <form method="POST" action="<?= URL ?>albums_photos/createvalid" class="container p-5">
        <div class="mb-3">
          <label for="name" class="form-label text-white">Nom de l'album</label>
          <input name="name" type="text" class="form-control">
        </div>
        <div class="mb-3">
          <label for="category" class="form-label text-white">Category</label>
          <input name="category" type="text" class="form-control">
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </div>
<<<<<<< Updated upstream
=======
>>>>>>> 7cc9b267823fd5b8be624e3a8f747798ea798862
>>>>>>> Stashed changes
</div>

<?php
$content = ob_get_clean();
require_once "01_base_html.php";

?>