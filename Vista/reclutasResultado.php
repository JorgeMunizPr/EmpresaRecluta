<?php

include('LecturaSolicitud/reclutasSolicitud.php');

$HtmlResultado='';
if(isset($_GET['nombre'])){
    $NombreBuscado = $_GET['nombre'];
    $DatosRecluta = new reclutasDatos();
    $ResultadoBusqueda = $DatosRecluta->BuscaRecluta($NombreBuscado);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = 'No se encontraron resultados';
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
                <td><input type="text" name="NombreRecluta" value="'.$NombreRecluta.'"></td>
                <td><input type="text" name="NombreEmpresa" value="'.$NombreEmpresa.'"></td>
                <td><input type="text" name="Telefono" value="'.$Telefono.'"></td>
                <td><input type="text" name="Puesto" value="'.$Puesto.'"></td>
                <td>
                    <input type="hidden" name="IdMeta" value="'.$IdRecluta.'">                    
                    <input type="submit" name="Guardar" value="Guardar">
                    <input type="submit" name="Borrar" value="Eliminar">
                </td>
            </tr>';
            
        }
        $HtmlResultado = $HtmlResultado.'</table></form>';
    }

}



echo $HtmlResultado;