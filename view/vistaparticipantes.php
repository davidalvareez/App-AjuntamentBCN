<?php
    require_once '../services/conexion.php';
    session_start();
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
<body>
<body class="fondosala2">
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
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntario WHERE dni LIKE '%{$_POST['dni']}%'");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                if (empty($voluntarios)) {
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
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntario");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                if (empty($voluntarios)) {
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