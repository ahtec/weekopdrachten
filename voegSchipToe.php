<?php



$naamSchip = $_GET['schipnaam'];
$xStart =  $_GET['x1'];
$yStart =  $_GET['y1'];
$xEind =  $_GET['x2'];
$yEind =  $_GET['y2'];

$positie =  array();
$allePosities =  array();

if ($xStart == $xEind )  {  // schip ligt horizontaal
    
   for ($i=$yStart;$i <= $yEind; $i++){
     
       $positie[] = $xStart;
       $positie[] = $i;  
      $allePosities[] = $positie; 
       
   }
   print_r($allePosities);
}

//
//
//        $naamFileMetSerializedData = 'alleSchepenGeserialixed.txt';
//        if (file_exists($naamFileMetSerializedData)) {
//            $serializeData = file_get_contents($naamFileMetSerializedData);
//            $alleSchepen = unserialize($serializeData);
//        } else {
//            $alleSchepen = opbouwAlleSchepen();
//        
//            $serializeData = serialize($alleSchepen);
//            file_put_contents($naamFileMetSerializedData, $serializeData);
//        }
//
//        
//        
//        
//        $eruit[] = new schip(array(array(10, 20), array(10, 21), array(10, 22), array(10, 23), array(10, 24), array(10, 25), array(10, 26), array(10, 27)), "De Kareldoorman");
//        
//        
//        
//
//
//
?>