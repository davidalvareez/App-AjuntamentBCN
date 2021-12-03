<?php
require_once 'config.php';
$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
    //echo "<script> alert('conexion establecida')</script>";
}catch(PDOException $e){
    echo $e->getMessage();
    echo "<script> alert('ERROR DE CONEXÍON')</script>";
}
?>