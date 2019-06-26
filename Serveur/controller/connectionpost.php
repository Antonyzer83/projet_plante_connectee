<?php
// Insertion du modèle UserManager
require_once('./model/UserManager.php');
// vérification de l'envoi du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usermanager = new UserManager();
    $user = $usermanager->getUserByEmail($email);
    // Vérification de l'existence d'un utilisateur
    if ($user->rowCount() > 0) {
        $stmt = $user->fetch(PDO::FETCH_ASSOC);
        // Vérification entre le mdp entré et lui stocké en BDD
        if (password_verify($password, $stmt['password'])) {
            // Démarrage de la session
            session_start();
            $_SESSION['id'] = $stmt['user_id'];
            $_SESSION['name'] = $stmt['firstname'];
            $_SESSION['card'] = $stmt['card_id'];
            // Redirection vers le tableau de bord
            header('Location:index.php?action=bord');
        } else {
            echo 'Le mot de passe entré est incorrect !';
        }
    } else {
        echo 'Ce compte n\'existe pas';
    }
} else {
    echo 'Echec de l\'envoi du formulaire';
}