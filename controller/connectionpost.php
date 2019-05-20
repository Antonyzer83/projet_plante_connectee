<?php
require_once('./model/UserManager.php');
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usermanager = new UserManager();
    $user = $usermanager->getUserByEmail($email);
    if ($user->rowCount() > 0) {
        $stmt = $user->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $stmt['password'])) {
            session_start();
            $_SESSION['id'] = $stmt['user_id'];
            $_SESSION['name'] = $stmt['firstname'];
            $_SESSION['card'] = $stmt['card_id'];
            header('Location:index.php?action=bord');
        }
        else {
            echo 'Le mot de passe entré est incorrect !';
        }
    }
    else {
        echo 'Ce compte n\'existe pas';
    }
}
else {
    echo 'Echec de l\'envoi du formulaire';
}