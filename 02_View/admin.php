<?php ob_start();
if(empty($_SESSION) || $_SESSION['rank'] != 'admin') {
    header('Location: ' . URL . 'accueil');
}
?>
<h1>Admin</h1>
<div class="container-fluid d-flex justify-content-center flex-column">
  <h1 class="bg-secondary m-5">Ajout d'une nouvelle photo :</h1>
  <div class="container my-5 bg-primary">
    <form method="POST" enctype="multipart/form-data" action="<?= URL ?>photo/create" class="container p-5">
      <div class="mb-3">
        <label for="name" class="form-label text-white">Nom :</label>
        <input name="name" type="text" class="form-control">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label text-white">Categorie :</label>
        <input name="category" type="text" class="form-control">
      </div>
      <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
  </div>
</div>
<?php
$content = ob_get_clean();
require_once "01_base_html.php";

?>