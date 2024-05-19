<?php
    include_once "Moto.php";
    include_once "MotoImportada.php";
    include_once "MotoNacionales.php";
    include_once "Venta.php";
    include_once "Cliente.php";
    include_once "Empresa.php";

    class Empresa{
        private $denominacion;
        private $direccion;
        private $coleccionMotos;
        private $coleccionClientes;
        private $coleccionVentasRealizadas;

        public function __construct($categoria, $adress, $colecMotos,$colecClientes , $colecVentasHechas ){
            $this->denominacion=$categoria;
            $this->direccion=$adress;
            $this->coleccionMotos=$colecMotos;
            $this->coleccionClientes=$colecClientes;
            $this->coleccionVentasRealizadas=$colecVentasHechas;
        }
        //metodos de acceso
        public function getDenominacion(){
            return $this->denominacion;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getColeccionMotos(){
            return $this->coleccionMotos;
        }
        public function getColeccionClientes(){
            return $this->coleccionClientes;
        }

        public function getColeccionVentasRealizadas(){
            return $this->coleccionVentasRealizadas;
        }
        //metodos de acceso set
        public function setDenominacion($categoria){
             $this->denominacion=$categoria;
        }
        public function setDireccion($adress){
            $this->direccion=$adress;
        }

        public function setColeccionMotos($colecMotos){
            $this->coleccionMotos=$colecMotos;
        }
        public function setColeccionClientes($colecClientes){
            $this->coleccionClientes=$colecClientes;
        }
        public function setColeccionVentasRealizadas($colecVentasHechas){
             $this->coleccionVentasRealizadas=$colecVentasHechas;
        }
 //metodos para concatenar las colecciones
        public function colClientes(){
            $cad="";
            foreach($this->getColeccionClientes() as $clientes){
                $cad.=$clientes."\n";
            }
            return $cad;
        }
        public function colMotos(){
            $cad="";
            foreach($this->getColeccionMotos() as $motos){
                $cad.=$motos."\n";
            }
            return $cad;
        }
        public function colVentasHechas(){
            $cad="";
            foreach($this->getColeccionVentasRealizadas() as $ventas){
                $cad.=$ventas."\n";
            }
            return $cad;
        }

        public function __toString(){
            $cadena="Denominacion:". $this->getDenominacion().
                    "\nDireccion: ".$this->getDireccion().
                    "\nCOLECCION DE MOTOS:\n".$this->colMotos()."\n".
                    "\nCOLECCION DE CLIENTES:\n".$this->colClientes() .
                    "\nCOLECCION DE VENTAS HECHAS:\n".$this->colVentasHechas();
            return $cadena;
        }

        public function retornarMoto($codigoMoto){
            $objMoto=null;
            $colMoto=$this->getColeccionMotos();
            $i=0;
            while($i<count($colMoto) && $objMoto==null){
                if($colMoto[$i]->getCodigo() == $codigoMoto){
                    $objMoto=$colMoto[$i];
                }
                $i++;
            }
            return $objMoto;
        }


        public function registrarVenta($colCodigos, $objCliente){
            $encontrado=false;
            $ventas=[];
            $colecMotos=[]; 
            $importeFinal=0;
            $numero=1;
            $fecha=date("y-m-d");

            if(count($colCodigos)>0){
                if($objCliente->getEstaDadoDeBaja() == false){
                  foreach ($colCodigos as $unCodigo) {
                    $objMoto=$this->retornarMoto($unCodigo);
                    if($objMoto!= null  ){
                         $nuevaVenta=new Venta($numero, $fecha, $objCliente, $colecMotos, 0);
                       if( $nuevaVenta->incorporarMoto($objMoto)){
                           $i=count($ventas);
                           $ventas[$i]=$nuevaVenta;
                           $importeFinal+=$nuevaVenta->getPrecioFinal();
                           $this->setColeccionVentasRealizadas($ventas);
                       }
                           
                    }
                    
                  }  
                }
                
            }
                    
           return $importeFinal;     
        }
 
            
        
        /*Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa y retorna
         el importe total de ventas Nacionales realizadas por la empresa. */
        public  function  informarSumaVentasNacionales(){
            $precioFinal=0;
            foreach ($this->getColeccionVentasRealizadas() as $unaVenta){
                $precioFinal+=$unaVenta->retornarTotalVentaNacional();
            }
            return $precioFinal;
        }

        /*Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y retorna una
        colección de ventas de motos  importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada. */
        public function informarVentasImportadas(){
            $coleVentaImportadas=[];

            foreach($this->getColeccionVentasRealizadas() as $venta){

                $i=count($coleVentaImportadas);
                $coleVentaImportadas[$i]=$venta->retornarMotosImportadas();
            }
            return $coleVentaImportadas;
        }
    }