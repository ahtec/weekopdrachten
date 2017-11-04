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
?>
