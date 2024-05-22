<?php
include_once "Moto.php";
    class MotoImportada extends Moto{
        private $pais;
        private $impuesto;

        public function __construct($cdg, $precio, $anioF, $descrip, $porIA, $activo, $pais, $impuesto){
            parent::__construct($cdg, $precio, $anioF, $descrip, $porIA, $activo);
            $this->pais=$pais;
            $this->impuesto=$impuesto;

        }
        public  function getPais(){
            return $this->pais;
        }
        public function getImpuesto(){
            return $this->impuesto;
        }
        public function setPais($pais){
            $this->pais=$pais;
        }
        public function setImpuesto($impuesto){
            $this->impuesto=$impuesto;
        }

        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nPais importado:".$this->getPais().
                  "\nImpuesto:".$this->getImpuesto();
            return $cad;
        }

        public function darPrecioVenta(){
            $_venta=parent::darPrecioVenta();
            $precioFinal=$_venta+$this->getImpuesto();
            return $precioFinal;
        }
    }