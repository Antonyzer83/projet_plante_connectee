<?php
if (isset($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['firstpsswd'], $_POST['secondpsswd'], $_POST['card'])) {
    echo 'Succès';
    // Vérification de l'existence du login
    // Vérification email
    // Vérification de deux mdp identiques
    // Hashage du mdp
}
else {
    echo 'Echec';
}