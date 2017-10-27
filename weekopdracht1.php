
<html>
    <head>
        <style>
            body{
                font-family: 'courier';
            }
        </style>
    </head>
    <?php
    /*     * ****************************************************
     *  Dit php programma gebruikt 3 parameters
     *  Gerard Doets 25 oktober 2017
     * *****************************************************
      $eerste   dit is het eerste argement van de bewerking
      $tweede   dit is het tweede  argement van de bewerking
      $bewerking = dit is de bewerking tussen de parameters
     * *********************************************************
     */
    $bewerking = $_GET['bewerking'];
    ;

    $eerste = $_GET['eerste'];
    $tweede = $_GET['tweede'];

    echo "<br>U kunt gebruiken: <b><br>  optellen <br>aftrekken<br> vermenigvuldigen <br>delen<br> machtverheffen <br>wortel<br>";
    echo" rest <br>logaritme<br> kegeloppervlakte<br> kegelinhoud <br> faculteit <br>faculteitOverzicht";
    echo "<br>";
    echo "<br>";
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
        case "wortel":   //  met dank aan de wiskunde lerares
            wortel($eerste, $tweede);
            break;
        case "rest":
            rest($eerste, $tweede);
            break;
        case "logaritme":
            logaritme($eerste, $tweede);
            break;
        case "kegeloppervlakte":
            kegeloppervlakte($eerste, $tweede);
            break;
        case "kegelinhoud":
            kegelinhoud($eerste, $tweede);
            break;
        case "faculteit":
            echo faculteit($eerste);
            break;
        case "faculteitOverzicht":
            for ($i = 2; $i <= 170; $i++) {  // 170 geeft de hoogste waarde mogelijk
                echo "  <br>" . $i . " faculteit geeft " . faculteit($i);
            }
            break;
        default:
            echo "Onbekende bewerking: " . $bewerking;

            break;
    }
    echo "<br>";
    echo "<br>";

    function optellen($var1, $var2) {
//        $aanroep = debug_backtrace(1, 2);
        $uitkomst = $var1 + $var2;
        printUitkomst($var1,$var2,$uitkomst);
//        echo "<br>Het getal " . $var1 . "  " . $aanroep[0]["function"] . " met  " . $var2 . " is:  " . ($var1 + $var2);
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
        if ($var2 <= 0 || $var1 <= 0) {
            echo "Beide  argumenten moeten  positef zijn voor worteltrekken";
        } else {
            $var3 = 1 / $var2;
            echo "De " . $var2 . "macht wortel van " . $var1 . " is : " . ($var1 ** $var3);
        }
    }

    function rest($var1, $var2) {
        if ($var2 <= 0 || $var1 <= 0) {
            echo "Beide  argumenten moeten  positef zijn voor modulo berekening";
        } else {
            echo "De rest na deling van " . $var1 . " gedeeld door " . $var2 . " is : " . ($var1 % $var2);
        }
    }

    function logaritme($var1, $var2) {
        if ($var2 <= 0 || $var1 <= 0) {
            echo "Beide  argumenten moeten  positef zijn voor logaritme berekening";
        } else {
            $uitkomst = log($var2, $var1);

            echo "Ik moet  " . $var1 . " verheffen tot macht " . $uitkomst . " om  " . $var2 . " te krijgen";
        }
    }

    function kegeloppervlakte($straal, $hoogte) {
        $uitkomst = pi() * ( $straal ** 2) + pi() * $straal * ($straal ** 2 + $hoogte ** 2 ) ** 0.5;
        echo "De oppervlakte van de kegel met straal  " . $straal . " en hoogte " . $hoogte . " is " . $uitkomst;
    }

    function kegelinhoud($straal, $hoogte) {
        $uitkomst = pi() * ( $straal ** 2) * $hoogte / 3;
        echo "De inhoud van de kegel met straal  " . $straal . " en hoogte " . $hoogte . " is " . $uitkomst;
    }

    function faculteit($var1) {
// recursie is dus mogelijk in php
        if ($var1 < 2) {
            return 1;
        } else {
            return $var1 * faculteit($var1 - 1);
        }
    }

    function printUitkomst($par1,$par2,$uitkomst) {
        $aanroep = debug_backtrace();
        echo "Het getal in ".$par1." met bewerking ".$aanroep[1]["function"] ." met ".$par2 ." is ".$uitkomst;

//        echo $aanroep[1]["function"];
//        var_dump($aanroep);
    }
    ?>



</html>