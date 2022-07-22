<?php

include('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class empresaDatos{
  //Lectura para busqueda de empresas
  public function BuscaEmpresa($NombreBuscado){
    $LecBD = new lecturaBD();
    
    if ( $_SESSION['database'] ) {//si existe sesion
        $oResultado = $LecBD->buscarEmpresaBD($NombreBuscado);
        if($oResultado){
          return $oResultado;
        }
    }
    else{//si no existe sesion
      session_name("sesionReclutas");
      session_start();

      session_unset();

      session_destroy();
    }
  }
}