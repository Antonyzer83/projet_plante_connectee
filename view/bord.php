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
        <!-- Partie pour les données collectées -->
        <div class="plant">
            <h2>Ma plante</h2>
            <ul>
                <li><strong>Humidité du sol :</strong> <span class="humidityground"><?php echo $humidityground; ?></span> %</li>
                <li><strong>Humidité de l'air :</strong> <span  class="humidityair"><?php echo $humidityair; ?></span> %</li>
                <li><strong>Température de l'air :</strong> <span class="temperature"><?php echo $temperature; ?></span>°C</li>
            </ul>
        </div>
        <!-- Partie pour les données type -->
        <div class="plant">
            <h2>Plante type : <?php echo $stmt['namep']; ?></h2>
            <ul>
                <li><strong>Catégorie :</strong> <?php echo $stmt['category']; ?></li>
                <li><strong>Description :</strong> <?php echo $stmt['descr']; ?></li>
                <li><strong>Humidité optimale du sol :</strong> <span class="humidityground"><?php echo $stmt['ground_humidity']; ?></span> %</li>
                <li><strong>Humidité optimale de l'air :</strong> <span class="humidityair"><?php echo $stmt['air_humidity']; ?></span> %</li>
                <li><strong>Température de l'air optimale :</strong> <span class="temperature"><?php echo $stmt['air_temperature']; ?></span>°C</li>
                <li><strong>Luminosité :</strong> <?php echo $stmt['luminosity']; ?> %</li>
                <li><strong>Période de floraison :</strong> <?php echo $stmt['from_period'] . ' - ' . $stmt['to_period']; ?></li>
            </ul>
        </div>
    </div>
    <!--
    <script src="./javascript/bord.js"></script>
    -->
</body>
</html>