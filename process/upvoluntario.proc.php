<?php
require_once '../services/conexion.php';
session_start();
if(empty($_POST['dni'])){
    echo "sexo";
    die;
    header("location: ../view/vistaparticipantes.php");
}else{
    $dni=$_POST['dni'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $sentencia=$pdo->prepare("UPDATE tbl_voluntario SET nombre='{$nombre}',apellido='{$apellido}',telefono='{$telefono}' WHERE dni='{$dni}'");
    $sentencia->execute();
    header("location:../view/vistaparticipantes.php");
}
