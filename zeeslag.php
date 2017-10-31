
<html>
    <head>
        <style>
            body{
                font-family: 'courier';
            }
        </style>
    </head>
        <?php

//$zee = array();
//$grooteZee = 4;

$schip1 = new schip(array(array(90, 10), array(90, 11), array(90, 12), array(90, 13), array(90, 14), array(90, 15), array(90, 16), array(90, 17)), "De Ruyter");
$schip2 = new schip(array(array(80, 20), array(80, 21), array(80, 22), array(80, 23), array(80, 24), array(80, 25), array(80, 26), array(80, 27)), "De Kareldoorman");
$schip3 = new schip(array(array(100, 50), array(100, 51), array(100, 52)), "dedobber");
$schip4 = new schip(array(array(100, 80), array(100, 51), array(100, 82)), "zeilboot");
$schip5 = new schip(array(array(100, 11), array(100, 12), array(100, 13)), "roeiboot");
$alleSchepen = array($schip1, $schip2, $schip3, $schip4, $schip5);


schiet(100, 14, $alleSchepen);
schiet(80, 26, $alleSchepen);
schiet(80, 26, $alleSchepen);
schiet(100, 14, $alleSchepen);



function schiet($hor, $ver, $param_alleSchepen) {
    echo "<br> <br>Ik schiet op positie : ".$hor ." ".$ver ;
    for ($i = 0; $i < count($param_alleSchepen); $i++) {
//        $huidigSchip = $param_alleSchepen[$i];
        if ($param_alleSchepen[$i]->geraakt == FALSE) {
//            $naamSchip = $huidigSchip->naamSchip;
            echo "<br>Ik kijk of ik  " . $param_alleSchepen[$i]->naamSchip . " geraakt hebt";
            $param_alleSchepen[$i]->benIkGeraakt($hor, $ver);
        }
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
            if ($this->positie[$i][0] == $hor && $this->positie[$i][1] == $ver) {
                echo  " en jawel...".$this->naamSchip . " GERAAKT op positie " . $i;
                $eruit = TRUE;
                $this->geraakt = TRUE;
//                exit();
            }
        }
        if (!$eruit){
            echo "  Gelukkig niet geraakt.";
            
        }
        return $eruit;
    }
}


//$tempArray = array();
//for ($hor = 0; $hor < $grooteZee; $hor++) {
//    for ($ver = 0; $ver < $grooteZee; $ver++) {
//        $tempArray[] = [$ver];
//    }
//    $zee[] = $tempArray;
//}



?></html>
