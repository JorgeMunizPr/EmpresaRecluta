<?php
require_once('LecturaSolicitud/empresasSolicitud.php');
if(isset($_POST['AgregaEmpresa'])){
    $NombreEmpresa = $_POST['NombreEmpresa'];
    $Email = $_POST['Email'];
    $DatosEmpresa = new empresaDatos();
    $Resultado = $DatosEmpresa->AgregaEmpresa($NombreEmpresa, $Email);
    if($Resultado==1){
        $RespuestaAlta = 'Empresa registrada';
    }
    else if($Resultado==2){
        $RespuestaAlta = 'Ya existe una empresa registrada con ese nombre';
    }
    tablaAltaEmpresa($RespuestaAlta);
}
else{
    //Tabla para alta 
    tablaAltaEmpresa();
}


function tablaAltaEmpresa($RespuestaAlta=''){
    $HtmlResultado='
    <table>
        <tr>
            <th>Empresa</th>
            <th>Correo Electronico</th>
            <th></th>
        </tr>
        <form method="POST">
        <tr>
            <td><input type="text" maxlength=45 name="NombreEmpresa" required></td>
            <td><input type="text" maxlength=50 name="Email" required></td>
            <td><input type="submit" name="AgregaEmpresa" value="Agregar +"></td>
        </tr>
        </form>
    </table>
    <div class="RespuestaAlmacena">'.$RespuestaAlta.'</div>';
    echo $HtmlResultado;
}
