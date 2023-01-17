<?php

require_once "00_Manager.php";
require_once "picture.php";

class PictureManager extends Manager {
        private $tab_pictures;

    public function addPicture($picture) {
        $this->tab_pictures[] = $picture;
    }

    public function getPicturesByAlbum($album) {
        foreach($this->tab_pictures as $value) {
            if($value->getAlbum() == $album){
                $tab_pics[] = $value;
            }
        }
        return $tab_pics;
    }

    
    public function loadPictures(){
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM pictures");
        $req->execute();
        $myPictures = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myPictures as $value) {
            $picture = new Picture($value['id'],$value['name'], $value['picture_id'],$value['album'], $value['release_date']);
            $this->addPicture($picture);
        }
    }

    public function newPictureDB($name, $picture_id, $album){
        $req ="INSERT INTO pictures (name, picture_id, album, release_date)
        VALUES (:name, :picture_id, :album, :release_date)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":name", $name, PDO::PARAM_STR);
        $statement->bindValue(":picture_id", $picture_id, PDO::PARAM_STR);
        $statement->bindValue(":album", $album, PDO::PARAM_STR);
        $date = date("d/m/y");
        $statement->bindValue(":release_date", $date, PDO::PARAM_STR);

        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $picture = new Picture($this->getBdd()->lastInsertId(),$name, $picture_id, $album, $date);
            $this->addPicture($picture);
        }
    }
//     public function emailExist($email) {
//         $correspondance = 0;
//         foreach($this->tab_users as $value) {
//             if($value->getEmail() === $email):
//                 $correspondance++;
//             endif;
//         }
//         $correspondance > 0 ? $corr = true : $corr = false;
//         return $corr;
//     }
//    public function getUserByEmail($email, $password) {
//         foreach($this->tab_users as $value) {
//             if($value->getEmail() === $email && password_verify($password, $value->getPassword())){
//                 return $value;
//             }
//         }
//     }
//         public function getSession($user){
//         $_SESSION['firstname'] = $user->getFirstname();
//         $_SESSION['lastname'] = $user->getLastname();
//         $_SESSION['email'] = $user->getEmail();
//         $_SESSION['password'] = $user->getPassword();
//         $_SESSION['rank'] = $user->getRank();
//     }
}
