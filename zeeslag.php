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
            function directeVerwijzing(xvar, yvar, schipID) {
                var locationRegel = "zeeslag.php?xCoordinaat=" + xvar + "&yCoordinaat=" + yvar + "&schip=" + schipID;
                document.location = locationRegel;
//                alert();
            }
        </script>


    </head>
    <body>


        <!--<form action=zeeslag.php method=GET  >-->
        <?php
//            echo count($_GET);
//            $var1 = count($_GET);
//            echo $var1;
//            if ($var1 != 2) {
        $schipID = -1;

        $schip1 = new schip(array(array(30, 10), array(30, 11), array(30, 12), array(30, 13), array(30, 14), array(30, 15), array(30, 16), array(30, 17)), "De Ruyter");
        $schip2 = new schip(array(array(10, 20), array(10, 21), array(10, 22), array(10, 23), array(10, 24), array(10, 25), array(10, 26), array(10, 27)), "De Kareldoorman");
        $schip3 = new schip(array(array(10, 5), array(11, 5), array(12, 5)), "De Walrus");
//            $schip4 = new schip(array(array(100, 80), array(100, 51), array(100, 82)), "De Johan de Witt");
//            $schip5 = new schip(array(array(100, 11), array(100, 12), array(100, 13)), "de Van Kinsbergen");
//            }
        $alleSchepen = array($schip1, $schip2, $schip3);
        if (count($_GET) == 0) {
            schermOpBouw($alleSchepen);
        }
        ?>




    </body>
    <?php
    $var2 = count($_GET);
//    echo $var2;
    if ($var2 == 3) {

        echo $_GET['schip'];
        updateGaraakteSchepen($_GET['schip'], @$alleSchepen);
        schermOpBouw($alleSchepen);
        $schipID = bomsAwayOp($_GET['xCoordinaat'], $_GET['yCoordinaat'], $alleSchepen);
    }
    ?>
    <?php

    function schermOpbouw($param_alleSchepen) {
        echo "        <table>";
        for ($y = 1; $y < 50; $y++) {  ///rijen
            echo"<tr>";
            for ($x = 1; $x < 50; $x++) {   //colommen
//                    echo "<input type='checkbox' name=checkit_" . $x ."_" .$y. " value=jojo> ";
//                    $schipID = -1;
//                    echo "<br>Voor aanroep welkschipligthier".$schipID;
                $schipID = welkSchipLigtHier($x, $y, $param_alleSchepen);
//                                        echo "<br>na aanroep welkschipligthier".$schipID;
                if ($schipID >= 0) {
//                                        echo "<br>na if >= 0:".$schipID;
//                        echo '<td onclick="directeVerwijzing(' . $x . '  ,  ' . $y . ' , ' . $schipID'   ')"><div id="idHierLigtEenSchip"></div></td>';
                    echo '<td onclick="directeVerwijzing(' . $x . '  ,  ' . $y . ' , ' . $schipID . ')"><div id="idHierLigtEenSchip"></div></td>';
                } else {
                    echo '<td onclick="directeVerwijzing(' . $x . ',' . $y . ', ' . "-1" . ')"><div id="idHierLigtGeenSchip"></div></td>';
//                    echo '<td><div> tests'.$x.$y.'</div></td>';
                }
            }
            echo"</tr>";
        }
        echo '<table border="0">';
    }

    function updateGaraakteSchepen($param_schipID, $param_alleSchepen) {
        if ($param_schipID >= 0) {
            echo "In updateGaraakteSchepen" . $param_schipID;
            $param_alleSchepen[$param_schipID]->geraakt = TRUE;
            echo $param_alleSchepen[$param_schipID]->geraakt;
            print_r($param_alleSchepen[$param_schipID]);
//            echo " " . FALSE;
        }
    }

    function bomsAwayOp($hor, $ver, $param_alleSchepen) {
        echo "<br> <br>Bommen op positie : " . $hor . " " . $ver;
        for ($i = 0; $i < count($param_alleSchepen); $i++) {
            if ($param_alleSchepen[$i]->geraakt == FALSE) {
                //            $naamSchip = $huidigSchip->naamSchip;
                echo "<br>Ik kijk of ik  " . $param_alleSchepen[$i]->naamSchip . " geraakt hebt";
                if ($param_alleSchepen[$i]->benIkGeraakt($hor, $ver)) {
//                    return $param_alleSchepen[$i]->schipId;
                }
            } else {
                echo "<br> Het schip dat geraakt was is " . $param_alleSchepen[$i]->naamSchip;
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
//        echo "<br>welkSchipLigtHier: "  . $eruit;
        return $eruit;
    }

    class schip {

        public $positie = array();
        public $geraakt;
        public $naamSchip;
        public $schipId;

        function __construct($param1, $param2) {
            static $schepenTeller = 0;
            echo $schepenTeller;
            $this->positie = $param1;
            $this->naamSchip = $param2;
            $schepenTeller++;
        }

        function ligtDitSchipOpCoordinaat($hor, $ver) {
            $eruit = FALSE;
            for ($i = 0; $i < count($this->positie); $i++) {
                if ($this->positie[$i][0] == $hor && $this->positie[$i][1] == $ver) {
                    $eruit = TRUE;
                }
            }

            return $eruit;
        }

        function benIkGeraakt($hor, $ver) {
            $eruit = FALSE;
            for ($i = 0; $i < count($this->positie); $i++) {
                if ($this->positie[$i][0] == $hor && $this->positie[$i][1] == $ver) {
                    echo " en jawel..." . $this->naamSchip . " GERAAKT op positie " . $i;
                    $eruit = TRUE;
                    $this->geraakt = TRUE;
//                    break;
                    //                exit();
                }
            }
            if (!$eruit) {
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
