<?php

require_once('LecturaSolicitud/reporteSolicitud.php');

$HtmlResultado='';
if(isset($_GET['Generar'])){
    $IdEmpresa = $_GET['IdEmpresa'];
    $DatosRecluta = new reporteDatos();
    $ResultadoBusqueda = $DatosRecluta->BuscaInfoReporte($IdEmpresa);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = '<span class= "badge bg-primary">No se encontraron resultados</span>';
    }
    else{
        $NombreEmpresa = $ResultadoBusqueda[0]['nom_empr'];
        $MetaMes = $ResultadoBusqueda[0]['meta_mes'];
        $NumReclutas = $ResultadoBusqueda[0]['num_reclutas'];
        $VacDisponibles = $ResultadoBusqueda[0]['vacantes_disponibles'];
        $HtmlResultado = $HtmlResultado.'
        <div class="Secccion Contiene-Resultados">
            <div class="Titulo-Reporte">Reporte para la empresa '.$NombreEmpresa.'</div>
            <div class="Reporte">
                La empresa <span>'.$NombreEmpresa.'</span> tiene <span>'.$VacDisponibles.'</span> vacantes disponibles,
                este mes se reclutaron <span>'.$NumReclutas.'</span> vacantes, la meta es de <span>'.$MetaMes.'</span> reclutas.                    
            </div>
        </div>
        ';
    }
    echo $HtmlResultado;
}

