<?php
    include_once "Moto.php";
    class MotoNacionales extends Moto{
        private $porcentajeDescuento;

        public function __construct($cdg, $precio, $anioF, $descrip, $porIA, $activo, $porcentajeDescuento){
            parent::__construct($cdg, $precio, $anioF, $descrip, $porIA, $activo);
            $this->porcentajeDescuento=$porcentajeDescuento ?? 15;
        }
        public function getPorcentajeDescuento(){
            return $this->porcentajeDescuento;
        }
        public function setPorcentajeDescuento($porcentajeDescuento){
            $this->porcentajeDescuento=$porcentajeDescuento;
        }
        public function __toString(){
            $cad=parent::__toString();
            $cad.="\nPorcentaje Descuento:".$this->getPorcentajeDescuento()."%";
            return $cad;
        }
        public function darPrecioVenta(){
            $_venta=parent::darPrecioVenta();
            if($_venta!=-1){
                $_venta=$_venta-(($_venta*$this->getPorcentajeDescuento())/100);
            }
            return $_venta;
        }
    }