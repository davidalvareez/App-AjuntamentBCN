<?php
    require_once '../services/conexion.php';
    session_start();
    //Si intentan entrar con la url no podrá acceder ya que no está guardado el tipo de usuario
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
    <title>Vista de participantes</title>
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
                   <a href="../process/logout.proc.php">Logout</a>
               </li>
           </ul>     
    </div>
    <div class="contenido">
           <h1 class="h1_eventos">LISTA DE PARTICIPANTES</h1>
           <form action="../view/vistaparticipantes.php" method="POST">
                    <input type="text" class="inputfiltro" name="dni" placeholder="Indica el DNI">
                    <input type="submit" class="botonfiltro"value="Filtrar" name="filtrar"> 
                </form>
            <table class="tabla_principal">
            <?php
            if (isset($_POST['filtrar'])){
                //Si le hemos dado al boton de filtrar añadimos la sentencia del filtro mediante DNI ya que es único
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni LIKE '%{$_POST['dni']}%'");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                if (empty($voluntarios)) {
                    //En caso que el filtro encuentre vacio mostrará lo siguiente y en caso contrario el header de la tabla
                    echo "<h1>No se ha encontrado ningun voluntario</h1>";
                }else{
                    ?>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                     <?php
                }
            }else{
                //Sin filtro simplemente mostramos todos los voluntarios
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntario");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                if (empty($voluntarios)) {
                    //Y en caso de la página aún no haya ningun voluntario mostramos que no hay y si hay mostramos encabezado de tabla
                    echo "<h1>No hay ningun voluntario</h1>";
                }else{
                    ?>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                     <?php
                }
            }
            ?>
               <?php
               //Mostramos todos los datos
                    foreach ($voluntarios as $row) {
                ?>
                <tr>
                    <td class="tdvoluntarios"><?php echo "{$row['dni']}";?></td>
                    <td class="tdvoluntarios"><?php echo "{$row['nombre']}";?></td>
                    <td class="tdvoluntarios"><?php echo "{$row['apellido']}";?></td>
                    <td class="tdvoluntarios"><button class="botonmodif" onclick="location.href='../view/modificarvoluntario.php?dni=<?php echo $row['dni']; ?>'">Modificar usuario</button></td>
                    <td class="tdvoluntarios"><button class="botoneliminar" onclick="location.href='../process/delvoluntario.proc.php?dni=<?php echo $row['dni']; ?>'">Eliminar usuario</button></td>
                </tr>
                <?php } ?>
            </table>
    </div>
</body>
</html>