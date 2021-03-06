<?php
    require_once '../services/conexion.php';
    session_start();
    if (empty($_GET['evento'])) {
        header("location:listaeventos.php");
    }else{
        $evento=$_GET['evento'];
    }
     if (empty($_SESSION['dni'])) {
         $dni='';
     }else{
         $dni=$_SESSION['dni'];
     }
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
<body class="fondoimg">
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
                //Mostramos todos los datos del evento en especifico
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
                            //Si la capacidad es igual que la máxima quitamos el boton de inscripción
                            if($row['capactual']==$row['capmax']){
                                //Si la capacidad es igual a la maxima no habrá ningun boton de inscripción
                                echo "";
                            }else{
                                //En caso contrario ahora comprobamos si el usuario está inscrito en caso de que si le quitamos el boton y decimos que está inscrito
                                $inscripcion=$pdo->prepare("SELECT dni, id_evento FROM tbl_registroevento WHERE dni='{$dni}' AND  id_evento=$evento");
                                $inscripcion->execute();
                                $comprobacion=$inscripcion->fetchAll(PDO::FETCH_ASSOC);
                                if (empty($comprobacion)) {
                                    //Si no encuentra nada es que la sentencia está vacia entonces el usuario no está registrado y saldrá el boton
                                    ?>
                                        <button class="botongeneral" onclick="location.href='../view/inscripcion.php?evento=<?php echo $row['id']; ?>'">Inscribirme</button>
                                        <br><br>
                                    <?php
                                }else{
                                    //Si ha encontrado que el usuario está inscrito tendrá un boton de quitar inscripción
                                    ?>
                                        <button class="botonquitarinscripcion" onclick="location.href='../process/quitinscripcion.proc.php?evento=<?php echo $row['id']; ?>&dni=<?php echo $comprobacion[0]['dni']; ?>'">Quitar inscripcion</button>
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            echo "</td>";
                        echo "</tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>