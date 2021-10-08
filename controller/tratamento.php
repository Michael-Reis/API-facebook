<?php
    class Tratamento{

        public function arrayParaString($propiedade, $separador){
            $str = implode($separador, $propiedade);
            return $str;
        }


    }



?> 