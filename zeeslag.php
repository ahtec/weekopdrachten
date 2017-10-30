<?php

$zee = array();
$grooteZee = 10;


$tempArray = array();
for ($hor = 0; $hor < $grooteZee; $hor++) {
    
    for ($ver = 0; $ver < $grooteZee; $ver++) {
        $tempArray[]  = [$ver];
        
    }
    $zee[] = $tempArray; 
    
}

print_r($zee);

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
        for ($index = 0; $index < count($array); $index++) {
            
        }    
        
        return $eruit;
        
    }
    
    
    
    
    
    
    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

