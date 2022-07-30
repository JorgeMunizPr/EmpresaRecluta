<!--30/junio/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Reporte</title>
        <link rel="icon" href="css/brazil-flag.ico">
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <?php
            include('Componentes/Menu.php');
        ?>

        <div class="center Pag-Reportes">
            <div class="Secccion Contiene-Busqueda">
                <?php include('Vista/reporteBusqueda.php');?>
            </div>
            <div class="Secccion">
                <?php include('Vista/reporteResultado.php');?>
            </div>
        </div>
        
    </body>
</html>
<!---->