<?php
    require_once '../services/conexion.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Eventos BCN</title>
</head>
<body class="fondoeventos">
    <table class="tablaadmin">
        <td>
            <h2 class="h1eventos">Bienvenido: <?php echo $_SESSION['nombre']; ?> </h2></li>
        </td>
        <td>
            <button class="boton" OnClick="location.href='../process/logout.proc.php'"><p>Logout</p></button></li>  
        </td>
    </table>
    <h1 class="h1eventos">EVENTOS DISPONIBLES</h1>
    <div class="row flex-cv">
        <table class="tablaeventos">
            <?php
                $sentencia=$pdo->prepare("SELECT titulo,fecha,img FROM tbl_eventos");
                $sentencia->execute();
                $eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($eventos as $row) {
                    echo "<tr>";
                        echo "<td><img class='imgevento' src='{$row['img']}'></td>";
                        echo "<td>";
                        echo "<p>{$row['titulo']}</p>";
                        echo "<p>{$row['fecha']}</p>";
                        echo "<button class='boton' OnClick='location.href='../view/evento.php' '>MAS INFO</button>";
                        if ($_SESSION['tipo_user']==2) {
                            echo "<td>";
                            echo "<button type='submit'>Modificar Evento</button>";
                            echo "</td>";
                            echo "<td>";
                            echo "<button type='submit'>Eliminar Evento</button>";
                            echo "</td>";
                        }else{
                            echo "";
                        }
                }
            ?>
        </table>
    </div>
</body>
</html>