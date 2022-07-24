<html>
    <head>
        <title>Empresa</title>
        <link rel="stylesheet" href="css/empresa.css"><!--Conexion con archivo css para dar diseño al html-->
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
            <!--Boton para mandar la informacion ingresada en la tabla, al servidor para asi registrarla-->
        </div>
    </body>
</html>