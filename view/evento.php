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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Eventos</title>
</head>
<body>
    <div class="menu">
        <ul>
            <li>
                <a href="../view/listaeventos.php">Eventos</a>
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
        <div class="contenido_centrado">
            <table class="tabla_evento">
                <?php
                    $sentencia=$pdo->prepare("SELECT id,titulo,descripcion,img,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha,TIME_FORMAT(hora,'%H:%i') as hora,capactual,capmax FROM tbl_eventos WHERE id=$evento");
                    $sentencia->execute();
                    $eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($eventos as $row) {
                        echo "<tr>";
                            echo "<td><img class='imgevento' src='{$row['img']}'>";
                            echo "<br>";
                            echo "<br>";
                            echo "<h1>{$row['titulo']}</h1>";
                            echo "<p>{$row['descripcion']}</p>";
                            echo "<p>Fecha y hora: {$row['fecha']} a las {$row['hora']}. </p>";
                            echo "<p>Numero de participantes: {$row['capactual']}/{$row['capmax']}</p>";
                ?>
                        <button class="botongeneral" onclick="location.href='../view/inscripcion.php?evento=<?php echo $row['id']; ?>'">Inscribirme</button>
                        <br><br>
                   <?php
                            echo "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>