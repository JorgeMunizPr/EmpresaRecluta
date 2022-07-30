<?php

require_once('LecturaSolicitud/metasSolicitud.php');

$HtmlResultado='';
if(isset($_GET['nombre'])){
    $NombreBuscado = $_GET['nombre'];
    $cDatos = new metasDatos();
    $ResultadoBusqueda = $cDatos->BuscaMeta($NombreBuscado);
    if($ResultadoBusqueda=='Vacio'){
        $HtmlResultado = '<span class= "badge bg-primary">No se encontraron resultados</span>';
    }
    else{
        $HtmlResultado = $HtmlResultado.'
        <form method="post" action="metas.php">
            <table><tr><th>Empresa</th><th>Reclutas x Mes</th><th></th></tr>';
        for ($i=0; $i < sizeof($ResultadoBusqueda); $i++) { 
            $IdMeta = $ResultadoBusqueda[$i]['id_metas'];
            $NombreEmpresa = $ResultadoBusqueda[$i]['nom_empr'];
            $MetasMes = $ResultadoBusqueda[$i]['metas_mes'];
            

            $HtmlResultado = $HtmlResultado.'
            <tr>
                <td>'.$NombreEmpresa.'</td>
                <td><input class="form-control" type="text" maxlength=40 name="MetasMes" value="'.$MetasMes.'" required></td>
                <td>
                    <input class="btn btn-primary" type="hidden" name="IdMeta" value="'.$IdMeta.'">                    
                    <input class="btn btn-primary" type="submit" name="Guardar" value="Guardar">
                    <input class="btn btn-primary" type="submit" name="Borrar" value="Eliminar">
                </td>
            </tr>';
            
        }
        $HtmlResultado = $HtmlResultado.'</table></form>';
    }

    echo $HtmlResultado;

}
elseif(isset($_POST['Guardar'])){
    $IdMeta = $_POST['IdMeta'];
    $MetasMes = $_POST['MetasMes'];
    $DatosMeta = new metasDatos();
    $Resultado = $DatosMeta->ActualizaMeta($IdMeta, $MetasMes);
    if($Resultado==1){
        echo '<span class= "badge bg-success">Registro Actualizado</span>';
    }
}
elseif(isset($_POST['Borrar'])){
    $IdMeta = $_POST['IdMeta'];
    $DatosMeta = new metasDatos();
    $Resultado = $DatosMeta->EliminaMeta($IdMeta);
    if($Resultado==1){
        echo '<span class= "badge bg-danger">Se elimino el registro de la metas</span>';
    }
}
