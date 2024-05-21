<?php
include_once "MotoImportada.php";
include_once "MotoNacionales.php";
    
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
                     "Precio Final: $".$this->getPrecioFinal();
                return $cad;
            }
        /*Implementar el método retornarTotalVentaNacional() que retorna  la sumatoria del
         precio venta de cada una de las motos Nacionales vinculadas a la venta. */
        public function retornarTotalVentaNacional(){
            $precioFinal=0;
            
            foreach($this->getColeccionMotos() as $unaMoto){
                if( $unaMoto->getTipo() == "nacional" ){

                        $unaMoto->setActiva(true);
                        $precioFinal+=$unaMoto->darPrecioVenta();
                        $unaMoto->setActiva(false);
                }
            }

            return  $precioFinal;
        }
        /*Implementar el método retornarMotosImportadas() que retorna una colección de motos importadas vinculadas 
        a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía. */
        public function retornarMotosImportadas(){
            $colMotosImportada=[];
            foreach($this->getColeccionMotos() as  $unaMoto){
                if($unaMoto->getTipo() == "importada" ){
                    $i=count($colMotosImportada);
                    $colMotosImportada[$i]=$unaMoto;
                }
            }
            return $colMotosImportada;

        }

        public function incorporarMoto($objMoto){
            $nuevcolec=$this->getColeccionMotos();
            $precio=$objMoto->darPrecioVenta();

            if($precio!=0){
                 $i=count($nuevcolec);
                $nuevcolec[$i]=$objMoto;
                $incorporar=$precio+$this->getPrecioFinal();
                $this->setColeccionMotos($nuevcolec);
                $activa=false;
                $objMoto->setActiva($activa);
                $this->setPrecioFinal($incorporar);
            }
            else{
                $incorporar=-1;
            }
            return $incorporar;
              
        }
    }


