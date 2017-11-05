<?php

/**
 * Description of schip
 *  schip heeft de eigenschappen 
 * positie  is ee 2dim array met coordinaten 
 * 0 = de xcoordinaat 
 * 1 de ycoordinaat
 * hierdoor kan het schip elke vorm hebben en zefls in delen liggen 
 * naam  string
 * geraakt boolean 
 * 
 * 
 * @author Gerard Doets
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
                    $eruit = TRUE;
                    $this->geraakt = TRUE;
                }
            }
            return $eruit;
        }

    }

