<?php

$GLOBALS['serverName'] = "localhost";
$GLOBALS['database'] = "id19301210_administracion";
$GLOBALS['userName']="id19301210_cris";
$GLOBALS['passUser']="r!pHV~vKjlTNu4S[";


if(isset($_POST['form_usuario']) && isset($_POST['form_contra'])){//Si busca inicio de sesion
    $Usuario = $_POST['form_usuario'];
    $ContraS = $_POST['form_contra'];
    validaInicioSesion($Usuario, $ContraS);
}
else if(isset($_POST['form_registro']) && isset($_POST['alta_contra']) && isset($_POST['alta_contra'])){//Si busca inicio de sesion
    $Nombre = $_POST['alta_nombre'];
    $Apellido = $_POST['alta_apellido'];
    $Usuario = $_POST['alta_usuario'];
    $ContraS = $_POST['alta_contra'];
    $ContraValida = $_POST['alta_contra_valida'];
    validaAltaUsuario($Nombre, $Apellido, $Usuario, $ContraS, $ContraValida);
}
else{
    header('Location: ../index.php?error=1');
}


//Valida los campos para iniciar sesion
function validaInicioSesion($Usuario, $ContraS){

    $serverName = $GLOBALS['serverName'];
    $database = $GLOBALS['database'];
    $userName=$GLOBALS['userName'];
    $passUser=$GLOBALS['passUser'];
    
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
//
function validaAltaUsuario($Nombre, $Apellido, $Usuario, $ContraS, $ContraValida){
    
    if($ContraS !== $ContraValida){
        header('Location: ../registro.php?error=1');
    }
    else if($Nombre!='' & $Apellido!='' & $Usuario!='' & $ContraS!='' & $ContraValida!=''){

        $serverName = $GLOBALS['serverName'];
        $database = $GLOBALS['database'];
        $userName=$GLOBALS['userName'];
        $passUser=$GLOBALS['passUser'];
        $conn = new PDO("mysql:host=$serverName;dbname=$database;charset=utf8mb4", $userName, $passUser);
        
        $Contrahash = password_hash($ContraS, PASSWORD_DEFAULT);

        $Query ="insert into usuarios (nombre, apellido, usuario, contrasena, creado)
        values('$Nombre', '$Apellido', '$Usuario', '$Contrahash', NOW()) ;";
        $resultusuario = $conn->query($Query);
        

        if($resultusuario){//si existe valor en la lecutura
            header('Location: ../index.php?exito=1');
        }
        else{
            header('Location: ../empresa.php?error=2');
        }
    }

    
}