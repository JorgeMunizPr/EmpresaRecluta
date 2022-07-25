<?php
require_once('LecturaSolicitud/empresasSolicitud.php');

if(isset($_GET['nombre'])){
    $HtmlResultado='';
    $NombreBuscado = $_GET['nombre'];
    $DatosEmpresa = new empresaDatos();
    $ResultadoBusqueda = $DatosEmpresa->BuscaEmpresa($NombreBuscado);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = '<span class= "badge bg-primary">No se encontraron resultados</span>';
    }
    else{
        $HtmlResultado = $HtmlResultado.'
        <form method="post" action="empresa.php">
            <table><tr><th>Empresa</th><th>Correo Electronico</th><th></th></tr>';
        for ($i=0; $i < sizeof($ResultadoBusqueda); $i++) { 
            $IdEmpresa = $ResultadoBusqueda[$i]['id_empresa'];
            $NombreEmpresa = $ResultadoBusqueda[$i]['Nombre'];
            $Email = $ResultadoBusqueda[$i]['email'];

            $HtmlResultado = $HtmlResultado.'
            <tr>
                <td><input class="form-control" type="text" maxlength=45 name="NombreEmpresa" value="'.$NombreEmpresa.'" required></td>
                <td><input class="form-control" type="text" maxlength=50 name="Email" value="'.$Email.'" required></td>
                <td>
                    <input class="btn btn-primary" type="hidden" name="IdEmpresa" value="'.$IdEmpresa.'">                    
                    <input class="btn btn-primary" type="submit" name="Guardar" value="Guardar">
                    <input class="btn btn-primary" type="submit" name="Borrar" value="Eliminar">
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
        echo '<span class= "badge bg-success">Registro Actualizado</span>';
    }
}
else if(isset($_POST['Borrar'])){
    $IdEmpresa = $_POST['IdEmpresa'];
    $DatosEmpresa = new empresaDatos();
    $Resultado = $DatosEmpresa->EliminaEmpresa($IdEmpresa);
    if($Resultado==1){
        echo '<span class= "badge bg-danger">Se elimino el registro de la empresa, sus reclutas y metas</span>';
    }
}

