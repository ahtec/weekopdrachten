<?php
/* * ****************************************************
 *  Dit php programma gebruikt 3 parameters
 *  Gerard Doets 25 oktober 2017
 * *****************************************************
  $eerste   dit is het eerste argement van de bewerking
  $tweede   dit is het tweede  argement van de bewerking
  $bewerking = dit is de bewerking tussen de parameters
 * *********************************************************
 */
$bewerking = $_GET['bewerking'];

$eerste = $_GET['eerste'];
$tweede = $_GET['tweede'];

echo "<br>";
echo "<br>";
switch ($bewerking) {
    case "optellen":
        optellen($eerste, $tweede);
        break;
    case "aftrekken":
        aftrekken($eerste, $tweede);
        break;
    case "vermenigvuldigen":
        vermenigvuldigen($eerste, $tweede);
        break;
    case "delen":
        delen($eerste, $tweede);
        break;
    case "machtverheffen":
        machtverheffen($eerste, $tweede);
        break;
    case "wortel":
        wortel($eerste, $tweede);
        break;
    case "rest":
        rest($eerste, $tweede);
        break;
    default:
        echo "Onbekende bewerking: " . $bewerking;
        echo "<br>U kunt gebruiken: optellen aftrekken vermenigvuldigen delen machtverheffen wortel";
        echo" rest";
        break;
}
echo "<br>";

echo "<br>";

function optellen($var1, $var2) {
    echo "Het getal " . $var1 . " opgeteld bij  " . $var2 . " is:  " . ($var1 + $var2);
}

function aftrekken($var1, $var2) {
    echo "Het getal " . $var1 . " verminderd met  " . $var2 . " is:  " . ($var1 - $var2);
}

function vermenigvuldigen($var1, $var2) {
    echo "Het getal " . $var1 . " vermenigvuldigd met " . $var2 . " is : " . ($var1 * $var2);
}

function delen($var1, $var2) {
    if ($var2 == 0) {
        echo "Kan niet delen door 0";
    } else {
        echo "Het getal " . $var1 . " gedeeld door " . $var2 . " is: " . ($var1 / $var2);
    }
}

function machtverheffen($var1, $var2) {
    echo "Het getal " . $var1 . " tot de macht " . $var2 . " is : " . ($var1 ** $var2);
}

function wortel($var1, $var2) {
    $var3 = 1 / $var2;
    echo "De " . $var2 . "macht wortel van " . $var1 . " is : " . ($var1 ** $var3);
}

function rest($var1, $var2) {
//    $var3 = 1 / $var2;
    echo "De rest na deling van " . $var1 . " gedeeld door " . $var2 . " is : " . ($var1 % $var2);
}

?>
