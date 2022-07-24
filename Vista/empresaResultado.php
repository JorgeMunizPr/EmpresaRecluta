<?php
require_once('LecturaSolicitud/empresasSolicitud.php');

if(isset($_GET['nombre'])){
    $HtmlResultado='';
    $NombreBuscado = $_GET['nombre'];
    $DatosEmpresa = new empresaDatos();
    $ResultadoBusqueda = $DatosEmpresa->BuscaEmpresa($NombreBuscado);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = 'No se encontraron resultados';
    }
    else{
        $HtmlResultado = $HtmlResultado.'
        <form method="post">
            <table><tr><th>Empresa</th><th>Correo Electronico</th><th></th></tr>';
        for ($i=0; $i < sizeof($ResultadoBusqueda); $i++) { 
            $IdEmpresa = $ResultadoBusqueda[$i]['id_empresa'];
            $NombreEmpresa = $ResultadoBusqueda[$i]['Nombre'];
            $Email = $ResultadoBusqueda[$i]['email'];

            $HtmlResultado = $HtmlResultado.'
            <tr>
                <td><input type="text" maxlength=45 name="NombreEmpresa" value="'.$NombreEmpresa.'" required></td>
                <td><input type="text" maxlength=50 name="Email" value="'.$Email.'" required></td>
                <td>
                    <input type="hidden" name="IdEmpresa" value="'.$IdEmpresa.'">                    
                    <input type="submit" name="Guardar" value="Guardar">
                    <input type="submit" name="Borrar" value="Eliminar">
                </td>
            </tr>';
            
        }
        $HtmlResultado = $HtmlResultado.'</table></form>';
    }
    echo $HtmlResultado;

}
else if(isset($_POST['Guardar'])){
    $IdEmpresa = $_POST['IdEmpresa'];
    $NombreEmpresa = $_POST['NombreEmpresa'];
    $Email = $_POST['Email'];
    $DatosEmpresa = new empresaDatos();
    $Resultado = $DatosEmpresa->ActualizaEmpresa($IdEmpresa, $NombreEmpresa, $Email);
    if($Resultado==1){
        echo 'Registro Actualizado';
    }
}
else if(isset($_POST['Borrar'])){
    $IdEmpresa = $_POST['IdEmpresa'];
    $DatosEmpresa = new empresaDatos();
    $Resultado = $DatosEmpresa->EliminaEmpresa($IdEmpresa);
    if($Resultado==1){
        echo 'Se elimino el registro de la empresa, sus reclutas y metas';
    }
}

