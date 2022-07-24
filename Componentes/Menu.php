<!--10/07/2022-->
<!--Algoritmo para que php sepa en que seccion del menu estamos-->
<?php 
$directoryURI = $_SERVER['REQUEST_URI'];

$path = parse_url($directoryURI, PHP_URL_PATH);

$components = explode('/', $path);
$first_part = $components[sizeof($components)-1];

?>
<head>
<!--Conexion con archivo css para dar diseño al html-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/principal.css">
</head>
<!--<link rel="stylesheet" href="css/menu.css">--><!--Conexion con archivo css para dar diseño al html-->
<!--Division del menu de navegacion superior-->
<!--Asiganar class a los elementos sirve para identificarlos en el css y poder dar un diseño especifico-->
<nav class="navbar-expand-lg bg-secondary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <a class="nav-link px-4 <?php if ($first_part=="empresa.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="empresa.php">
          <li class="nav-item text-light">Empresa</li>
        </a>
        <a class="nav-link px-4 <?php if ($first_part=="reclutas.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="reclutas.php">
          <li class="nav-item text-light">Reclutas</li>
        </a>
        <a class="nav-link px-4 <?php if ($first_part=="metas.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="metas.php">
          <li class="nav-item text-light">Metas</li>
        </a>
        <a class="nav-link px-4 <?php if ($first_part=="indicadores.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="indicadores.php">
          <li class="nav-item text-light">Indicadores</li>
        </a>
        <a class="nav-link px-4 <?php if ($first_part=="reporte.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="reporte.php">
          <li class="nav-item text-light">Reporte</li>
        </a>
        <a class="nav-link px-4 <?php if ($first_part=="index.php") {echo "bg-dark"; } else  {echo "noactive";}?>" href="index.php">
          <li class="nav-item text-light">Cerrar Sesion</li>
        </a>
      </ul>
    </div>
  </div>
</nav>
<!---->