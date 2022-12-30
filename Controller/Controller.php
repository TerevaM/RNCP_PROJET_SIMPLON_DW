<?php

require_once "Model/AlbumManager.php";

class Controller {
    private $albumManager;

    public function __construct()
    {
        $this->albumManager = new AlbumManager();
        $this->albumManager->loadAlbums();
    }
    // ------------------ ALBUMS ---------------------- //
    public function displayAlbums() {
        $albums = $this->albumManager->getAlbums();
        require_once "View/home.php";
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
}