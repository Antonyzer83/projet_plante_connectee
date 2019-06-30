<?php
// Insertion du modèle UserManager
require_once('./model/UserManager.php');
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
    // PlantManager
    $plantmanager = new PlantManager();
    // UserManager
    $usermanager = new UserManager();
    // AdafruitManager
    $params = parse_ini_file('db.ini');
    $adafruitmanager = new AdafruitManager($params["key"], $params["username"], $_SESSION["card"]);
    // Traitement du formulaire
    if (isset($_POST['submit'], $_POST['plant'])) {
        // Mise à jour de l'ID de la plante
        if ($usermanager->updateUserPlant($_SESSION['id'], $_POST['plant'])) {
            // Récupération des valeurs de la plante choisie
            $values = $plantmanager->getOwnValues($_SESSION['id']);
            if ($values->rowCount() > 0) {
                $value = $values->fetch(PDO::FETCH_ASSOC);
                // Changement des données au niveau d'Adafruit
                $adafruitmanager->send("tophumidityground", $value['ground_humidity']);
                $adafruitmanager->send("tophumidityair", $value['air_humidity']);
                $adafruitmanager->send("toptemperature", $value['air_temperature']);
            }
        }
    }

    // Récupération des informations de la plante
    $plant = $plantmanager->getOwnPlant($_SESSION['id']);
    // Vérification de l'existence d'une plante liée à la carte entrée lors de l'inscription
    if ($stmt = $plant->fetch(PDO::FETCH_ASSOC)) {
        // Récupération des données provenant d'Adafruit
        if ($json = $adafruitmanager->getGroupFeeds()) {
            $data = json_decode($json);
            $humidityground = $data[0]->last_value;
            $humidityair = $data[1]->last_value;
            $temperature = $data[2]->last_value;
            $plants = $plantmanager->getPlants();
            // Récupération des id et des noms de plantes pour le formulaire
            if ($plants->rowCount() > 0) {
                ob_start();
                while ($plant = $plants->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo $plant['plant_id']; ?>"><?php echo $plant['name']; ?></option>
                    <?php
                }
                $plants = ob_get_clean();
            }
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