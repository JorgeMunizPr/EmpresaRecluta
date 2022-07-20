<!--1/julio/2022-->
<html>
    <head>
        <!--Titulo de la pestaña--> 
        <title>Login</title>
        <link rel="stylesheet" href="css/index.css"><!--Conexion con archivo css para dar diseño al html-->
    </head>
    <!--Cuerpo de la pagina-->
    <body>
     <!--Ingresamos el menu en la parte superior de la pagina-->
    <?php 
       $host = "localhost";
       $user = "root";
       $password = "fn-2187";
       $db = "administracion";
       
       $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
       $pdo = new PDO($dsn, $user, $password);

       if (isset($_POST['form_submit'])){
            $username = $_POST['form_user'];
            $UserPwd = $_POST['form_password'];

            try{
                $validation_query = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
                $validation_query->execute([$username, $UserPwd]);
                if($validation_query->rowCount()>0){
                    header("Location: empresa.php");
                }else{  
                    echo "User doesnt exist";
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
    ?>
    
        <a href="registro.php">
            <p>No tienes cuenta? Registrate aqui¡</p>
        </a>
        <!--Division que contendra los elementos(Titulo y cuerpo) del formulario-->
        <!--Asiganar class a los elementos sirve para identificarlos en el css y poder dar un diseño especifico-->
        <div class="center">
            <!--Encabezado-->
            <h1>Login</h1>
            <!--el tag "Form" es para indicar al html que dentro del tag hay un formulario-->
            <form  method = "post"><!--Action es la accion que realizara el boton de "ingresar" una vez llenado los datos solicitados, en este caso seria redirigir a la pagina principal-->
                <!--Input de tipo "text" es el recuadro donde el usuario ingresara la informacion de usuario y contraseña-->
                <div class="txt_field">
                    <input type="text" placeholder="Usuario" name="form_user" required>
                </div>
                <div class="txt_field">
                    <input type="password" placeholder="Contraseña" name="form_password" required>
                </div>
                <!--Input tipo submit es el boton el cual seleccionara el usuario para enviar la informacion previamente ingresada al servidor-->
                <input type="submit" value="Login" name="form_submit">
            </form>
        </div>
    </body>
</html>

<!----> 