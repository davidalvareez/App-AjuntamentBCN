<?php
require_once '../services/conexion.php';
session_start();
if(empty($_GET['evento'])&&empty($$_GET['dni'])){
    header("location: ../view/verificarinscripcion.php");
}else {
    $evento=$_GET['evento'];
    $dni=$_GET['dni'];
    $consulta=$pdo->prepare("SELECT * FROM tbl_registroevento WHERE id_evento=:evento AND dni=:dni");
    $consulta->bindParam(":evento",$evento);
    $consulta->bindParam(":dni",$dni);
    $consulta->execute();
    $comprobacion=$consulta->fetchAll(PDO::FETCH_ASSOC);
    if (empty($comprobacion)) {
        exit("No existe ningun registro");
    }else{
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $pdo->exec("DELETE FROM tbl_registroevento WHERE id_evento=$evento AND dni='{$dni}'");
            $pdo->exec("UPDATE tbl_eventos SET capactual=capactual-1 WHERE id=$evento");
            $pdo->commit();
            header("location:../view/evento.php?evento=$evento");
        }
        catch(Exception $e){
            $pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
}