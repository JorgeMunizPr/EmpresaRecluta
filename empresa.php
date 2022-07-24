<html>
    <head>
        <title>Empresa</title>
    </head>
    <body>
       <?php 
       include('Componentes/Menu.php');
       ?>
        <div class="center">
            <div class="Secccion Contiene-Nuevo">
                <?php include('Vista/empresaAlta.php');?>
            </div>
            <div class="Secccion Contiene-Busqueda">
                <?php include('Componentes/busqueda.php');?>
            </div>
            <div class="Secccion Contiene-Resultados">
                <?php include('Vista/empresaResultado.php');?>
            </div>
        </div>
    </body>
</html>