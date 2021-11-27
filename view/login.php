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
        <h1 class= "h1_login">Inicia sesión con tu cuenta de administrador</h1>
        <div class="row flex-cv">
            <div class="cuadro_login">
                <form class="formulario_login" action="../process/login.proc.php" method="post" onsubmit=" return validar_login();">
                    <h1 class="h1login">Inicio de Sesión</h1>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="text" id="username" name="username" placeholder="Introduce tu correo.."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="inputlogin" type="password" id="password" name="password" placeholder="Introduce tu contraseña..."/>
                    </div>
                    <br><br>
                    <button class="botonlogin" type="submit" name="login" value="login">Iniciar Sesión</button>
                    <br><br><br>
                    <button class="botonloginvolver" onclick="location.href='../view/listaeventos.php'">Volver a la lista de eventos</button>
                </form>
            </div>
        </div>
</body>
</html>
