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

       $sql = 'SELECT nom_empr, metas_mes FROM empresas';
       
       include('Componentes/Connect.php');
       ?>
        <div class="center">
            <table>
                <tr>
                    <th>Empresa</th>
                    <th>Metas x Mes</th>
                </tr>
                <tr>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    
                </tr>
                <?php while ($row =$q ->fetch()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nom_empr'])?></td>
                    <td><?php echo htmlspecialchars($row['metas_mes'])?></td>
                </tr>
                <?php endwhile; ?>
            </table>
            <button>Guardar</button>
        </div>
    </body>
</html>