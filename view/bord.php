<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
    <link rel="stylesheet" type="text/css" href="./style/bord.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Bonjour <?php echo $_SESSION['name'];?></h1>
        <a id="logout" href="index.php?action=disconnection">Se déconnecter</a>
    </header>
    <div id="page">
        <div class="plant">
            <h2>Ma plante</h2>
            <ul>
                <li><strong>Humidité du sol :</strong> <?php echo $humidityground; ?> %</li>
                <li><strong>Humidité de l'air :</strong> <?php echo $humidityair; ?> %</li>
                <li><strong>Température de l'air :</strong> <?php echo $temperature; ?>°C</li>
            </ul>
        </div>
        <div class="plant">
            <h2>Plante type : <?php echo $stmt['namep']; ?></h2>
            <ul>
                <li><strong>Catégorie :</strong> <?php echo $stmt['category']; ?></li>
                <li><strong>Description :</strong> <?php echo $stmt['descr']; ?></li>
                <li><strong>Humidité optimale du sol :</strong> <?php echo $stmt['ground_humidity']; ?> %</li>
                <li><strong>Humidité optimale de l'air :</strong> <?php echo $stmt['air_humidity']; ?> %</li>
                <li><strong>Température de l'air optimale :</strong> <?php echo $stmt['air_temperature']; ?>°C</li>
                <li><strong>Luminosité :</strong> <?php echo $stmt['luminosity']; ?> %</li>
                <li><strong>Période de floraison :</strong> <?php echo $stmt['from_period'] . ' - ' . $stmt['to_period']; ?></li>
            </ul>
        </div>
    </div>
</body>
</html>