<?php
    include_once "Moto.php";
    class MotoNacionales extends Moto{
        private $porcentajeDescuento;

        public function __construct($cdg, $precio, $anioF, $descrip, $porIA, $activo, $tipo, $porcentajeDescuento){
            parent::__construct($cdg, $precio, $anioF, $descrip, $porIA, $activo, $tipo);
            $this->porcentajeDescuento=$porcentajeDescuento;
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
                $_precioVenta=$_venta-(($_venta*$this->getPorcentajeDescuento())/100);
            }
            else{
                $_precioVenta=$_venta;
            }
            return $_precioVenta;
        }
    }