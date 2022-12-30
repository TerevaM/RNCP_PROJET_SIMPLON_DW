<?php

require_once "03_Controller/Controller.php";
$controller = new Controller();

define("URL" , str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . 
"://".$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ));

if (empty($_GET['page'])) {
    require_once "02_View/home.php";
}else {
    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
    switch ($url[0]) {
        case 'accueil' : require_once "02_View/home.php";
        break;
        case 'albums_photos' : 
            if(empty($url[1])){
                $controller->displayAlbums();
            }
            else if($url[1] === 'create'){
                $controller->newAlbumForm();
            }
        break;
        case 'login' :
            // if(empty($url[1])){
            //     $gameControler->displayUsers();
            // }
            // else if($url[1] === "inscvalid") {
            //    $gameControler->newUserValidation();
            // }
            // else
             if($url[1] === 'disconnected') {
            session_destroy();
            header('Location: '.URL.'home');
            }
            ;
        break;
    }
}