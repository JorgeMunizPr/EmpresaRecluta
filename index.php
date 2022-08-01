<!--1/julio/2022-->
<html>
    <head>
        <title>Inicio Sesion</title>
        <!--Conexion con archivo css para dar diseño al html-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <link rel="icon" href="css/brazil-flag.ico">
    </head>
    <!--Cuerpo de la pagina-->
<body class="vh-100 gradient-custom">
  <div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-4 text-center">

            <form class="mb-md-5 mt-md-4 pb-5" method = "post" action="LecturaSolicitud/inicioSesion.php">

              <h2 class="fw-bold mb-2 text-uppercase">Iniciar Sesion</h2>
              <p class="text-white-50 mb-5">Ingresa tu usuario y contraseña!</p>

              <div class="form-outline form-white mb-4">
                <input type="text" name="form_usuario" class="form-control form-control-lg" required>
                <label class="form-label" for="typeEmailX">Usuario</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="form_contra" class="form-control form-control-lg" required>
                <label class="form-label" for="typePasswordX">Contraseña</label>
              </div>

              <input class="btn btn-outline-light btn-lg px-5" value="Inicio Sesion" name="form_submit" type="submit"/>

            </form>

            <div>
              <p class="mb-0">No tienes cuenta?
                <a href="registro.php" class="text-white-50 fw-bold">Registrate</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<!----> 