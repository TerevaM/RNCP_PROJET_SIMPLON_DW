<?php
require_once "01_Model/AlbumManager.php";
require_once "01_Model/UserManager.php";
require_once "01_Model/PictureManager.php";
class Controller {
    private $albumManager;
    private $userManager;
    private $pictureManager;

    public function __construct()
    {
        $this->albumManager = new AlbumManager();
        $this->albumManager->loadAlbums();
        $this->userManager = new UserManager();
        $this->userManager->loadUsers();
        $this->pictureManager = new PictureManager();
        $this->pictureManager->loadPictures();
    }
    // ------------------ ALBUMS ---------------------- //
    public function displayAlbums() {
        $albums = $this->albumManager->getAlbums();
        require_once "02_View/albums_photos.php";
    }
    public function newAlbumForm() {
        require_once "02_View/album_form.php";
    }
    public function newAlbumValid() {
        $this->albumManager->newAlbumDB($_POST['name'], $_POST['category']);
        header('Location: '. URL . 'albums_photos');
    }
    public function editAlbumForm($id) {
        $album = $this->albumManager->getAlbumsById($id);
        require_once "02_view/edit_album.php";
    }
    public function editAlbumValidation() {
    $this->albumManager->editAlbumDB($_POST['id_album'],$_POST['name'], $_POST['category']);
            header('Location: '. URL .'albums_photos');
    }
    public function deleteAlbum($id) {
        $this->albumManager->deleteAlbumDB($id);
        header("Location: ". URL ."albums_photos");
    }
    // -----PHOTOS----- //
    public function displayPhotos($id){
        $album = $this->albumManager->getAlbumsById($id);
        $photos = $this->pictureManager->getPicturesByAlbum($album->getName());
        var_dump($photos);
        // require_once "02_View/albums_photos/". $id .".php";
    }
    public function newPicture() {
        $this->pictureManager->newPictureDB($_POST['name'], $_POST['picture_id'], $_POST['album']);

    }
    // ------------------ USERS ---------------------- //

    public function newUser() {
        //verif email exist
        $emailCo = $this->userManager->emailExist($_POST['email']);
        if($emailCo) {
            //manque correspondance email
            header('Location: '. URL .'connexion_inscription/?corr=1');
        }
        else {
            $userInsc = $this->userManager->newUserDB($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
            $this->connectUser();
            header('Location: '. URL .'accueil');
        }
    }
    public function connectUser() {
        $user = $this->userManager->getUserByEmail($_POST['email'], $_POST['password']);
        var_dump($user);
        if($user) {
            $this->userManager->getSession($user);
            header('Location: '. URL .'accueil');
        }
        else {
            header('Location: '. URL .'connexion_inscription');
        }
    }
    public function adminRequire() {
        if($_SESSION && $_SESSION['rank'] == 'admin') {
            return true;
        }
        else {
            return false;
        }
    }
}