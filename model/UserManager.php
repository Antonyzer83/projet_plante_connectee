<?php
require_once('model/Manager.php');

class UserManager extends Manager
{
    public function getUser($email, $password) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM userp WHERE email = '$email' AND password = '$password';";
        $stmt = $db->query($rqt);
        return $stmt;
    }

    public function updateUser($user_id, $item, $value) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "UPDATE userp SET $item = '$value' WHERE user_id = '$user_id';";
        $stmt = $db->prepare($rqt);
        $stmt->execute();
    }

    public function addUser($fname, $lname, $email, $plant_id, $card_id, $password) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "INSERT INTO userp(first_name, last_name, email, plant_id, card_id, password) VALUES('$fname', '$lname', '$email', '$plant_id', '$card_id', '$password');";
        $stmt = $db->prepare($rqt);
        $stmt->execute();
    }

    public function delUser($user_id) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "DELETE FROM userp WHERE user_id = '$user_id';";
        $stmt = $db->prepare($rqt);
        $stmt->execute();
    }
}