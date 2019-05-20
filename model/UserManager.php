<?php
require_once('model/Manager.php');

class UserManager extends Manager
{
    public function getUser($email, $card) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM userp WHERE email = '$email' AND card_id = '$card';";
        $stmt = $db->query($rqt);
        return $stmt;
    }

    public function getUserByEmail($email) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM userp WHERE email = '$email';";
        $stmt = $db->query($rqt);
        return $stmt;
    }

    public function updateUser($user_id, $item, $value) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "UPDATE userp SET $item = '$value' WHERE user_id = '$user_id';";
        $stmt = $db->prepare($rqt);
        return $stmt->execute();
    }

    public function addUser($fname, $lname, $email, $card_id, $password) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "INSERT INTO userp(firstname, lastname, email, card_id, password) VALUES('$fname', '$lname', '$email', '$card_id', '$password');";
        $stmt = $db->prepare($rqt);
        return $stmt->execute();
    }

    public function addUserPlant($user_id, $plant_id) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "INSERT INTO user_plant(user_id, plant_id) VALUES('$user_id', '$plant_id');";
        $stmt = $db->prepare($rqt);
        return $stmt->execute();
    }

    public function delUser($user_id) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "DELETE FROM userp WHERE user_id = '$user_id';";
        $stmt = $db->prepare($rqt);
        return $stmt->execute();
    }
}