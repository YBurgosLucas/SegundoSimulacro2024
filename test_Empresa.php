<?php
    include_once "Moto.php";
    include_once "MotoImportada.php";
    include_once "MotoNacionales.php";
    include_once "Venta.php";
    include_once "Cliente.php";
    include_once "Empresa.php";

    //$nom, $apell, $estado ,$tpDocumento, $numDocu
    $objCliente1=new Cliente("yamel" ,"burgos", false, "DNI", 1234);
    $objCliente2= new Cliente("juan" ,"gonzalez", false, "DNI", 4321);
    
    //$cdg, $precio, $anioF, $descrip, $porIA, $activo,$porcentajeDescuento
    $objMoto1=new MotoNacionales(11, 2230000, 2022, "Benelli Imperiale 400", 85, true,"nacional", 10);
    $objMoto2=new MotoNacionales(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, "nacional", 10);
    $objMoto3=new MotoNacionales(13, 999900, 2023, "Zanella Patagonian", 55, false, "nacional", 0);

    //$cdg, $precio, $anioF, $descrip, $porIA, $activo,$pais,$impuesto
    $objMoto4=new MotoImportada(14, 12499900, 2020, "PitBike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "importada", "Francia", 6244400);

    $colMotos=[$objMoto1, $objMoto2, $objMoto3, $objMoto4];
    $colVentaHechas=[];
    $colCliente=[$objCliente1,$objCliente2];
    $objEmpresa=new Empresa("Alta Gama", "Av.argentina 123", $colMotos , $colCliente, $colVentaHechas );

    echo "___________________resgistar venta______________________________\n";
    $colCodigo=[11,12,13,14];
    $precioFinal=$objEmpresa->registrarVenta($colCodigo, $objCliente2);
    if($precioFinal!=0){
        echo "venta hecha\n";
    }