<?php
    //falta hacer que si estan vacios los campos no haga todo esto
    include '../services/conexion.php';
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $consulta=$pdo->prepare("SELECT * FROM tbl_empleado WHERE email_emp = :email and pass_emp = :pass");  //preparas la consulta del elemento cuya existencia deseas validar   
    $consulta->bindParam(':email', $user);
    $consulta->bindParam(':pass', $pass);
    $consulta->execute();
    $validaruser=$consulta->fetchColumn();

    if ($validaruser) {
        //El usuario ya ha sido registrado
        //enviar msg en el login o en el diciendo que esta actualizado
        header("Location:../view/login.php");
    }else {
        //El usuario NO ha sido registrado
        //Insertar el usuario en la base de datos y redirigir a la pagina donde se ven eventos
        header("Location:../view/listaeventos.php");
    }                              