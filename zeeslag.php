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

    public $positieInDeZee;
    public $lengte;
    public $gezonken;

    function geefPosite() {
        
    }
    
    
    

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

