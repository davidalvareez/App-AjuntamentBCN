<?php
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['evento'])) {
    include '../services/conexion.php';
    session_start();
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $dni=strtoupper($_POST['dni']);
    $evento=$_POST['evento'];
/*
    $consulta=$pdo->prepare("SELECT * FROM tbl_perfil WHERE email = :email and pass = :pass");  //preparas la consulta del elemento cuya existencia deseas validar   
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':pass', md5($pass));
    $consulta->execute();
    $validaruser=$consulta->fetchColumn();
        //El usuario NO ha sido registrado
        $consulta=$pdo->prepare("INSERT INTO tbl_perfil (nombre,apellido,email,pass,tipo_user) VALUES (:nombre, :apellido, :email, :pass, 1)");  //preparas la consulta del elemento cuya existencia deseas validar   
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellido', $apellido);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':pass', md5($pass));
        $consulta->execute();
        header("Location:../view/eventosapuntado.php"); */                           
}else {
    header("location:../view/incripcion.php");
}