<?php
// Vérification du statut de la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Vérification de la connexion de l'utilisateur
if (isset($_SESSION['id']) && isset($_SESSION['card']) && isset($_SESSION['name'])) {
    // Destruction de la session
    session_destroy();
    $result = 'Vous êtes déconnecté !';
} else {
    $result = 'Vous êtes déjà déconnecté !';
}
include('./view/disconnection.php');
// Redirection vers la page de connexion
header('Refresh: 5; http://localhost/projet_plante_connectee/Serveur/index.php?action=connection');
