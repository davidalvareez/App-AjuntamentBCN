<?php
    require_once '../services/conexion.php';
    session_start();
    if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
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
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_evento">
                <form class="formulario_inscripcion"  action="../process/crearevent.proc.php" method="post" enctype="multipart/form-data" onsubmit="return eventos()">
                    <h1 class="h1login">Formulario crear evento</h1>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="titulo" name="titulo" placeholder="Introduce el titulo de evento..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <textarea class="inputlogin_descripcion" type="text" id="descripcion" name="descripcion" placeholder="Introduce la descripcion del evento..."></textarea>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="date" id="fecha" name="fecha" placeholder="Introduce la fecha del evento.."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="time" id="hora" name="hora" placeholder="Introduce la hora del evento..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="number" min="1" max="9999" id="capmax" name="capmax" placeholder="Introduce la capacidad maxima del evento"/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="file" id="img" name="img" placeholder="Introduce la foto del evento"/>
                            <input type="hidden" name="id">
                        </div>
                        <br>
                    <button class="botonlogin" type="submit" name="login" value="login">Crear evento</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/listaeventosadmin.php'" type="submit" name="volver" value="volver">Volver a la lista de eventos</button>
            </div>
        </div>
    </div>
</body>
</html>