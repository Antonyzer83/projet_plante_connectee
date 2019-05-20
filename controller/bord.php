<?php
require_once('./model/PlantManager.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION)) {
    $plantmanager = new PlantManager();
    $plant = $plantmanager->getOwnPlant($_SESSION['id']);
    if ($stmt = $plant->fetch(PDO::FETCH_ASSOC)) {
        require('view/bord.html');
    }
    else {
        echo 'Vous ne posssédez pas de plante !';
    }
}
else {
    echo "Vous n'êtes pas connecté !";
}