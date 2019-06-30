<?php
require_once('model/Manager.php');

class PlantManager extends Manager
{
    public function getPlants() {
        /*
         * Fonction permettant de récupérer toues les id et nom de chaque plante
         */
        $db = $this->dbconnect();
        $rqt = "SELECT plant_id, name FROM plant;";
        $stmt = $db->query($rqt);
        return $stmt;
    }

    public function getOwnPlant($user_id) {
        /*
         * Fonction permettant de récupérer les informations types de sa plante
         */
        $db = $this->dbconnect();
        $rqt = "SELECT * FROM plant as p JOIN user_plant as up ON p.plant_id = up.plant_id WHERE user_id = :id;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(['id' => $user_id]);
        return $stmt;
    }

    public function getOwnValues($user_id) {
        /*
         * Fonction permettant de récupérer uniquement les données humidités et température de la plante type
         */
        $db = $this->dbconnect();
        $rqt = "SELECT ground_humidity, air_temperature, air_humidity FROM plant as p JOIN user_plant as up ON p.plant_id = up.plant_id WHERE user_id = :id;";
        $stmt = $db->prepare($rqt);
        $stmt->execute(["id" => $user_id]);
        return $stmt;
    }
}