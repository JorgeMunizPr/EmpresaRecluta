<?php

include('LecturaSolicitud/empresasSolicitud.php');


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
        <form method="post" action="empresa.php">
            <table><tr><th>Empresa</th><th>Correo Electronico</th><th></th></tr>';
        for ($i=0; $i < sizeof($ResultadoBusqueda); $i++) { 
            $IdEmpresa = $ResultadoBusqueda[$i]['id_empresa'];
            $NombreEmpresa = $ResultadoBusqueda[$i]['Nombre'];
            $Email = $ResultadoBusqueda[$i]['email'];

            $HtmlResultado = $HtmlResultado.'
            <tr>
                <td><input type="text" name="NombreEmpresa" value="'.$NombreEmpresa.'"></td>
                <td><input type="text" name="Email" value="'.$Email.'"></td>
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
elseif(isset($_POST['Guardar'])){
    echo 'Guardar';
}
elseif(isset($_POST['Borrar'])){
    echo 'Borrar';
}



