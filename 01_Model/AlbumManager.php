<?php
require_once "00_Manager.php";
require_once "Album.php";
class AlbumManager extends Manager {
        private $tab_albums;

    public function addAlbum($album) {
        $this->tab_albums[] = $album;
    }

    public function getAlbums() {
        return $this->tab_albums;
    }
    
    public function loadAlbums(){
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM albums");
        $req->execute();
        $myAlbums = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myAlbums as $value) {
            $album = new Album($value['id'],$value['name'], $value['category'], $value['release_date']);
            $this->addAlbum($album);
        }
    }
    public function newAlbumDB($name, $category){
        $req ="INSERT INTO albums (name, category, release_date)
        VALUES (:name, :category, :release_date)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":category", $category, PDO::PARAM_STR);
        $date = date("d/m/y");
        $statement->bindValue(":release_date", $date, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();
        if($result) {
            $album = new Album($this->getBdd()->lastInsertId(),$name, $category, $date);
            $this->addAlbum($album);
        }
    }

    // public function getHeroById($id) {
    //     foreach($this->tab_heroes as $value) {
    //         if($value->getId() == $id){
    //             return $value;
    //         }
    //     }
    // }

    // public function editHeroDB($id, $name, $category, $life, $attack, $first_cap, $second_cap, $passif){
    //     $req = "UPDATE heroes SET name = :name, category = :category, vie = :vie, attaque = :attaque, first_cap = :first_cap, second_cap = :second_cap, passif = :passif WHERE id = :id";

    //     $statement = $this->getBdd()->prepare($req);
    //     $statement->bindValue(":id", $id, PDO::PARAM_INT);
    //     $statement->bindValue(":name", $name, PDO::PARAM_STR);
    //     $statement->bindValue(":category", $category, PDO::PARAM_STR);
    //     $statement->bindValue(":vie", $life, PDO::PARAM_INT);
    //     $statement->bindValue(":attaque", $attack, PDO::PARAM_INT);
    //     $statement->bindValue(":first_cap", $first_cap, PDO::PARAM_STR);
    //     $statement->bindValue(":second_cap", $second_cap, PDO::PARAM_STR);
    //     $statement->bindValue(":passif", $passif, PDO::PARAM_STR);

    //     $result = $statement->execute();
    //     $statement->closeCursor();

    //     if($result) {
    //         $this->getHeroById($id)->setName($name);
    //         $this->getHeroById($id)->setCategory($category);
    //         $this->getHeroById($id)->setVie($life);
    //         $this->getHeroById($id)->setAttaque($attack);
    //         $this->getHeroById($id)->setFirst_cap($first_cap);
    //         $this->getHeroById($id)->setSecond_cap($second_cap);
    //         $this->getHeroById($id)->setPassif($passif);

    //     }
    // }

    // public function deleteHeroDB($id) {
    //     $req = "DELETE FROM heroes WHERE id = :id";
    //     $statement = $this->getBdd()->prepare($req);
    //     $statement->bindValue(":id", $id, PDO::PARAM_INT);

    //     $result = $statement->execute();
    //     $statement->closeCursor();

    //     if($result) {
    //         $hero = $this->getHeroById($id);
    //         unset($hero);
    //     }
    // }
}