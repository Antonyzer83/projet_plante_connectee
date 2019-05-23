<?php
require_once('./model/PlantManager.php');
require_once('./model/AdafruitManager.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id'])) {
    $plantmanager = new PlantManager();
    $plant = $plantmanager->getOwnPlant($_SESSION['id']);
    if ($stmt = $plant->fetch(PDO::FETCH_ASSOC)) {
        $params = parse_ini_file('db.ini');
        $adafruitmanager = new AdafruitManager($params["key"], $params["username"], $_SESSION["card"]);
        if ($json = $adafruitmanager->getGroupFeeds()) {
            $data = json_decode($json);
            $humidityground = $data[0]->last_value;
            $humidityair = $data[1]->last_value;
            $temperature = $data[2]->last_value;
            require('view/bord.html');
        }
        else {
            "Vous n'avez pas de carte !";
        }
    }
    else {
        echo 'Vous ne posssédez pas de plante !';
    }
}
else {
    echo "Vous n'êtes pas connecté !";
}