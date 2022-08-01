<?php

require_once('LecturaSolicitud/reclutasSolicitud.php');

$HtmlResultado='';
if(isset($_GET['nombre'])){
    $NombreBuscado = $_GET['nombre'];
    $DatosRecluta = new reclutasDatos();
    $ResultadoBusqueda = $DatosRecluta->BuscaRecluta($NombreBuscado);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = '<span class= "badge bg-primary">No se encontraron resultados</span>';
    }
    else{
        $HtmlResultado = $HtmlResultado.'
        <form method="post" action="reclutas.php">
            <table><tr><th>Nombre</th><th>Empresa</th><th>Telefono</th><th>Puesto</th><th></th></tr>';
        for ($i=0; $i < sizeof($ResultadoBusqueda); $i++) { 
            $IdRecluta = $ResultadoBusqueda[$i]['id_reclutas'];
            $NombreRecluta = $ResultadoBusqueda[$i]['Nombre'];
            $NombreEmpresa = $ResultadoBusqueda[$i]['nom_empr'];
            $Telefono = $ResultadoBusqueda[$i]['telefono'];
            $Puesto = $ResultadoBusqueda[$i]['puesto'];

            $HtmlResultado = $HtmlResultado.'
            <tr>
                <td><input class="form-control" type="text" maxlength=40 name="NombreRecluta" value="'.$NombreRecluta.'" required></td>
                <td>'.$NombreEmpresa.'</td>
                <td><input type="tel" maxlength=10 name="Telefono" value="'.$Telefono.'" pattern="[0-9]{10}" required placeholder="10 digitos"></td>
                <td><input class="form-control" type="text" maxlength=30 name="Puesto" value="'.$Puesto.'" required></td>
                <td>
                    <input type="hidden" name="IdRecluta" value="'.$IdRecluta.'">                    
                    <input class="btn btn-primary" type="submit" name="Guardar" value="Modificar">
                    <input class="btn btn-primary" type="submit" name="Borrar" value="Eliminar">
                </td>
            </tr>';
            
        }
        $HtmlResultado = $HtmlResultado.'</table></form>';
    }
    echo $HtmlResultado;
}
elseif(isset($_POST['Guardar'])){
    $IdRecluta = $_POST['IdRecluta'];
    $NombreRecluta = $_POST['NombreRecluta'];
    $Telefono = $_POST['Telefono'];
    $Puesto = $_POST['Puesto'];
    $DatosMeta = new reclutasDatos();
    $Resultado = $DatosMeta->ActualizaRecluta($IdRecluta, $NombreRecluta, $Telefono, $Puesto);
    if($Resultado==1){
        echo '<span class= "badge bg-success">Registro Actualizado</span>';
    }
}
elseif(isset($_POST['Borrar'])){
    $IdRecluta = $_POST['IdRecluta'];
    $DatosMeta = new reclutasDatos();
    $Resultado = $DatosMeta->EliminaRecluta($IdRecluta);
    if($Resultado==1){
        echo '<span class= "badge bg-danger">Se elimino el registro del recluta</span>';
    }
}


