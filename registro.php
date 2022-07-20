<!--15/julio/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Registro</title>
        <link rel="stylesheet" href="css/registro.css"><!--Conexion con archivo css para dar diseño al html-->
    </head>
    <!--Cuerpo de la pagina-->
    <body>
        <a href="index.php">
            <p>Ya tienes cuenta? Inicia sesion AQUI¡</p>
        </a>
        <!--Division que contendra los elementos(Titulo y cuerpo) del formulario-->
        <!--Asignar class a los elementos sirve para identificarlos en el css y poder dar un diseño especifico-->
        <div class="center">
            <!--Encabezado-->
            <h1>Register Now</h1>
            <!--el tag "Form" es para indicar al html que dentro del tag hay un formulario-->
            <form  action="empresa.php"><!--Action es la accion que realizara el boton de "ingresar" una vez llenado los datos solicitados, en este caso seria redirigir a la pagina principal-->
                <!--Input de tipo "text" es el recuadro donde el usuario ingresara la informacion de usuario y contraseña-->
                <div class="txt_field">
                    <input type="text" placeholder="Usuario" required>
                </div>
                <div class="txt_field">
                    <input type="text" placeholder="Contraseña" required>
                </div>
                <!--Input tipo submit es el boton el cual seleccionara el usuario para enviar la informacion previamente ingresada al servidor-->
                <input type="submit" value="Ingresar">
            </form>
        </div>
    </body>
</html>