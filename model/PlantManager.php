<?php
require_once('model/Manager.php');

class PlantManager extends Manager
{
    public function getPlants() {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT plant_id, namep FROM plant;";
        $stmt = $db->query($rqt);
        return $stmt;
    }

    public function getOwnPlant($user_id) {
        $manager = new Manager();
        $db = $manager->dbconnect();
        $rqt = "SELECT * FROM plant as p JOIN user_plant as up ON p.plant_id = up.plant_id WHERE user_id = '$user_id';";
        $stmt = $db->query($rqt);
        return $stmt;
    }
}