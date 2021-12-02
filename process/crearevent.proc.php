<?php
require_once '../services/conexion.php';
session_start();
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$capmax=$_POST['capmax'];
$path="../img/".$_FILES['img']['name']; 
//En caso que subio un archivo le añadimos los datos junto con el archivo
if (move_uploaded_file($_FILES['img']['tmp_name'],$path)) {
    $sentencia=$pdo->prepare("INSERT INTO tbl_eventos(titulo,descripcion,fecha,hora,img,capactual,capmax) VALUES ('{$titulo}','{$descripcion}','{$fecha}','{$hora}','{$path}',0,{$capmax})");
    $sentencia->execute();
    header("location:../view/listaeventosadmin.php");
}else{
    //En caso que no subio foto ponemos como nulo
    $sentencia=$pdo->prepare("INSERT INTO tbl_eventos(titulo,descripcion,fecha,hora,img,capactual,capmax) VALUES ('{$titulo}','{$descripcion}','{$fecha}','{$hora}',null,0,{$capmax})");
    $sentencia->execute();
    header("location:../view/listaeventosadmin.php");
}