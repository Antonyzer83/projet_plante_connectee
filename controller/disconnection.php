<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id']) && isset($_SESSION['card']) && isset($_SESSION['name'])) {
    session_destroy();
    $result = 'Vous êtes déconnecté !';
}
else {
    $result = 'Vous êtes déjà déconnecté !';
}
include('./view/disconnection.php');
header('Refresh: 5; http://localhost/projet_plante_connectee/index.php?action=connection');
