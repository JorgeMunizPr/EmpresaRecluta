<?php
require_once('LecturaSolicitud/empresasSolicitud.php');
require_once('LecturaSolicitud/reclutasSolicitud.php');
if(isset($_POST['AgregaRecluta'])){
    $NombreRecluta = $_POST['NombreRecluta'];
    $IdEmpresa = $_POST['IdEmpresa'];
    $Telefono = $_POST['Telefono'];
    $Puesto = $_POST['Puesto'];
    $DatosRecluta = new reclutasDatos();
    $Resultado = $DatosRecluta->AgregaRecluta($NombreRecluta, $IdEmpresa, $Telefono, $Puesto);
    if($Resultado==1){
        $RespuestaAlta = 'Recluta registrado';
    }
    else if($Resultado==2){
        $RespuestaAlta = 'Ya existe una recluta registrado con ese nombre.';
    }
    tablaAltaRecluta($RespuestaAlta);
}
else{
    //Tabla para alta 
    tablaAltaRecluta();
}


function tablaAltaRecluta($RespuestaAlta=''){
    $DatosEmpresa = new empresaDatos();
    $aListaEmpresas = $DatosEmpresa->ListaEmpresas();
    $HtmlResultado='
    <table>
        <tr>
            <th>Nombre</th>
            <th>Empresa</th>
            <th>Telefono</th>
            <th>Puesto</th>
            <th></th>
        </tr>
        <form method="POST">
        <tr>
            <td><input type="text" maxlength=40 name="NombreRecluta" required></td>';
            $HtmlResultado=$HtmlResultado.'<td>
            <select name="IdEmpresa">';
            for ($i=0; $i < sizeof($aListaEmpresas); $i++) {  
                $IdEmpresaLista = $aListaEmpresas[$i]['id_empresa'];
                $NombreEmpresaLista = $aListaEmpresas[$i]['nom_empr'];
                $HtmlResultado=$HtmlResultado.'<option value="'.$IdEmpresaLista.'">'.$NombreEmpresaLista.'</option>';
            }
                
            '</select>
            </td>';
            $HtmlResultado=$HtmlResultado.
            '<td><input type="text" maxlength=10 name="Telefono" pattern="[0-9]{10}" required placeholder="10 digitos" required></td>
            <td><input type="text" maxlength=30 name="Puesto" required></td>
            <td><input type="submit" name="AgregaRecluta" value="Agregar +"></td>
        </tr>
        </form>
    </table>
    <div class="RespuestaAlmacena">'.$RespuestaAlta.'</div>';
    echo $HtmlResultado;
}
