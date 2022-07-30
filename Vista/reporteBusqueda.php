<?php
require_once('LecturaSolicitud/empresasSolicitud.php');

// if(isset($_POST['AgregaMeta'])){
//     $IdEmpresa = $_POST['IdEmpresa'];
//     $MetasMes = $_POST['MetasMes'];
//     $DatosMeta = new metasDatos();
//     $Resultado = $DatosMeta->AgregaMeta($IdEmpresa, $MetasMes);
//     if($Resultado==1){
//         $RespuestaAlta = '<span class= "badge bg-success">Meta registrada</span>';
//     }
//     else if($Resultado==2){
//         $RespuestaAlta = '<span class= "badge bg-primary">Ya existe una meta para esta empresa</span>';
//     }
//     tablaReporteBusqueda($RespuestaAlta);
// }
// else{
//     //Tabla para alta 
//     tablaReporteBusqueda();
// }

tablaReporteBusqueda();

function tablaReporteBusqueda($RespuestaAlta=''){
    $DatosEmpresa = new empresaDatos();
    $aListaEmpresas = $DatosEmpresa->ListaEmpresas();
    $HtmlResultado='
    
    <form method="get" class="Seccion-Reporte container">
    <div class="row">
        <div class="col d-flex align-items-center justify-content-end" for="nombre">Seleccione la Empresa:</div>
        <div class="col d-flex align-items-center">';
            $HtmlResultado=$HtmlResultado.'
            <select name="IdEmpresa" class="mr-1">';
            for ($i=0; $i < sizeof($aListaEmpresas); $i++) {  
                $IdEmpresaLista = $aListaEmpresas[$i]['id_empresa'];
                $NombreEmpresaLista = $aListaEmpresas[$i]['nom_empr'];
                $HtmlResultado=$HtmlResultado.'<option value="'.$IdEmpresaLista.'">'.$NombreEmpresaLista.'</option>';
            }
        $HtmlResultado=$HtmlResultado.
        '</div>
        <input class="btn btn-primary" type="submit" name="Generar" value="Generar Reporte">
        </div>
    </form>';
    echo $HtmlResultado;
}
