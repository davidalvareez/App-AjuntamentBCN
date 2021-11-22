<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validacion_login.js"></script>
</head>
<body class="login">
        <div class="row flex-cv">
            <div class="cuadro_login">
                <form class="formulario_login" action="../process/login.proc.php" method="post" onsubmit=" return validar();">
                    <h1 class="h1login">Inicio de Sesión</h1>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="text" id="username" name="username" placeholder="Usuario..."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="password" id="password" name="password" placeholder="Contraseña..."/>
                    </div>
                    <br><br>
                    <button class= "botonlogin" type="submit" name="register" value="register">Iniciar Sesión</button>
                    <br><br>
                    <div class="mensajelogin" id="mensaje"></div>
                </form>
            </div>
        </div>
</body>

</html>
