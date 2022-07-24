<?php

if(isset($_POST['form_usuario']) && isset($_POST['form_contra'])){//Si busca inicio de sesion
    $Usuario = $_POST['form_usuario'];
    $ContraS = $_POST['form_contra'];
    validaInicioSesion($Usuario, $ContraS);
}
else{
    header('Location: ../index.php?error=1');
}


//Valida los campos para iniciar sesion
function validaInicioSesion($Usuario, $ContraS){

    $serverName = "localhost";
    $database = "administracion";
    $userName="gestor";
    $passUser="secreto";
    
    $conn = new PDO("mysql:host=$serverName;dbname=$database;charset=utf8mb4", $userName, $passUser);
    
    $Query ="select id_usuario, contrasena from usuarios where usuario='$Usuario';";
    $resultusuario = $conn->query($Query);
    $InfoUsuario = $resultusuario->fetch(PDO::FETCH_ASSOC);

    $IdUsuario = $InfoUsuario['id_usuario'];
    $ContraHash = $InfoUsuario['contrasena'];
    $Validacion = password_verify($ContraS, $ContraHash);

    if(isset($IdUsuario) && $Validacion){//si existe valor en la lecutura
        $nombreSession = "sesionReclutas";
        session_name($nombreSession);
        session_start();
        
        $_SESSION['idusuario'] = $IdUsuario;
        $_SESSION['database'] = $database;//valores de sesion
        
        header('Location: ../empresa.php');//mueve a pagina de inicio del app
    }
    else{
        header('Location: ../index.php?error=1');
    }
}