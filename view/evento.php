<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    //if (!$_SESSION['nombre']=="") {
        $id_evento=$_GET['id_evento'];
        echo $id_evento;
        die; 
        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Mesas Sala <?php $id_sala ?></title>
        </head>
        <body class="fondosala">
            <br>
            <form class="formbtn" action="../process/vista_historial.php" method="POST"><input type="hidden" name="id_sala" value="<?php echo $id_sala; ?>"><button type="submit" class="botonessala">Historial</button></form> <br> <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Panel de control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
            <br> <br>
            <div class="row flex-cv">
                <div class="cuadro-figura">
                    <?php
                        $sentencia=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.estado, tbl_mesa.id_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id_sala ");
                        $sentencia->execute();          
                    ?>
                    <br><h2>Información Mesas</h2>
                    <table class="table">
                        <tr class="active">
                            <th>MESA</th>
                            <th>ESTADO</th>
                            <th>ACCIONES</th>
                        </tr>
                        <?php
                            $listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaMesas as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
                            <td><?php echo "{$registro['estado']}";?></td>
                            <td><form method="GET" action="../process/recibir_estado.php">
                                <select name="select">
                                    <option value="Ocupado">Ocupado</option>
                                    <option value="Libre" selected>Libre</option>
                                    <option value="Mantenimiento">Mantenimiento</option>
                                </select>
                                <button class= "boton" type="submit" name="Enviar" value="Enviar">Confirmar</button>
                                <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                            </form></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </body>
        </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }