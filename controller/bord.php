<?php
// Insertion du modèle PlantManager
require_once('./model/PlantManager.php');
// Insertion du modèle AdafruitManager
require_once('./model/AdafruitManager.php');
// Vérification du statut de la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification de la connexion de l'utilisateur
if (isset($_SESSION["id"]) && isset($_SESSION["name"]) && isset($_SESSION["card"])) {
    $plantmanager = new PlantManager();
    $plant = $plantmanager->getOwnPlant($_SESSION['id']);
    // Vérification de l'existence d'une plante liée à la carte entrée lors de l'inscription
    if ($stmt = $plant->fetch(PDO::FETCH_ASSOC)) {
        $params = parse_ini_file('db.ini');
        $adafruitmanager = new AdafruitManager($params["key"], $params["username"], $_SESSION["card"]);
        // Récuépération des données provenant d'Adafruit
        if ($json = $adafruitmanager->getGroupFeeds()) {
            $data = json_decode($json);
            $humidityground = $data[0]->last_value;
            $humidityair = $data[1]->last_value;
            $temperature = $data[2]->last_value;
            require('view/bord.php');
        } else {
            echo "Vous n'avez pas de carte !";
        }
    } else {
        echo 'Vous ne posssédez pas de plante !';
    }
} else {
    echo "Vous n'êtes pas connecté !";
}