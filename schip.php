<?php

/**
 * Description of schip
 * 
 * @author SGerard Doets
 */

   
    class schip {

        public $positie = array();
        public $geraakt;
        public $naamSchip;


        function __construct($param1, $param2) {

            $this->positie = $param1;
            $this->naamSchip = $param2;
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
//                    echo " <BR>" . $this->naamSchip . " GERAAKT op positie " . $i;
                    $eruit = TRUE;
                    $this->geraakt = TRUE;
                }
            }
            return $eruit;
        }

    }

