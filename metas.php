<!--10/07/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Metas</title>
        <link rel="stylesheet" href="css/metas.css"><!--Conexion con archivo css para dar diseño al html-->
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <?php
            include('Componentes/Menu.php');
        ?>
        <div class="center">
            <div class="Secccion Contiene-Nuevo">
                <table>
                    <tr>
                        <th>Empresa</th>
                        <th>Metas x Mes</th>
                        <th></th>
                    </tr>
                    <form action="">
                        <tr>
                            <td><input type="text"></td>
                            <td><input type="text"></td>
                            <td><input type="submit" name="brn-atc" value="Agregar +"></td>
                        </tr>
                    </form>
                </table>
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