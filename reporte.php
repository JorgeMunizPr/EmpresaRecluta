<!--30/junio/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Menu</title>
        
    </head>
    <!--Cuerpo de la pagina-->
    <body>
    <?php
       include('Componentes/Menu.php');
       $sql = 'SELECT nom_empr FROM empresas';
       include('Componentes/Connect.php');
       ?>

        <div class="seleccion">
            <label for="">Seleccione empresa</label>
            <select name="" id="">
                <?php while ($row =$q ->fetch()): ?>
                    <option><?php echo htmlspecialchars($row['nom_empr'])?></option>
                <?php endwhile; ?>
            </select>
            <button>Generar reporte</button>
        </div>
        <div class="informacion">
            <P>La empresa tienen vacantes disponibles, este mes se reclutaron vacanntes, la meta es de reclutas</P>
        </div>
    </body>
</html>
<!---->