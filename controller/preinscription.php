<?php
// Insertion du modèle PlantManager
require_once('./model/PlantManager.php');
$plantmanager = new PlantManager();
$plants = $plantmanager->getPlants();
// Vérification de l'existence des plantes en BDD
if ($plants->rowCount() > 0) {
    ob_start();
    while ($ligne=$plants->fetch(PDO::FETCH_ASSOC)) {
        ?><option value="<?php echo $ligne['plant_id'];?>"><?php echo $ligne['namep'];?></option> <?php
    }
    // récupération du contenu HTML généré précédemment
    $content = ob_get_clean();
    // Inclusion de la page d'inscription
    require('view/inscription.php');
} else {
    echo "Il n'existe pas de plante !";
}