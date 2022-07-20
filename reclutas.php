<!--2/julio/2022-->
<html>
    <head>
        <!--Titulo de la pestaña-->
        <title>Reclutas</title>
        <link rel="stylesheet" href="css/reclutas.css"><!--Conexion con archivo css para dar diseño al html-->
    </head>
    <!--Cuerpo de la pagina-->
    <body>
    <?php
       include('Componentes/Menu.php');

       $sql = 'SELECT nomb_reclu, id_empresa, telefono, puesto FROM reclutas';

       include('Componentes/Connect.php');
       ?>
        <div class="center">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Telefono</th>
                    <th>Puesto</th>
                </tr>
                <tr>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                <?php while ($row =$q ->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nomb_reclu'])?></td>
                    <td><?php echo htmlspecialchars($row['id_empresa'])?></td>
                    <td><?php echo htmlspecialchars($row['telefono'])?></td>
                    <td><?php echo htmlspecialchars($row['puesto']) ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            <button>Agregar+</button>
        </div>
    </body>
</html>
<!---->