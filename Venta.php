<?php

    
        class Venta{
            private $numero;
            private $fecha;
            private $objCliente;
            private $coleccionMotos;
            private $precioFinal;
    
            public function __construct($num, $date, $refCliente, $colecMotos, $costoFinal){
                $this->numero= $num;
                $this->fecha=$date;
                $this->objCliente=$refCliente;
                $this->coleccionMotos=$colecMotos;
                $this->precioFinal=$costoFinal;
            }
    
            //metodos de acceso get
            public function getNumero(){
                return $this->numero;
            }
            public function getFecha(){
                return $this->fecha;
            }
            public function getObjCliente(){
                return $this->objCliente;
            }
            public function getColeccionMotos(){
                return $this->coleccionMotos;
            }
            public function getPrecioFinal(){
                return $this->precioFinal;
            }
            //metodos de acceso set
            public function setNumero($num){
                $this->numero=$num;
            }
            public function setFecha($date){
                $this->fecha=$date;
            }
            public function setObjCliente($refCliente){
                $this->objCliente=$refCliente;
            }
            public function setColeccionMotos($colecMotos){
                $this->coleccionMotos=$colecMotos;
            }
            public function setPrecioFinal($costoFinal){
                $this->precioFinal=$costoFinal;
            }
    
            public function colMotos(){
                $cadena="";
                foreach($this->getColeccionMotos()as $moto){
                    $cadena.=$moto."\n";
                }
                return $cadena;
            }
    
            public function __toString(){
                $cad="numero: ".$this->getNumero().
                     "\nFecha: ".$this->getFecha().
                     "\nReferenciaCliente:".$this->getObjCliente().
                     "\nColeccion de moto: ".$this->colMotos().
                     "\nPrecio Final: $".$this->getPrecioFinal();
                return $cad;
            }
        /*Implementar el método retornarTotalVentaNacional() que retorna  la sumatoria del
         precio venta de cada una de las motos Nacionales vinculadas a la venta. */
        public function retornarTotalVentaNacional(){
            $precioFinal=0;
            $colMoto=$this->getColeccionMotos();
            foreach($colMoto as $unaMoto){
                if( $unaMoto instanceof MotoNacionales ){
                        $precioFinal+=$unaMoto->darPrecioVenta();
                }
            }

            return  $precioFinal;
        }
        /*Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas 
        a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía. */
        public function retornarMotosImportadas(){
            $colMotosImportada=[];
            $colMoto=$this->getColeccionMotos();
            foreach($colMoto as  $unaMoto){
                if($unaMoto instanceof MotoImportada ){
                    $colMotosImportada[]=$unaMoto;
                }
            }
            return $colMotosImportada;

        }

        public function incorporarMoto($objMoto){
            $nuevcolec=$this->getColeccionMotos();
            if($objMoto->getActiva() ){
                $i=count($nuevcolec);
                $nuevcolec[$i]=$objMoto;
                $this->setColeccionMotos($nuevcolec);
                $precioFinal=$this->getPrecioFinal();
                $precio=$objMoto->darPrecioVenta();
                $precioFinal+=$precio;
                $this->setPrecioFinal($precioFinal);
                $respuesta=true;
            } 
            else{
                $respuesta=false;
            }
            return $respuesta;
        }
    }


