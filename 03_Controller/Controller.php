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

    // public function deleteHero($id) {
    //     $this->heroManager->deleteHeroDB($id);
    //     header("Location: ". URL ."heros");
    // }
    // ------------------ USERS ---------------------- //

    public function newUser() {

    }
    public function connectUser() {
        $user = $this->userManager->getUserByEmail($_POST['email'], $_POST['password']);
        session_start();
        $_SESSION['firstname'] = $user->getFirstname();
        $_SESSION['lastname'] = $user->getLastname();
        $_SESSION['email'] = $user->getEmail();
        $_SESSION['password'] = $user->getPassword();
        $_SESSION['rank'] = $user->getRank();
        header('Location: '. URL .'accueil');
    }
}