<?php
require_once('model/Manager.php');

class UserManager extends Manager
{
    public function getUser($email, $card) {
        /*
         * Fonction permettant la récupération d'un utilisateur à l'aide d'un email et d'un numéro de carte
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM userp WHERE email = :email AND card_id = :id;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["email" => $email, "id" => $card]);
        return $stmt;
    }

    public function getUserByEmail($email) {
        /*
         * Fonction permettant la récupération d'un utilisateur à l'aide de son email
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM userp WHERE email = :email;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["email" => $email]);
        return $stmt;
    }

    public function updateUser($user_id, $item, $value) {
        /*
         * Fonction permettant la MAJ d'un utilisateur
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "UPDATE userp SET $item = :value WHERE user_id = :id;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["value" => $value, "id" => $user_id]);
        return $stmt;
    }

    public function addUser($fname, $lname, $email, $card_id, $password) {
        /*
         * Fonction permettant l'ajout d'un utilisateur
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "INSERT INTO userp(firstname, lastname, email, card_id, password) VALUES(:fname, :lname, :email, :id, :password);";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["fname" => $fname, "lname" => $lname, "email" => $email, "id" => $card_id, "password" => $password]);
        return $stmt;
    }

    public function addUserPlant($user_id, $plant_id) {
        /*
         * Fonction permettant l'ajout d'un lien entre un utilisateur et une plante type
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "INSERT INTO user_plant(user_id, plant_id) VALUES(:user_id, :plant_id);";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["user_id" => $user_id, "plant_id" => $plant_id]);
        return $stmt;
    }

    public function delUser($user_id) {
        /*
         * Fonction permettant de supprimer un utilisateur à l'aide de son id
         */
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "DELETE FROM userp WHERE user_id = :id;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["id" => $user_id]);
        return $stmt;
    }
}