<?php

/* Deze functie heeft 3 parameters

  $eerste   dit is het eerste argement van de bewerking
  $tweede   dit is het tweede  argement van de bewerking
  $bewerking = dit is de bewerking tussen de parameters



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
    default:
        echo "Onbekende bewerking: " . $bewerking;
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

?>
