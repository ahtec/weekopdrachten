<?php

require_once 'schip.php';

$naamFileMetSerializedData = 'alleSchepenGeserialixed.txt';
if (file_exists($naamFileMetSerializedData)) {
    $serializeData = file_get_contents($naamFileMetSerializedData);
    $alleSchepen = unserialize($serializeData);

    for ($i = 0; $i < count($alleSchepen); $i++) {
        $alleSchepen[$i]->geraakt = FALSE;
    }

    $serializeData = serialize($alleSchepen);
    file_put_contents($naamFileMetSerializedData, $serializeData);
}
$verslag = "Schepen zijn weer hersteld";
//      echo "<script type='text/javascript'>alert(Schepen zijn weer hersteld);</script>";
echo "<script type='text/javascript'>alert('$verslag');</script>";


//header("Location: http://localhost/weekopdrachten/startzeeslag.html");

header("Location: http://localhost/weekopdrachten/startzeeslag.html");
//exit;
?>