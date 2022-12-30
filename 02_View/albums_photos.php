<?php ob_start(); ?>
<div class="container my-5 py-5 bg-secondary cards_heroes">
    <div class="row d-flex justify-content-around ">
<?php
foreach($albums as $value) {
?>

<div class="card col-4 m-1" style="width: 18rem; height:20rem">
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body position-relative">
    <h3 class="card-title bg-primary p-2 text-center text-white"><?= $value->getName(); ?></h3>
    <span class="text-uppercase">Category : <?= $value->getCategory(); ?></span><br>
    <span>Attaque : <?= $value->getRelease_date(); ?></span><br>
    <div class="d-flex justify-content-around position-absolute fixed-bottom py-2">
        <a href="<?= URL ?>heros/edit/<?= $value->getId() ?>" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
        <form action="<?= URL ?>heros/delete/<?= $value->getId() ?>" method="POST"
        onsubmit=" return confirm('Etes-vous certain de vouloir supprimer cet hero ?')">
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
  </div>
</div>


<?php
}
if(isset($_SESSION) && $_SESSION['rang'] == 'admin'):
?>
<div class="card col-4 m-1" style="width: 18rem;">
  <div class="card-body d-flex justify-content-center align-items-center flex-column">
    <h5 class="card-title bg-primary p-2 text-center text-white">New Hero</h5>
    <a class="btn btn-primary" href="<?= URL ?>heros/add">+</a>
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