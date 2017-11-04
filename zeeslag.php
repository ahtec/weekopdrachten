<!-----
fo

teken eerst invoer html voor schepen

voer schepen in 
als je klaar bent met schepen invoeren

ga naar schieten html
    schiet op  coordinaat
    geef resultaat 
    herhaal schieten

----->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="mystyle.css">
        <meta name=keywords content="zeeslag batle ship "></meta>
        <meta name=description content="dit is de oeffening om zeeslag te programmeren"></meta>
        <meta name=author content="Gerard Doets"></meta>
        <meta name=viewport content="width=device-width,initial-scale=1.0" ></meta>
        <script>
            function directeVerwijzing(xvar, yvar) {
                var locationRegel = "zeeslag.php?xCoordinaat=" + xvar + "&yCoordinaat=" + yvar;
                document.location = locationRegel;
//                alert();
            }
        </script>


    </head>
    <body>


        <!--<form action=zeeslag.php method=GET  >-->
        <?php
        require_once 'schip.php';

//            echo count($_GET);
//            $var1 = count($_GET);
//            echo $var1;
//            if ($var1 == 0) {
        $schipID = -1;

        $naamFileMetSerializedData = 'alleSchepen.txt';
        if (file_exists($naamFileMetSerializedData)) {
            echo "In het eerste deel";
            $serializeData = file_get_contents($naamFileMetSerializedData);
            $alleSchepen = unserialize($serializeData);
        } else {
//            $schip2 = new schip(array(array(10, 20), array(10, 21), array(10, 22), array(10, 23), array(10, 24), array(10, 25), array(10, 26), array(10, 27)), "De Kareldoorman");
//            $schip3 = new schip(array(array(10, 5), array(11, 5), array(12, 5)), "De Walrus");
//            $schip1 = new schip(array(array(22, 10), array(22, 11), array(22, 12), array(22, 13), array(22, 14), array(22, 15), array(22, 16), array(22, 17)), "De Ruyter");
//            $schip1 = new schip(array(array(30, 10), array(30, 11), array(30, 12), array(30, 13), array(30, 14), array(30, 15), array(30, 16), array(30, 17)), "De Zeven provincien");
//            $alleSchepen = array($schip1, $schip2, $schip3);
            $alleSchepen[] = new schip(array(array(10, 20), array(10, 21), array(10, 22), array(10, 23), array(10, 24), array(10, 25), array(10, 26), array(10, 27)), "De Kareldoorman");
            $alleSchepen[] = new schip(array(array(22, 10), array(22, 11), array(22, 12), array(22, 13), array(22, 14), array(22, 15), array(22, 16), array(22, 17)), "De Ruyter");
            $alleSchepen[] = new schip(array(array(30, 10), array(30, 11), array(30, 12), array(30, 13), array(30, 14), array(30, 15), array(30, 16), array(30, 17)), "De Zeven provincien");
            $alleSchepen[] = new schip(array(array(10, 5), array(11, 5), array(12, 5)), "De Walrus");
            $serializeData = serialize($alleSchepen);
            file_put_contents($naamFileMetSerializedData, $serializeData);
        }

        if (count($_GET) == 0) {
            schermOpBouw($alleSchepen);
        }
        ?>

    </body>
    <?php
    $var2 = count($_GET);
//    echo $var2;
    if ($var2 == 2) {
//        deze php is aangeroepen met bom coordinaten
//         aanroep per schip of het schip geraakt is
//        als dan  wordt voor dat schip  de "geraakt" variabele op waar gezet t
        $schipID = bomsAwayOp($_GET['xCoordinaat'], $_GET['yCoordinaat'], $alleSchepen);

//        De gegevens worden geserialized en daarmee bewaard

        $serializeData = serialize($alleSchepen);
        file_put_contents($naamFileMetSerializedData, $serializeData);

        schermOpBouw($alleSchepen);
    }

    function bomsAwayOp($hor, $ver, $param_alleSchepen) {
        echo "<br> <br>Bommen op positie : " . $hor . " " . $ver;
        for ($i = 0; $i < count($param_alleSchepen); $i++) {
            if ($param_alleSchepen[$i]->geraakt == FALSE) {
                if ($param_alleSchepen[$i]->benIkGeraakt($hor, $ver)) {
                    
                } else {
                    echo "<br>   " . $param_alleSchepen[$i]->naamSchip . " niet geraakt ";
                }
            }
        }
    }

    function welkSchipLigtHier($hor, $ver, $param_alleSchepen) {
        $eruit = -1;
        for ($i = 0; $i < count($param_alleSchepen); $i++) {
            if ($param_alleSchepen[$i]->geraakt == FALSE) {
                if ($param_alleSchepen[$i]->ligtDitSchipOpCoordinaat($hor, $ver) == TRUE) {
                    $eruit = $i;
                }
            }
        }
        return $eruit;
    }

    function schermOpbouw($param_alleSchepen) {
        echo "        <table>";
        for ($y = 1; $y < 50; $y++) {  ///rijen
            echo"<tr>";
            for ($x = 1; $x < 50; $x++) {   //colommen
                $schipID = welkSchipLigtHier($x, $y, $param_alleSchepen);
                if ($schipID >= 0) {
                    echo '<td onclick="directeVerwijzing(' . $x . '  ,  ' . $y . ' )"><div id="idHierLigtEenSchip"></div></td>';
                } else {
                    echo '<td onclick="directeVerwijzing(' . $x . '  ,  ' . $y . ')"><div id="idHierLigtGeenSchip"></div></td>';
                }
            }
            echo"</tr>";
        }
        echo '</table>';
    }
    ?>

</html>
