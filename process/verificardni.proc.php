<?php
require_once '../services/conexion.php';
session_start();
if(isset($_POST['dni'])){
    $dni=$_POST['dni'];
    $letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
}else {
    header("location: ../view/verificarinscripcion.php");
}
//Comprobamos que el dni no esté inventado
if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
}else{
    header("location: ../view/dniinventado.php");
}
$existdni=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni=:dni");
$existdni->bindParam(':dni',$dni);
$existdni->execute();
$verificarexistdni=$existdni->fetchAll(PDO::FETCH_ASSOC);
if(empty($verificarexistdni)){
    header("location: ../view/verificarinscripcion.php");
}else {
    //Si encontro el dni le metemos todos los datos en la sesion ya que eso sirve cuando se inscriba ya aparezca todos sus datos
    foreach ($verificarexistdni as $row){
        $_SESSION['dni']=$dni;
        $_SESSION['nombre']=$row['nombre'];
        $_SESSION['apellido']=$row['apellido'];
        $_SESSION['telefono']=$row['telefono'];
        header("location:../view/eventosapuntado.php");
    }
}