<?php
require_once('./model/PlantManager.php');
$plantmanager = new PlantManager();
$plants = $plantmanager->getPlants();
if ($plants) {
    ob_start();
    while ($ligne=$plants->fetch(PDO::FETCH_ASSOC)) {
        ?><option value="<?php echo $ligne['plant_id'];?>"><?php echo $ligne['namep'];?></option> <?php
    }
    $content = ob_get_clean();
    require('view/inscription.php');
}
else {
    echo "Il n'existe pas de plante !";
}