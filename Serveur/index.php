<?php
// Vérification de l'existence d'un paramètre GET action
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        // Page de connexion
        case 'connection':
            include('view/connection.html');
            break;
        // Page d'inscription
        case 'inscription':
            include('controller/preinscription.php');
            break;
        // Vérification de la connexion
        case 'checkconnection':
            require('controller/connectionpost.php');
            break;
        // Vérification de l'inscription
        case 'checkinscription':
            require('controller/inscriptionpost.php');
            break;
        // Tabelau de bord
        case 'bord':
            require('controller/bord.php');
            break;
        // Déconnexion
        case 'disconnection':
            require('controller/disconnection.php');
            break;
    }
} else {
    include('view/connection.html');
}