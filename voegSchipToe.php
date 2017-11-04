<?php

require_once 'schip.php';


$naamSchip = $_GET['schipnaam'];
$xStart = $_GET['x1'];
$yStart = $_GET['y1'];
$xEind = $_GET['x2'];
$yEind = $_GET['y2'];

$positie = array();
$allePosities = array();
$naamFileMetSerializedData = 'alleSchepenGeserialixed.txt';


if ($xStart == $xEind) {  // schip ligt vertikaal
    for ($i = $yStart; $i <= $yEind; $i++) {

        $positie[0] = $xStart;
        $positie[1] = $i;
        $allePosities[] = $positie;
    }
    /* / ophalen flle 
      aanvulen
      wegschrijven
     */
    if (file_exists($naamFileMetSerializedData)) {
        $serializeData = file_get_contents($naamFileMetSerializedData);
        $alleSchepen = unserialize($serializeData);
    }

    $alleSchepen[] = new schip($allePosities, $naamSchip);
    $serializeData = serialize($alleSchepen);
    file_put_contents($naamFileMetSerializedData, $serializeData);              
} elseif ($yStart == $yEind) {  // schip ligt horizontaal
    for ($i = $xStart; $i <= $xEind; $i++) {

        $positie[0] = $i;
        $positie[1] = $yStart;
        $allePosities[] = $positie;
    }
    /* / ophalen flle 
      aanvulen
      wegschrijven
     */

    if (file_exists($naamFileMetSerializedData)) {
        $serializeData = file_get_contents($naamFileMetSerializedData);
        $alleSchepen = unserialize($serializeData);
    }

    $alleSchepen[] = new schip($allePosities, $naamSchip);
    $serializeData = serialize($alleSchepen);
    file_put_contents($naamFileMetSerializedData, $serializeData);
    
     

}

 header("Location: http://localhost/weekopdrachten/startzeeslag.html");
    exit;


?>