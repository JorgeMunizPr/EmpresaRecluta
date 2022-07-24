<?php
require_once('validaSesion.php');

define("DB_SERVER", 'localhost');
define("DB_DATABASE", $_SESSION['database']);
define("DB_USUARIO", 'gestor');
define("DB_CONTRA", 'secreto');