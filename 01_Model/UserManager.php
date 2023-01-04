<?php
require_once "00_Manager.php";
require_once "User.php";
class UserManager extends Manager {
        private $tab_users;

    public function addUser($user) {
        $this->tab_users[] = $user;
    }

    public function getUsers() {
        return $this->tab_users;
    }
    
    public function loadUsers(){
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM users");
        $req->execute();
        $myUsers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach($myUsers as $value) {
            $user = new User($value['id'],$value['firstname'], $value['lastname'], $value['email'], $value['password'], $value['rank']);
            $this->addUser($user);
        }
    }

    public function newUserDB($firstname, $lastname, $email, $password){
        $req ="INSERT INTO users (firstname, lastname, email, password, rank)
        VALUES (:firstname, :lastname, :email, :password, :rank)";
        $statement = $this->getBdd()->prepare($req);
        $statement->bindValue(":firstname", $firstname, PDO::PARAM_STR);
        $statement->bindValue(":lastname", $lastname, PDO::PARAM_STR);
        $statement->bindValue(":email", $email, PDO::PARAM_STR);
        $statement->bindValue(":password", $password, PDO::PARAM_STR);
        // rang par defaut
        $statement->bindValue(":rank", 'visiteur', PDO::PARAM_STR);

        $result = $statement->execute();
        $statement->closeCursor();

        if($result) {
            $user = new User($this->getBdd()->lastInsertId(),$firstname, $lastname, $email, $password, 'visiteur');
            $this->addUser($user);
        }
    }
   public function getUserByEmail($email, $password) {
        foreach($this->tab_users as $value) {
            if($value->getEmail() === $email && $value->getPassword() === $password){
                return $value;
            }
        }
    }
}