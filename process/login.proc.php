<?php
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    require_once '../services/conexion.php';
    session_start();
    $email=$_POST['username'];
    $password=$_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM tbl_admin WHERE email = :email and pass = :pass");
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':pass', md5($password));
    $stmt->execute();
    $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
            if (!empty($comprobacion)) {
                foreach ($comprobacion as $row) {
                    $_SESSION['username']=$row['nombre'];
                    $_SESSION['tipo_user']=2;
                 }   
                //print_r($comprobacion);
                $_SESSION['email']=$email;
                header("location:../view/listaeventosadmin.php");
            }else {
                header("location: ../view/login.php");
            }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}else{
    header("location: ../view/login.php");
}