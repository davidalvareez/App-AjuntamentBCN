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
<body class="fondoimg">
    <div class="menu">
        <ul>
            <li>
                <a class="activo" href="../view/listaeventos.php">Eventos</a>
            </li>
            <li>
                <a href="../view/eventosapuntado.php">¿A que me he apuntado?</a>
            </li>
            <li>
                <a href="../view/login.php">Login</a>
            </li>
        </ul>     
    </div>
    <div class="contenido">
        <h1 class="h1_eventos">TODOS LOS EVENTOS DISPONIBLES</h1>
        <table class="tabla_principal">
            <?php
            //Sentencia para mostrar todos los eventos existentes
                $sentencia=$pdo->prepare("SELECT id,titulo,descripcion,img,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM tbl_eventos");
                $sentencia->execute();
                $eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($eventos as $row) {
                    echo "<tr>";
                        echo "<td class='td_espacioimg_eventos'><img class='imgevento' src='{$row['img']}'></td>";
                        echo "<td>";
                        echo "<h1>{$row['titulo']}</h1>";
                        echo "<h1>{$row['fecha']}</h1>";
                        echo "<br>";
                        //El boton es para saber más sobre dicho evento y hacer la inscripción
                    ?>
                        <button class="botongeneral" onclick="location.href='../view/evento.php?evento=<?php echo $row['id']; ?>'">Mas informacion</button>
                    <?php
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>