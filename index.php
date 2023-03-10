<?php
session_start();
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
            else if($url[1] === 'createvalid') {
                $controller->newAlbumValid();
            }
            else if($url[1] === 'edit'){
                $controller->editAlbumForm($url[2]);
            }
            else if($url[1] === 'editvalid') {
                $controller->editAlbumValidation();
            }
            else if($url[1] === 'delete'){
                $controller->deleteAlbum($url[2]);
            }
            //photos
            else if ($url[1] === 'photos') {
                $controller->displayPhotos($url[2]);
            }

        break;
        case 'connexion_inscription' :
            if(empty($url[1])){
                require_once '02_View/connexion_inscription.php';
            }
            elseif($url[1] === 'inscvalid') {
                $controller->newUser();
            }
            elseif($url[1] === 'connectvalid'){
                $controller->connectUser();
            }
            elseif($url[1] === 'disconnected') {
                session_destroy();
                header('Location: ' . URL . 'accueil');
            }
        break;
        case 'admin' :
            if(empty($url[1])) {
                require_once '02_View/admin.php';
            }
            else if($url[1] === 'create'){
                $controller->newPicture();
            }
    }
}