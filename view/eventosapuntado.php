<?php
    require_once '../services/conexion.php';
    session_start();
    if (empty($_SESSION['dni'])) {
        header("location:../view/verificarinscripcion.php");
        //echo "Primero verifica el DNI HDTPM";
    }else{
        $dni=$_SESSION['dni'];
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
                    <a class= "activo" href="../view/eventosapuntado.php">¿A que me he apuntado?</a>
                </li>
                <li>
                    <a href="../view/login.php">Login</a>
                </li>
            </ul>
        </div>
        <br>
        <div class="contenido">
            <h1 class= "h1_evento_registrado">Eventos a los que estoy apuntado/a</h1>
                <table class="tabla_principal">
                    <?php
                        $eventosuser=$pdo->prepare("SELECT tbl_registroevento.dni,tbl_eventos.id,tbl_eventos.titulo,tbl_eventos.descripcion,tbl_eventos.img,date_format(tbl_eventos.fecha,'%d/%m/%Y') as fecha
                        FROM tbl_registroevento 
                        INNER JOIN tbl_eventos ON tbl_registroevento.id_evento=tbl_eventos.id
                        WHERE tbl_registroevento.dni='{$dni}'");
                        $eventosuser->execute();
                        $eventos=$eventosuser->fetchAll(PDO::FETCH_ASSOC);
                        if (empty($eventos)) {
                            //Si el usuario no tiene ningun registro con el DNI asociado no se mostrará ningun evento
                            echo "No estas registrado a ningun evento";
                        }
                        else{
                            foreach ($eventos as $row) {
                                echo "<tr>";
                                echo "<td class='td_espacioimg_eventos'><img class='imgevento' src='{$row['img']}'>";
                                echo "<td>";
                                    echo "<h2>{$row['titulo']}</h2>";
                                    echo "<h2>{$row['fecha']}</h2>";
                                    ?> 
                                    <br>
                                    <button class="botonquitarinscripcion" onclick="location.href='../process/quitinscripcion.proc.php?evento=<?php echo $row['id']; ?>&dni=<?php echo $dni ?>'">Quitar inscripcion</button>
                                <?php
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
        </div>
    </body>
    </html>
<?php
}