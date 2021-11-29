<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    //if (!$_SESSION['nombre']=="") {
    $evento=$_GET['evento'];
?> 
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
<body>
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_inscripcion">
                <form class="formulario_inscripcion" action="../process/register.proc.php" method="post" onsubmit="return validar();">
                    <h1 class="h1login">¡Formulario de Inscripcion!</h1>
                    <br>
                    <?php
                    if (empty($_SESSION['dni'])) {
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="dni" name="dni" placeholder="Introduce tu DNI..."/>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="dni" name="dni" value="<?php echo $_SESSION['dni']; ?>"/>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                    <?php
                    if (empty($_SESSION['nombre'])) {
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre..."/>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre'];?>"/>
                        </div>
                       <?php 
                    }
                    ?>
                    <br>
                    <?php
                    if (empty($_SESSION['apellido'])) {
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="apellido" name="apellido" placeholder="Introduce tu apellido..."/>
                        </div>
                        <?php
                    }else {
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="apellido" name="apellido" value="<?php echo $_SESSION['apellido']; ?>"/>
                        </div>
                        <?php
                    }
                    ?>
                    <br>
                    <?php
                    if (empty($_SESSION['telefono'])){
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="telefono" name="telefono" placeholder="Introduce tu telefono..."/>
                        </div>
                        <?php
                    }else {
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>"/>
                        </div>
                        <?php
                    }
                    ?>
                        <input type="hidden" name="evento" value="<?php echo $evento; ?>"/>
                    <br><br>
                    <button class="botonlogin" type="submit" name="login" value="login">Inscribirme</button>
                </form>
                <?php
                    $sentencia=$pdo->prepare("SELECT id FROM tbl_eventos WHERE id=$evento");
                    $sentencia->execute();
                    $eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($eventos as $row) {
                ?>
                    <?php
                        if(!empty($_SESSION['dni'])){
                        }else{
                            ?>
                                <button class="botonyainscrito" onclick="location.href='../view/verificarinscripcion.php?evento=<?php echo $row['id']; ?>'" type="submit" name="inscripcion" value="inscripcion">Ya estoy inscrito</button>
                                <br><br>
                            <?php
                        }
                    ?>
                    <button class="botonloginvolver" onclick="location.href='../view/evento.php?evento=<?php echo $row['id']; ?>'">Volver al evento</button>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
