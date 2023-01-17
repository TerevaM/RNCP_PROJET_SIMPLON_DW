<?php ob_start(); ?>
<div class="container my-5 py-5">
    <div class="row d-flex justify-content-around ">
<?php
if($albums){
foreach($albums as $value) {
?>

<div class="card col-4 m-1 mooveit" style="width: 18rem; min-height: 23rem;">

  <a href="<?= URL ?>albums_photos/photos/<?= $value->getId(); ?>" class="card-body position-relative">
    <h3 class="card-title bg-primary p-2 text-center text-white"><?= $value->getName(); ?></h3>
    <span class="text-uppercase">Category : <?= $value->getCategory(); ?></span><br>
    <span>date de sortie : <?= $value->getRelease_date(); ?></span><br>
    <!-- btn edit & delete -->
    <?php
    if(!empty($_SESSION) && $_SESSION['rank'] == 'admin'):
      ?>
    <div class="d-flex justify-content-around position-absolute fixed-bottom py-2">
        <a href="<?= URL ?>albums_photos/edit/<?= $value->getId() ?>" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
        <form action="<?= URL ?>albums_photos/delete/<?= $value->getId() ?>" method="POST"
        onsubmit=" return confirm('Etes-vous certain de vouloir supprimer cet album ?')">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
    <?php
    endif;
    ?>
  </a>
</div>
<?php
}
}
if(!empty($_SESSION) && $_SESSION['rank'] == 'admin'):
?>
<div class="card col-4 m-1" style="width: 18rem; min-height: 23rem;">
  <div class="card-body d-flex justify-content-center align-items-center flex-column">
    <h5 class="card-title bg-primary p-2 text-center text-white">New Album</h5>
    <a class="btn btn-primary" href="<?= URL ?>albums_photos/create"><i class="fa-duotone fa-plus"></i></a>
  </div>
</div>
<?php 
endif;
?>

</div>
</div>
<?php
$content = ob_get_clean();
require_once "01_base_html.php";