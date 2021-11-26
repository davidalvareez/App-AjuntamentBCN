<?php
    if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['evento'])) {
    include '../services/conexion.php';
    session_start();
    $nombre=$_POST['nombre'];
    $_SESSION['nombre']=$nombre;
    $apellido=$_POST['apellido'];
    $_SESSION['apellido']=$apellido;
    $telefono=$_POST['telefono'];
    $_SESSION['telefono']=$telefono;
    $dni=strtoupper($_POST['dni']);
    $_SESSION['dni']=$dni;
    $evento=$_POST['evento'];
    //Comprobamos si el DNI existe
    $consulta=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni = :dni");   
    $consulta->bindParam(':dni', $dni);
    $consulta->execute();
    $validardni=$consulta->fetchAll(PDO::FETCH_ASSOC);
    if (empty($validardni)) {
        echo "No existe dni";
        //Insertar voluntario a base de datos
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $pdo->exec("INSERT INTO tbl_voluntario (dni, nombre, apellido, telefono) values ('{$dni}','{$nombre}','{$apellido}','{$telefono}')");
            $pdo->exec("INSERT INTO tbl_registroevento (dni,id_evento) values ('{$dni}',$evento)");
            $pdo->exec("UPDATE tbl_eventos SET capactual=capactual+1 WHERE id=$evento");
            $pdo->commit();
            header("Location:../view/eventosapuntado.php");
        }
        catch(Exception $e){
            $pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }else{
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $pdo->exec("INSERT INTO tbl_registroevento (dni,id_evento) values ('{$dni}',$evento)");
            $pdo->exec("UPDATE tbl_eventos SET capactual=capactual+1 WHERE id=$evento");
            $pdo->commit();
            header("Location:../view/eventosapuntado.php");
        }
        catch(Exception $e){
            $pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
        //El dni al ser unico solo le añadimos el evento correspondiente
    }
    /*
        //El usuario NO ha sido registrado
        $consulta=$pdo->prepare("INSERT INTO tbl_perfil (nombre,apellido,email,pass,tipo_user) VALUES (:nombre, :apellido, :email, :pass, 1)");  //preparas la consulta del elemento cuya existencia deseas validar   
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':apellido', $apellido);
        $consulta->bindParam(':email', $email);
        $consulta->bindParam(':pass', md5($pass));
        $consulta->execute();   */                         
}else {
    header("location:../view/incripcion.php");
}