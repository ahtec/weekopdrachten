<?php

$zee = array();
$grooteZee = 4;

$schip1 = new schip(array(array(100, 10), array(100, 11), array(100, 12)), "grootschip");
$schip2 = new schip(array(array(100, 20), array(100, 21), array(100, 22)), "leukschip");
$schip3 = new schip(array(array(100, 50), array(100, 51), array(100, 52)), "dedobber");
$schip4 = new schip(array(array(100, 80), array(100, 51), array(100, 82)), "zeilboot");
$schip5 = new schip(array(array(100, 11), array(100, 12), array(100, 13)), "roei");
$alleSchepen = array($schip1, $schip2, $schip3, $schip4, $schip5);


schiet(100, 51, $alleSchepen);


//$tempArray = array();
//for ($hor = 0; $hor < $grooteZee; $hor++) {
//    for ($ver = 0; $ver < $grooteZee; $ver++) {
//        $tempArray[] = [$ver];
//    }
//    $zee[] = $tempArray;
//}



function schiet($hor, $ver,$param_alleSchepen) {
    for ($i = 0; $i < count($param_alleSchepen); $i++) {
        $huidigSchip = $param_alleSchepen[$i];
        $naamSchip = $huidigSchip->naamSchip;
        echo "<br>Ga schieten op schip: " . $naamSchip;
         $param_alleSchepen[$i]->benIkGeraakt($hor, $ver);
        
    }
}

//////////////////////////////////////////////////////////////////////////////////
class schip {

    public $positie = array();
    public $geraakt;
    public $naamSchip;

    function __construct($param1, $param2) {
        $this->positie = $param1;
        $this->naamSchip = $param2;
    }

    function benIkGeraakt($hor, $ver) {
        $eruit = false;

        for ($i = 0; $i < count($this->positie); $i++) {
//            echo $this->positie[$i][0];
            if ($this->positie[$i][0] == $hor && $this->positie[$i][1] == $ver) {
                echo "<br>".$this->naamSchip ."  GERAAKT op positie " . $i;
                $eruit = TRUE;
//                exit();
            }
        }
        return $eruit;
    }

}
