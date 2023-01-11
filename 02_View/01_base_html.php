<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie photo </title>
<<<<<<< HEAD
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/cyborg/bootstrap.min.css" />
=======
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/sketchy/bootstrap.min.css" />
<<<<<<< Updated upstream
=======
>>>>>>> 7cc9b267823fd5b8be624e3a8f747798ea798862
>>>>>>> Stashed changes
     <link rel="stylesheet" href="<?= URL ?>04_utils/css/style.css">
    <!-- style.css -->
</head>

<body>
    <header>
        <nav class="w-100 navbar navbar-expand-lg navbar-light bg-light px-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>a_propos">A propos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>albums_photos">Albums Photos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>me_contacter">Me contacter</a>
                    </li>
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                    <?php if(empty($_SESSION)) : ?>
=======
>>>>>>> 7cc9b267823fd5b8be624e3a8f747798ea798862
>>>>>>> Stashed changes
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>connexion_inscription">Connexion Inscription</a>
                    </li>
                    <?php
                    elseif(!empty($_SESSION)) :
                    ?>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL?>connexion_inscription/disconnected">Se deconnecter</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= URL?>connexion_inscription/myaccount"><?= $_SESSION['firstname'] .' '. $_SESSION['lastname'] ?></a>
                    </li>
                    
                    <?php
                    endif;
                    if(isset($_SESSION['rank']) && $_SESSION['rank'] == 'admin') { ?>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Page Admin</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        <!-- footer -->
    </footer>
    <script src="<?= URL ?>04_utils/js/main.js"></script>
    <script src="https://kit.fontawesome.com/4529898a3a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>