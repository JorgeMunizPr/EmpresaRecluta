<?php 

$host = "localhost";
$user = "root";
$password = "fn-2187";
$db = "administracion";


$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$pdo = new PDO($dsn, $user, $password);

        $q = $pdo ->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
?>
