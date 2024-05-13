<?php
require_once "../vendor/autoload.php";

use App\controller\BienImmobilier;
use App\controller\Maison;
use App\model\DBConfig;

$bien_1 = new BienImmobilier("80", "120", "Ici", "2");
//$db = new DBConfig();
//var_dump($db->getConnection());
$bien_1->create();

// var_dump($bien_1);

// echo "La surface est de " . $bien_1->getSurface() . " mètres carrés.";

$maison_1 = new Maison(
        "200",
        "1200",
        "làbas",
        "5",
        "aucun",
        0,
        3
);

function debug($arg)
{
    echo "<pre>" . print_r($arg, true) . "</pre>";
}

debug($maison_1);

?>

<html>

<p>Le tarif hors frais est de <?php echo $bien_1->getPrix()?> euros.</p>
<p>Le tarif avec les frais de notaire est de <?php echo $bien_1->getPrixFNI()?> euros.</p>

<?php $bien_1->setFraisDeNotaire(10) ?>

<p>Le nouveau tarif avec frais de notaire est de <?php echo $bien_1->getPrixFNI() ?> euros.</p>

</html>
