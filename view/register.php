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
        <h1>¡Regístrate para participar en los eventos!</h1>
        <div class="row flex-cv">
            <div class="cuadro_login">
                <form class="formulario_login" action="../process/register.proc.php" method="post" onsubmit=" return validar();">
                    <h1 class="h1login">Regístrate en nuestra web</h1>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="text" id="username" name="username" placeholder="Introduce tu correo.."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="password" id="password" name="password" placeholder="Introduce tu contraseña..."/>
                    </div>
                    <br><br>
                    <button class="botonlogin" type="submit" name="login" value="login">Registrarse</button>
                </form>
                <button class="botonregister" name="register" value="register" OnClick="location.href='../view/login.php'">Volver al inicio de sesión</button>
            </div>
        </div>
</body>
</html>
