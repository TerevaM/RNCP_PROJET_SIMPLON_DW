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
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
    public function newAlbumFormValidation($name, $category, $picture_name){
    // $req=$dbLink->prepare('INSERT INTO photos(name_id, nom,taille,type,bin,album) VALUES(?,?,?,?,?,"'.$_POST['album'] .'" )');
    // $picture = 'picture_'. time();
    // $req->execute(array($picture,$files['image']['name'], $files['image']['size'], $files['image']['type'],file_get_contents($files['image']['tmp_name'])));
        $req ="INSERT INTO albums (name, category, picture_name, release_date)
        VALUES (:name, :category, :picture_name, :release_date)";
        $date = date("d/m/y");
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":category", $category, PDO::PARAM_STR);
        $statement->bindValue(":picture_name", $picture_name, PDO::PARAM_STR);
        $statement->bindValue(":release_date", $date, PDO::PARAM_STR);

        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $album = new Album($this->getBdd()->lastInsertId(),$name, $category,$picture_name ,$date);
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
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
=======
>>>>>>> 7cc9b267823fd5b8be624e3a8f747798ea798862
            $this->addAlbum($album);
        }
    }
>>>>>>> Stashed changes

    public function getAlbumsById($id) {
        foreach($this->tab_albums as $value) {
            if($value->getId() == $id){
                return $value;
            }
        }
    }
    

    public function editAlbumDB($id, $name, $category){
        $req = "UPDATE albums SET name = :name, category = :category WHERE id = :id";

        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":category", $category, PDO::PARAM_STR);

        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $this->getAlbumsById($id)->setName($name);
            $this->getAlbumsById($id)->setCategory($category);
        }
    }

    public function deleteAlbumDB($id) {
        $req = "DELETE FROM albums WHERE id = :id";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);

        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $album = $this->getAlbumsById($id);
            unset($album);
        }
    }
}