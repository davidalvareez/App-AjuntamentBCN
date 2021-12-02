<?php
    require_once '../services/conexion.php';
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }
    //O si no se puso evento más de lo mismo
    if (empty($_GET['evento'])){
        header("location:../view/listaeventosadmin.php");
    }else{
        //Esto es para recorrer todos los datos del evento a modificar
        $idevento=$_GET['evento'];
        $sentencia=$pdo->prepare("SELECT * FROM tbl_eventos WHERE id=:id");
        $sentencia->BindParam(":id",$idevento);
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
            <div class="cuadro_modificar_evento">
                <form class="formulario_inscripcion"  action="../process/upevent.proc.php" method="post" enctype="multipart/form-data" onsubmit="return eventos()">
                    <h1 class="h1login">¡Formulario modificar Evento!</h1>
                        <br>
                        <?php
                            if (empty($comprobacion)) {
                                //En caso que la query fuera mal lo llevamos a la lista de eventos de la zona admin
                                header("location:../view/listaeventosadmin.php");
                            }else{
                                foreach ($comprobacion as $row){
                                    //Y si fue bien recogemos todos los datos y los ponemos en el formulario con la etiqueta value
                                    $titulo=$row['titulo'];
                                    $descripcion=$row['descripcion'];
                                    $fecha=$row['fecha'];
                                    $hora=$row['hora'];
                                    $capmaxima=$row['capmax'];
                                }
                            }
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" placeholder="Introduce el titulo de evento..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <textarea class="inputlogin_descripcion" type="text" id="descripcion" name="descripcion" placeholder="Introduce la descripcion del evento..."><?php echo $descripcion ?></textarea>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="date" id="fecha" name="fecha" value="<?php echo $fecha; ?>" placeholder="Introduce la fecha del evento.."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="time" id="hora" name="hora" value="<?php echo $hora; ?>" placeholder="Introduce la hora del evento..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="number" min="3" max="9999" id="capmax" name="capmax" value="<?php echo $capmaxima; ?>" placeholder="Introduce la capacidad maxima del evento"/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="file" id="img" name="img" placeholder="Introduce la foto del evento"/>
                            <input type="hidden" name="id" value="<?php echo $idevento; ?>">
                        </div>
                        <br>
                    <button class="botonlogin" type="submit" name="login" value="login">Modificar evento</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/listaeventosadmin.php'" type="submit" name="volver" value="volver">Volver a la lista de eventos</button>
            </div>
        </div>
    </div>
</body>
</html>