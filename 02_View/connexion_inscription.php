<?php ob_start();
?>

<div class="container">
  <div class="row d-flex flex-row">
    <div class="col-sm-12">
      <h1 class="px-5 text-white">Connexion</h1>
      <div class="container my-5 py-5 bg-primary">
        <form method="POST" action="<?= URL ?>connexion_inscription/connectvalid" class="container p-5">
        <div class="mb-3">
        <label for="email" class="form-label text-white">Email</label>
        <input name="email" type="email" class="form-control">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label text-white">Password</label>
        <input name="password" type="password" class="form-control">
        </div>
      <button type="submit" class="btn btn-secondary">Submit</button>
      </form>
    </div>
  </div>
  <div class="col-sm-12">
    <h1 class="px-5 text-white">Inscription</h1>
    <div class="container my-5 py-5 bg-primary">
      <form method="POST" action="<?= URL ?>connexion_inscription/inscvalid" class="container p-5">
      <div class="d-flex justify-content-around">
          <div class="mb-3">
            <label for="firstname" class="form-label text-white">Prenom</label>
            <input name="firstname" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="lastname" class="form-label text-white">Nom</label>
            <input name="lastname" type="text" class="form-control" required>
            </div>
      </div>  
        <div class="mb-3">
        <label for="email" class="form-label text-white">Email</label>
        <input name="email" type="text" class="form-control" required>
        </div>
        <div class="mb-3">
        <label for="password" class="form-label text-white">Password</label>
        <input name="password" type="text" class="form-control" required>
        <?php 
        if(isset($_GET['corr']) && $_GET['corr'] == 1) {
          ?>
        <p>adresse email déjà enregistré</p>
          <?php
        }
        ?>
        </div>
      <button type="submit" class="btn btn-secondary">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php

$content = ob_get_clean();
require_once "01_base_html.php";

?>