<?php

$zee = array();
$grooteZee = 4;

$schip1 = new schip;
$schip1->positie = array(array( 100,10));
$schip1->positie = array(array( 100,11));
$schip1->positie = array(array( 100,12));







$tempArray = array();
for ($hor = 0; $hor < $grooteZee; $hor++) {
    
    for ($ver = 0; $ver < $grooteZee; $ver++) {
        $tempArray[]  = [$ver];
        
    }
    $zee[] = $tempArray; 
    
}

//print_r($zee);
print_r($schip1);
echo $schip1->benIkGeraakt(100, 11);


class schip {

    public $positie = array();
    
    
//    public $horVoorPositieInDeZee;
//    public $verVoorPositieInDeZee;
//    public $horAchterPositieInDeZee;
//    public $verAchterPositieInDeZee;
//    public $lengte;
    public $geraakt;

    function geefPosite() {
        
    }
    function benIkGeraakt($hor, $ver) {
        $eruit = false;
        
//        foreach ($positie)
        for ($i = 0; $i < count($this->positie); $i++) {
           if  ($positie[$i][0] == $hor &&  $positie[$i][1] == $ver    ) {
               echo "GERAAKT";
           }
        }    
        
        return $eruit;
        
    }
    
    
    
    
    
    
    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

