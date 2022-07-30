<?php
require_once('LecturaSolicitud/indicadoresSolicitud.php');
    //almacena el array para cada lista de valores
    $aListaEmpresa =array();
    $aListaMetas =array();
    $aListaReclutas =array();

    $DatosEmpresa = new indicadorDatos();
    $ResultadoIndicador = $DatosEmpresa->LecturaIndicadores();

    for ($i=0; $i < sizeof($ResultadoIndicador); $i++) { 
        $NombreEmpresa = $ResultadoIndicador[$i]['nom_empr'];
        $MetaMes = $ResultadoIndicador[$i]['meta_mes'];
        $NumReclutas = $ResultadoIndicador[$i]['num_reclutas'];
        //agrega valor por fila
        array_push($aListaEmpresa, $NombreEmpresa);
        array_push($aListaMetas, $MetaMes);
        array_push($aListaReclutas, $NumReclutas);
        
    }
    //Cambia array a listado delimitado por comas y comillas
    $sListaEmpresa = implode("','", $aListaEmpresa);
    $sListaEmpresa = "'".$sListaEmpresa."'";

    $sListaMetas = implode(",", $aListaMetas);
    // $sListaMetas = "'".$sListaMetas."'";

    $sListaReclutas = implode(",", $aListaReclutas);
    // $sListaReclutas = "'".$sListaReclutas."'";
    