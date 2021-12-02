<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion_login.js"></script>
</head>
<body class="login">
    <div class="row flex-cv">
        <div class="cuadro_verificar_inscripcion">
            <form action="../process/verificardni.proc.php" method="post" onsubmit="return validar_dni();">
                    <h1 class="h1login">Verificación de DNI</h1>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="text" name="dni" id="dni"  placeholder="Introduce tu DNI..."/>
                        <br><br>
                    </div>
                    <div class="form-element">
                        <button class="botonlogin" type="submit" name="login" value="Enviar">Verificar</button><br><br><br>
                    </div>
            </form>
            <?php
            if (!empty($_GET['evento'])){
                $evento=$_GET['evento'];
                ?>
                <button class="botonloginvolver" onclick="location.href='../view/inscripcion.php?evento=<?php echo $evento; ?>'">Volver al formulario de inscripcion</button>
                <?php
            }
            else {
                ?>
                <button class="botonloginvolver" onclick="location.href='../view/listaeventos.php'" type="submit" name="volver" value="volver">Volver a la lista de eventos</button>
                <?php
            }
            ?>
        </div>
    </div>
</body>
</html>

