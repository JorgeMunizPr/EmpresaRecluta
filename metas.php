<!--10/07/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Metas</title>
        <link rel="icon" href="css/brazil-flag.ico">
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <?php
            include('Componentes/Menu.php');
        ?>
        <div class="center">
            <div class="Secccion Contiene-Nuevo">
                <?php include('Vista/metaAlta.php');?>
            </div>
            <div class="Secccion Contiene-Busqueda">
                <?php include('Componentes/busqueda.php');?>
            </div>
            <div class="Secccion Contiene-Resultados">
                <?php include('Vista/metasResultado.php');?>
            </div>
            <!--Boton para mandar la informacion ingresada en la tabla, al servidor para asi registrarla-->
        </div>
    </body>
</html>