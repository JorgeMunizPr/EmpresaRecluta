<!--09/07/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Empresa</title>
        <link rel="stylesheet" href="css/empresa.css"><!--Conexion con archivo css para dar diseño al html-->
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <!--Ingresamos el menu en la parte superior de la pagina-->
       <?php 
       include('Componentes/Menu.php');

       $sql = 'SELECT nom_empr, vacant_disps, vacant_ocupadas FROM empresas';

       include('Componentes/Connect.php'); 
       ?>
        <div class="center">
            <!--Tabla de datos-->
            <table>
                <!--tr crea una fila de tabla-->
                <tr>
                    <!--th define la celda que funcionara como encabezado-->
                    <th>Empresa</th>
                    <th>Vacantes disponibles</th>
                    <th>Vacantes ocupadas</th>
                </tr>
                <form action="">
                <tr>
                    <!--td es una celda normal donde se almacenaran los datos-->
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="submit" name="brn-atc" value= "Agregar +"></td>
                </tr>
                </form>
                <?php while ($row =$q ->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nom_empr']) ?></td>
                    <td><?php echo htmlspecialchars($row['vacant_disps']) ?></td>
                    <td><?php echo htmlspecialchars($row['vacant_ocupadas']) ?></td>
                    <td></td>
                </tr>
                <?php endwhile; ?>
            </table>
            <!--Boton para mandar la informacion ingresada en la tabla, al servidor para asi registrarla-->
        </div>
    </body>
</html>