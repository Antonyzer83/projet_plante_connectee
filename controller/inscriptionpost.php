<?php
require_once('./model/UserManager.php');
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['firstpsswd'], $_POST['secondpsswd'], $_POST['card'])) {
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $fpassword = $_POST['firstpsswd'];
    $spassword = $_POST['secondpsswd'];
    $usermanager = new UserManager();
    // Vérification de l'existence du login
    if ($test = $usermanager->getUser($email, password_hash($fpassword, PASSWORD_DEFAULT))) {
        print_r($test);
    }
    // Vérification email
    // Vérification de deux mdp identiques
    // Hashage du mdp
}
else {
    echo 'Echec';
}