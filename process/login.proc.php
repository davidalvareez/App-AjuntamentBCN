<?php
require_once '../services/conexion.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
    session_start();
    require_once '../services/connection.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_perfil WHERE email='$email' and contraseña=MD5('{$password}')");
    $stmt->execute();
    $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
            if (!empty($comprobacion)) {
                foreach ($comprobacion as $row) {
                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['tipo_user']=$row['tipo'];
                 }   
                //print_r($comprobacion);
                $_SESSION['email']=$email;
                header("location:../view/listaeventos.php");
            }else {
                header("location: ../view/login.php");
            }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.php");
}