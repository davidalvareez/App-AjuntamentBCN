<?php
require_once '../services/conexion.php';
session_start();
if (empty($_GET['evento'])) {
    header("location: ../view/listaeventosdmin.php");
}else{
    $idevento=$_GET['evento'];
    $sentencia=$pdo->prepare("SELECT * FROM tbl_eventos WHERE id=:id");
    $sentencia->bindParam(":id",$idevento);
    $sentencia->execute();
    $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //Si el evento no existe directamente le redirigimos
    if (empty($comprobacion)) {
        header("location: ../view/listaeventosadmin.php");
    }else{
        //En caso que si eliminamos los registros eventos de dicho y evento y el evento en especifico
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();
            $pdo->exec("DELETE FROM tbl_registroevento WHERE id_evento=$idevento");
            $pdo->exec("DELETE FROM tbl_eventos WHERE id=$idevento");
            $pdo->commit();
            header("location:../view/listaeventosadmin.php");
        }
        catch(Exception $e){
            $pdo->rollBack();
            echo "Fallo: " . $e->getMessage();
        }
    }
}
