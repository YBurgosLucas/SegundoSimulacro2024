<?php
    class Moto{
        private $codigo;
        private $costo;
        private $anioFabricacion;
        private $descripcion;
        private $porIncrAnual;
        private $activa;
        private $tipo;
    
        public function __construct($cdg, $precio, $anioF, $descrip, $porIA, $activo, $tipo){
            $this->codigo=$cdg;
            $this->costo=$precio;
            $this->anioFabricacion=$anioF;
            $this->descripcion=$descrip;
            $this->porIncrAnual=$porIA;
            $this->activa=$activo;
            $this->tipo=$tipo;   //no supe como resolverlo de otra forma 
        }
    
        //metodos de acceso get
        public function getCodigo(){
            return $this->codigo;
        }
        public function getCosto(){
            return $this->costo;
        }
        public function getAnioFabricacion(){
            return $this->anioFabricacion;
        }
        public function getDescripcion(){
            return $this->descripcion;
        }
        public function getPorIncrAnual(){
            return $this->porIncrAnual;
        }
        public function getActiva(){
            return $this->activa;
        }
        public function getTipo(){
            return $this->tipo;
        }
        // metodos de acceso set
        public function setCodigo($cdg){
            $this->codigo=$cdg;
        }
        public function setCosto($precio){
            $this->costo=$precio;
        }
        public function setAnioFabricacion($anioF){
            $this->anioFabricacion=$anioF;
        }
        public function setDescripcion($descrip){
            $this->descripcion=$descrip;
        }
        public function setPorIncrAnual($porIA){
            $this->porIncrAnual=$porIA;
        }
        public function setActiva($activo){
            $this->activa=$activo;
        }
        public function setTipo($tipo){
            $this->tipo=$tipo;
        }
    
        public function __tostring(){
            $cad="Codigo: ".$this->getCodigo().
                "\nCosto: $".$this->getCosto().
                "\nAnio Fabricacion: ".$this->getAnioFabricacion().
                "\nDescripcion: ".$this->getDescripcion().
                "\nPorcentaje Incremento Anual: ".$this->getPorIncrAnual()."%".
                "\nEstado Moto: ".$this->getActiva().
                "\nTipo:".$this->getTipo();
            
            return $cad;
        }
       /*.: Recordar :. el método darPrecioVenta inicialmente  calculaba el valor por el cual
        puede ser vendida una moto. Si la moto no se encuentra disponible para la venta 
        retorna un valor < 0. Si la moto está disponible para la venta, el método realiza el
        siguiente cálculo: 
            $_venta = $_compra + $_compra * (anio * por_inc_anual) 
        donde  $_compra:  es el costo de la moto.
        anio: cantidad de años transcurridos desde que se fabricó  la moto.
        por_inc_anual:  porcentaje de incremento anual de la moto.
                 */ 
        public function darPrecioVenta(){
            $_compra=$this->getCosto();
            $anio= 2024 - ($this->getAnioFabricacion());
            $por_inc_anual=$this->getPorIncrAnual()/100;
            $_venta=-1;
            if($this->getActiva()){
                $_venta = $_compra + $_compra * ($anio * $por_inc_anual);
            }
    
            return $_venta;
        }
    }