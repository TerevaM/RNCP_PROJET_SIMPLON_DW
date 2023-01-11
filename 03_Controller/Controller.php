<?php
require_once "01_Model/AlbumManager.php";
require_once "01_Model/UserManager.php";
class Controller {
    private $albumManager;
    private $userManager;

    public function __construct()
    {
        $this->albumManager = new AlbumManager();
        $this->albumManager->loadAlbums();
        $this->userManager = new UserManager();
        $this->userManager->loadUsers();
    }
    // ------------------ ALBUMS ---------------------- //
    public function displayAlbums() {
        $albums = $this->albumManager->getAlbums();
        require_once "02_View/albums_photos.php";
    }
    public function newAlbumForm() {
        require_once "02_View/album_form.php";
    }
    // public function newAlbumFormValidation() {
    //     $this->albumManager->newAlbumFormValidation($_POST['name'], $_POST['category']);
    //     header('Location: '. URL .'albums_photos');

    public function newAlbumValid() {
        $this->albumManager->newAlbumDB($_POST['name'], $_POST['category']);
        header('Location: '. URL . 'albums_photos');
    }
    // public function newHeroForm() {
    //     require_once "03_view/new_hero_view.php";
    // }
    // public function newHeroValidation() {
    //    $this->heroManager->newHeroDB($_POST['name'], $_POST['category'], $_POST['life'], $_POST['attack'], $_POST['first_cap'], $_POST['second_cap'], $_POST['passif']);
    //     header('Location: '. URL .'heros');
    // }
    // public function editHeroForm($id) {
    //     $hero = $this->heroManager->getHeroById($id);
    //     require_once "03_view/edit_hero_view.php";
    // }
    // public function editHeroValidation() {
    // $this->heroManager->editHeroDB($_POST['id_hero'],$_POST['name'], $_POST['category'], $_POST['life'], $_POST['attack'], $_POST['first_cap'], $_POST['second_cap'], $_POST['passif']);
    //         header('Location: '. URL .'heros');
    // }
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
    // ------------------ USERS ---------------------- //

    public function newUser() {
        //verif email exist
        $emailCo = $this->userManager->emailExist($_POST['email']);
        if($emailCo) {
            //manque correspondance email
            header('Location: '. URL .'connexion_inscription');
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
}