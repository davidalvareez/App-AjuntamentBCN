<?php
    require_once '../services/conexion.php';
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }
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
    <table class="tablaadmin">
        <td class="menu_nombre_admin">
            <h2 class="h1eventos">Bienvenido: <?php echo $_SESSION['username']; ?> </h2></li>
        </td>
        <td class="menu_crear_logout">
            <button class="botongeneral" OnClick="location.href='../view/vistaparticipantes.php'">Ver participantes</button>
            <button class="botongeneral" OnClick="location.href='../view/crearevento.php'">Crear evento</button>
            <button class="botongeneral" OnClick="location.href='../process/logout.proc.php'">Logout</button>  
        </td>
    </table>
    <h1 class="h1eventos">EVENTOS DISPONIBLES</h1>
    <div class="row flex-cv">
        <table class="tablaeventos">
            <?php
                //Para mostrar todos los eventos
                $sentencia=$pdo->prepare("SELECT id,titulo,descripcion,img,DATE_FORMAT(fecha,'%d/%m/%Y') as fecha FROM tbl_eventos");
                $sentencia->execute();
                $eventos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($eventos as $row) {
                    echo "<tr>";
                        echo "<td class='td_espacioimg_eventos'><img class='imgevento' src='{$row['img']}'></td>";
                        echo "<td>";
                        echo "<h2>{$row['titulo']}</h2>";
                        echo "<h2>{$row['fecha']}</h2>";
                        echo "<br>";
                        //Si el usuario es admin se verá los botones de eliminar y modificar evento
                        if ($_SESSION['tipo_user']==2) {
                            echo "<td>";
                            ?>
                            <button class="botonmodif" onclick="location.href='../view/modificarformulario.php?evento=<?php echo $row['id']; ?>'">Modificar evento</button>
                            <?php
                            echo "</td>";
                            echo "<td>";
                            ?>
                            <button class="botoneliminar" onclick="location.href='../process/delevent.proc.php?evento=<?php echo $row['id']; ?>'">Eliminar evento</button>
                            <?php
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