<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['id']) && isset($_SESSION['card']) && isset($_SESSION['name'])) {
    session_destroy();
    echo 'Vous êtes déconnecté !';
}
else {
    echo 'Vous êtes déjà déconnecté !';
}