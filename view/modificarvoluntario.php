<?php
    require_once '../services/conexion.php';
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }
    //O si no se puso DNI más de lo mismo
    if (empty($_GET['dni'])){
        header("location:../view/vistaparticipantes.php");
    }else{
        //Esto es para recorrer todos los datos del voluntario a modificar
        $dni=$_GET['dni'];
        $sentencia=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni=:dni");
        $sentencia->BindParam(":dni",$dni);
        $sentencia->execute();
        $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion_login.js"></script>
    <title>Modificar</title>
</head>
<body class="fondoimg">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_voluntario">
                <form class="formulario_inscripcion"  action="../process/upvoluntario.proc.php" method="post" enctype="multipart/form-data" onsubmit="return eventos()">
                    <h1 class="h1login">¡Formulario modificar voluntario!</h1>
                        <br>
                        <?php
                            if (empty($comprobacion)) {
                                //Si la query fue mal nos vamos a la vista de nuevo
                                header("location:../view/vistaparticipantes.php");
                            }else{
                                foreach ($comprobacion as $row){
                                    //Si fue bien guardamos todo en variable y los mostramos en los valores
                                    $dni=$row['dni'];
                                    $nombre=$row['nombre'];
                                    $apellido=$row['apellido'];
                                    $telefono=$row['telefono'];
                                }
                            }
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Introduce el nombre del voluntario..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" placeholder="Introduce el apellido del voluntario.."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" placeholder="Introduce el telefono del voluntario..."/>
                            <input type="hidden" name="dni" value="<?php echo $dni; ?>">
                        </div>
                        <br>
                    <button class="botonlogin" type="submit" name="login" value="login">Modificar voluntario</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/vistaparticipantes.php'" type="submit" name="volver" value="volver">Volver a la lista de participantes</button>
            </div>
        </div>
    </div>
</body>
</html>