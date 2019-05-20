<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'connection':
            include('view/connection.html');
            break;
        case 'inscription':
            include('controller/preinscription.php');
            break;
        case 'checkconnection':
            require('controller/connectionpost.php');
            break;
        case 'checkinscription':
            require('controller/inscriptionpost.php');
            break;
        case 'bord':
            require('controller/bord.php');
            break;
    }
}
else {
    include('view/connection.html');
}