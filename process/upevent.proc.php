<?php
require_once '../services/conexion.php';
session_start();
if(empty($_POST['id'])){
    header("location: ../view/listaeventosadmin.php");
}else{
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $capmax=$_POST['capmax'];
    $id=$_POST['id'];
    $path="../img/".$_FILES['img']['name']; 
    if (move_uploaded_file($_FILES['img']['tmp_name'],$path)) {
        $sentencia=$pdo->prepare("UPDATE tbl_eventos SET titulo='{$titulo}',descripcion='{$descripcion}',fecha='{$fecha}',hora='{$hora}',capmax=$capmax,img='{$path}'WHERE id=$id");
        $sentencia->execute();
        header("location:../view/listaeventosadmin.php");
    }else{
        $sentencia=$pdo->prepare("UPDATE tbl_eventos SET titulo='{$titulo}',descripcion='{$descripcion}',fecha='{$fecha}',hora='{$hora}',capmax=$capmax WHERE id=$id");
        $sentencia->execute();
        header("location:../view/listaeventosadmin.php");
    }
}