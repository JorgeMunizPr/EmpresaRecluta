<?php
require_once('LecturaSolicitud/empresasSolicitud.php');
require_once('LecturaSolicitud/metasSolicitud.php');
if(isset($_POST['AgregaMeta'])){
    $IdEmpresa = $_POST['IdEmpresa'];
    $MetasMes = $_POST['MetasMes'];
    $DatosMeta = new metasDatos();
    $Resultado = $DatosMeta->AgregaMeta($IdEmpresa, $MetasMes);
    if($Resultado==1){
        $RespuestaAlta = 'Meta registrada';
    }
    else if($Resultado==2){
        $RespuestaAlta = 'Ya existe una meta para esta empresa';
    }
    tablaAltaMeta($RespuestaAlta);
}
else{
    //Tabla para alta 
    tablaAltaMeta();
}


function tablaAltaMeta($RespuestaAlta=''){
    $DatosEmpresa = new empresaDatos();
    $aListaEmpresas = $DatosEmpresa->ListaEmpresas();
    $HtmlResultado='
    <table>
        <tr>
            <th>Empresa</th>
            <th>Metas x Mes</th>
            <th></th>
        </tr>
        <form method="POST">
            <tr>';
                $HtmlResultado=$HtmlResultado.'<td>
                <select name="IdEmpresa">';
                for ($i=0; $i < sizeof($aListaEmpresas); $i++) {  
                    $IdEmpresaLista = $aListaEmpresas[$i]['id_empresa'];
                    $NombreEmpresaLista = $aListaEmpresas[$i]['nom_empr'];
                    $HtmlResultado=$HtmlResultado.'<option value="'.$IdEmpresaLista.'">'.$NombreEmpresaLista.'</option>';
                }
                $HtmlResultado=$HtmlResultado.
                '</select>
                </td>
                <td><input type="text" maxlength=40 name="MetasMes"></td>
                <td><input type="submit" name="AgregaMeta" value="Agregar +"></td>
            </tr>
        </form>
    </table>
    <div class="RespuestaAlmacena">'.$RespuestaAlta.'</div>';
    echo $HtmlResultado;
}
