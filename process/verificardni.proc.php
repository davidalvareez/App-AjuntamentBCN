<?php
//echo "Aqui verificamos el DNI";
require_once '../services/conexion.php';
session_start();
if(isset($_POST['dni'])){
    $dni=$_POST['dni'];
    $letra = substr($dni, -1);
	$numeros = substr($dni, 0, -1);
}else {
    header("location: ../view/verificarinscripcion.php");
}
if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
}else{
    //No sabemos que hacer con el por ahora se deja así
    exit("Te has inventado el dni, te denuncio a la policia");
}
$existdni=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni=:dni");
$existdni->bindParam(':dni',$dni);
$existdni->execute();
$verificarexistdni=$existdni->fetchAll(PDO::FETCH_ASSOC);
if(empty($verificarexistdni)){
    header("location: ../view/verificarinscripcion.php");
}else {
    foreach ($verificarexistdni as $row){
        $_SESSION['dni']=$dni;
        $_SESSION['nombre']=$row['nombre'];
        $_SESSION['apellido']=$row['apellido'];
        $_SESSION['telefono']=$row['telefono'];
        header("location:../view/eventosapuntado.php");
    }
}