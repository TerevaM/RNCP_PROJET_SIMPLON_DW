<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Galerie Photo</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/cyborg/bootstrap.min.css" />
     <link rel="stylesheet" href="<?= URL ?>04_utils/css/style.css">
</head>
<body>
    <div id="subst"></div>
    <header>
        <nav class="w-100 navbar navbar-expand-lg navbar-light bg-light px-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" data-bs-target="#navbarSupportedContent" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#a_propos">A propos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#albums_photos">Albums Photos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#me_contacter">Me contacter</a>
                    </li>
                    <?php if(empty($_SESSION)) : ?>
                    <li class="nav-item">
                    <a class="nav-link" href="#connexion_inscription">Connexion Inscription</a>
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
                    <a class="nav-link" href="<?= URL ?>admin">Page Admin</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="accueil" style="height:400vh">   
            <section id="accueil">
                <h1 id="slogan">Galerie</h1>
                <h1>Pierre Millet</h1>
            </section>
            <div class="transition"></div>
            <!-- a propos -->
            <section id="a_propos">
                <h1>A propos</h1>
                <div id="para1">
                    <h3>Qui suis-je ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.  
                    </p>
                </div>
                <div id="para2">
                    <h3>La photographie</h3>
                    <p>
                        Fusce laoreet venenatis accumsan. Ut ac semper elit. Aliquam eleifend tempus dui vel tincidunt. Praesent porttitor mi quis ultrices ultrices. Aliquam gravida sit amet sapien non commodo. Duis eu dictum orci, ut feugiat tortor. In ullamcorper, purus sed vehicula consequat, elit orci vestibulum ligula, nec posuere odio massa nec lacus.
                    </p>
                </div>
            </section>
            <div class="transitionbis"></div>
            <!-- albums photos  -->
            <section id="albums_photos"><a href="<?= URL ?>albums_photos">albums photos</a></section>
            <!-- me contacter -->
            <section id="me_contacter">
                <h1>Me contacter</h1>
                <ul  id="reseaux">
                    <li>
                        <a href="https://www.instagram.com/pierre.insta.millet/?hl=fr" target="_blank">
                            <img src="<?= URL ?>04_utils/wallp/Instagram_icon.png" alt="">
                            <h3>@pierre.insta.millet</h3>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- connexion inscription -->
            <section id="connexion_inscription">
            <h1>Rejoins moi !</h1>
            <a href="<?= URL ?>connexion_inscription">connexion inscription</a>
            </section>
        </div>
    </main>
    <!-- <footer>footer</footer> -->
        <script src="<?= URL ?>04_utils/js/main.js"></script>
    <script src="https://kit.fontawesome.com/4529898a3a.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>