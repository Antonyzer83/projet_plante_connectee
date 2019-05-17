<?php
require_once('./model/UserManager.php');
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['firstpsswd'], $_POST['secondpsswd'], $_POST['card'])) {
    // Déclaration et affectation de variables avec les données du formulaire
    $lname = $_POST['lastname'];
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $fpassword = $_POST['firstpsswd'];
    $spassword = $_POST['secondpsswd'];
    $card = $_POST['card'];
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
            if($usermanager->addUser($fname, $lname, $email, $card, $password)) {
                echo 'Inscription réussi </br> <a href="index.php?action=connection">Se connecter</a>';
            }
            else {
                echo 'Echec lors de l\'inscription';
            }
        }
        else {
            echo 'Les mots de passe entrés sont différents !';
        }
    }
    else {
        echo 'Ce compte existe déjà !';
    }
}
else {
    echo 'Echec de l\'envoi du formulaire';
}