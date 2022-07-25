<?php
error_reporting(0);
require_once('lecturaSesion.php');

if(!isset($_SESSION['database'])){//Si no existe sesion mueve a login
    header('Location: http://localhost/SuperProf/Cristina_Brasil/EmpresaRecluta/');
}