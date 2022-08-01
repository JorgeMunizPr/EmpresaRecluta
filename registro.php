<!--1/julio/2022-->
<html>
    <head>
        <title>Registro</title>
        <!--Conexion con archivo css para dar diseño al html-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="css/registro.css">
        <link rel="icon" href="css/brazil-flag.ico">
    </head>
    <!--Cuerpo de la pagina-->
<body class="vh-100 gradient-custom">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">

            <form class="mb-md-1 mt-md-1 pb-3" method = "post" action="LecturaSolicitud/inicioSesion.php">

              <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
              <p class="text-white-50 mb-3">Ingresa los datos solicitados</p>
            
              <div class="form-outline form-white mb-4">
                <input type="text" name="alta_nombre" class="form-control form-control-lg" placeholder="Nombre" required>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="alta_apellido" class="form-control form-control-lg" placeholder="Apellido" required>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="text" name="alta_usuario" class="form-control form-control-lg" placeholder="Nombre Usuario" required>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="alta_contra" class="form-control form-control-lg" placeholder="Contraseña" required>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="alta_contra_valida" class="form-control form-control-lg" placeholder="Repita Contraseña" required>
              </div>

              <input class="btn btn-outline-light btn-lg px-5" value="Enviar" name="form_registro" type="submit"/>

            </form>

            <div>
              <p class="mb-0">Ya tienes cuenta?
                <a href="index.php" class="text-white-50 fw-bold">Inicia Sesion</a>
              </p>
            </div>
            <?php
              if(isset($_GET['error']) && $_GET['error']==1){
                echo '<span class= "badge bg-primary">Las contraseñas no son iguales</span>';
              }
              else if(isset($_GET['error']) && $_GET['error']==2){
                echo '<span class= "badge bg-primary">No se logro registrar, intente nuevamente</span>';
              }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!----> 