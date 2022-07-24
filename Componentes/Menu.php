<!--10/07/2022-->
<?php 
$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);
$first_part = $components[sizeof($components)-1];
?>
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/principal.css">
<!--Division del menu de navegacion superior-->
<!--Asiganar class a los elementos sirve para identificarlos en el css y poder dar un diseño especifico-->
<div class="menu-bar">
    <!--ul es la lista para organizar las opciones del menu, las cuales seran el tag li-->
    <ul>
        <!--El tag a, sirve para asignar un link al elemento que este dentro de este, en este caso seria un link a las paginas reporte
        o reclutar, el cual se activara al dar click en algun li-->
        <a href="empresa.php">
            <!--Condicionales de php para dar diseño interactivo a el menu-->
            <li class="<?php if ($first_part=="empresa.php") {echo "active"; } else  {echo "noactive";}?>">Empresa</li>
        </a>
        <a href="reclutas.php">
            <li class="<?php if ($first_part=="reclutas.php") {echo "active"; } else  {echo "noactive";}?>">Reclutas</li>
        </a>
        <a href="metas.php">
            <li class="<?php if ($first_part=="metas.php") {echo "active"; } else  {echo "noactive";}?>">Metas</li>
        </a>
        <a href="indicadores.php">
            <li class="<?php if ($first_part=="indicadores.php") {echo "active"; } else  {echo "noactive";}?>">Indicadores</li>
        </a>
        <a href="reporte.php">
            <li class="<?php if ($first_part=="reporte.php") {echo "active"; } else  {echo "noactive";}?>">Reporte</li>
        </a>
        <a href="index.php">
            <li class="<?php if ($first_part=="index.php") {echo "active"; } else  {echo "noactive";}?>">Cerrar Sesion</li>
        </a>
    </ul>
</div>