<?php
//Destruimos la sesion
session_start();
session_destroy();
header('location: ../view/listaeventos.php');
?>