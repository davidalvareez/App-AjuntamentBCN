<?php
require_once '../services/conexion.php';
session_start();
if (empty($_GET['dni'])) {
    header("location: ../view/listaeventosdmin.php");
}else{
    $dni=$_GET['dni'];
    $sentencia=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni=:dni");
    $sentencia->bindParam(":dni",$dni);
    $sentencia->execute();
    $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //Ahora miramos los eventos
    $eventos=$pdo->prepare("SELECT * FROM tbl_registroevento WHERE dni=:dni");
    $eventos->bindParam(":dni",$dni);
    $eventos->execute();
    $registroevento=$eventos->fetchAll(PDO::FETCH_ASSOC);
    if (empty($comprobacion)) {
        header("location: ../view/listaeventosadmin.php");
    }else{
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $pdo->exec("DELETE FROM tbl_registroevento WHERE dni='{$dni}'");
            $pdo->exec("DELETE FROM tbl_voluntario WHERE dni='{$dni}'");
            foreach ($registroevento as $row) {
                $pdo->exec("UPDATE tbl_eventos SET capactual=capactual-1 WHERE id={$row['id_evento']}");
            }
            $pdo->commit();
            header("location:../view/vistaparticipantes.php");
        }
        catch(Exception $e){
            $pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
}
