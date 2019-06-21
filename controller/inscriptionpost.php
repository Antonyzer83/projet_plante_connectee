<?php
// Insertion du modèle UserManager
require_once('./model/UserManager.php');
// Insertion du modèle AdafruitManager
require_once('./model/AdafruitManager.php');
// Insertion du modèle PlantManager
require_once('./model/PlantManager.php');
// Vérification de l'envoi du formulaire
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['firstpsswd'], $_POST['secondpsswd'], $_POST['card'], $_POST['plant'])) {
    // Déclaration et affectation de variables avec les données du formulaire
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $fpassword = $_POST['firstpsswd'];
    $spassword = $_POST['secondpsswd'];
    $card = $_POST['card'];
    $plant = $_POST['plant'];
    $usermanager = new UserManager();
    // Vérification de l'existence du login
    $test = $usermanager->getUser($email, $card);
    // Vérification de l'existence d'un compte ayant le même email et le même numéro de carte
    if ($test->rowCount() == 0) {
        // Vérification de l'entrée de deux MDP identiques
        if ($fpassword === $spassword) {
            // Hachage du mot de passe
            $password = password_hash($fpassword, PASSWORD_DEFAULT);
            // Vérification de l'ajout du profil dans la BDD
            if ($usermanager->addUser($fname, $lname, $email, $card, $password)) {
                // Récupération de l'id du nouvel inscrit
                if ($user = $usermanager->getUser($email, $card)) {
                    print_r($infos = $user->fetch(PDO::FETCH_ASSOC));
                    // Vérification de l'ajout de la plante dans la BDD
                    if ($usermanager->addUserPlant($infos['user_id'], $plant)) {
                        $params = parse_ini_file('db.ini');
                        $adafruitmanager = new AdafruitManager($params["key"], $params["username"], $card);
                        // Vérification de la création d'un groupe portant le nom de la carte sur Adafruit
                        if ($adafruitmanager->createGroup()) {
                            // Vérification de la création des six feeds
                            if ($adafruitmanager->createFeed("humidityground") && $adafruitmanager->createFeed("humidityair") && $adafruitmanager->createFeed("temperature") && $adafruitmanager->createFeed("tophumidityground") && $adafruitmanager->createFeed("tophumidityair") && $adafruitmanager->createFeed("toptemperature")) {
                                $plantmanager = new PlantManager();
                                $plants = $plantmanager->getOwnValues($infos['user_id']);
                                // vérification de l'existence d'une liaison entre la carte et une plante en BDD
                                if ($plants->rowCount() > 0) {
                                    $ligne = $plants->fetch(PDO::FETCH_ASSOC);
                                    // Insertion d'une valeur pour chaque feed
                                    $adafruitmanager->send("humidityground", $ligne["ground_humidity"]);
                                    $adafruitmanager->send("humidityair", $ligne["air_humidity"]);
                                    $adafruitmanager->send("temperature", $ligne["air_temperature"]);
                                    $adafruitmanager->send("tophumidityground", $ligne["ground_humidity"]);
                                    $adafruitmanager->send("tophumidityair", $ligne["air_humidity"]);
                                    $adafruitmanager->send("toptemperature", $ligne["air_temperature"]);
                                    echo 'Inscription réussi </br> <a href="index.php?action=connection">Se connecter</a>';
                                } else {
                                    echo 'Echec lors de la récupération des données';
                                }
                            } else {
                                echo 'Echec lors de la création feed';
                            }
                        } else {
                            echo 'Echec lors de la création du groupe sur Adafruit';
                        }
                    } else {
                        echo 'Echec lors de l\'ajout de la plante';
                    }
                } else {
                    echo 'Echec lors de la récupération de l\'utilisateur';
                }
            } else {
                echo 'Echec lors de l\'inscription';
            }
        } else {
            echo 'Les mots de passe entrés sont différents !';
        }
    } else {
        echo 'Ce compte existe déjà !';
    }
} else {
    echo 'Echec de l\'envoi du formulaire';
}