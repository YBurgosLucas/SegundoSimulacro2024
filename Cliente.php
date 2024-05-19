<?php
     class Cliente{
        private $nombre;
        private $apellido;
        private $estaDadoDeBaja;
        private $tipoDocumento;
        private $nroDocumento;

        public function __construct($nom, $apell, $estado ,$tpDocumento, $numDocu){
            $this->nombre= $nom;
            $this->apellido=$apell;
            $this->estaDadoDeBaja=$estado;
            $this->tipoDocumento=$tpDocumento;
            $this->nroDocumento=$numDocu;
        }

       //metodos de acceso get
       public function getNombre(){
        return $this->nombre;
       } 
       public function getApellido(){
        return $this->apellido;
       }
       public function getEstaDadoDeBaja(){
        return $this->estaDadoDeBaja;
       }

       public function getTipoDocumento(){
        return $this->tipoDocumento;
       }
       public function getNroDocumento(){
        return $this->nroDocumento;
       }
       //metodos de acceso set
       public function setNombre($nom){
        $this->nombre=$nom;
       }
       public function setApellido($apell){
        $this->apellido=$apell;
       }
       public function setEstaDadoDeBaja($estado){
        $this->estaDadoDeBaja=$estado;
       }
       public function setTipoDocumento($tpDocumento){
        $this->tipoDocumento=$tpDocumento;
       }
       public function setNroDocumento($numDocu){
        $this->nroDocumento=$numDocu;
       }
       public function __toString(){
        $cad="Nombre y apellido:".$this->getNombre()." ".$this->getApellido().
             "\nEsta Dado De baja: ".$this->getEstaDadoDeBaja().
             "\nTipo de documento: ".$this->getTipoDocumento().
             "\nNro.Documento: ".$this->getNroDocumento();

        return $cad;
    }
}