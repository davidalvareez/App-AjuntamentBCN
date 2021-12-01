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
                   <a href="../view/login.php">Login</a>
               </li>
           </ul>     
    </div>
    <div class="contenido">
           <h1 class="h1_eventos">TODOS LOS PARTICIPANTES POSIBLES</h1>
           <form action="../view/vistaparticipantes.php" method="POST">
                    <input type="text" name="dni" placeholder="Indica el DNI">
                    <input type="submit" value="Filtrar" name="filtro"> 
                </form>
            <?php
            if (isset($_POST['filtro'])){
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntarios WHERE dni like '%{$_POST['dni']}%'");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                print_r($voluntarios);
            }else{
                $voluntario=$pdo->prepare("SELECT * FROM tbl_voluntarios");
                $voluntario->execute();
                $voluntarios=$voluntario->fetchAll(PDO::FETCH_ASSOC);
                print_r($voluntarios);
            }
            ?>
           <table class="tabla_principal">
               <tr>
               <th>DNI</th>
               <th>Nombre</th>
               <th>Apellido</th>
                </tr>
               <?php
                    foreach ($voluntarios as $row) {
                ?>
                <tr>
                    <td><?php echo "{$row['dni']}";?></td>
                    <td><?php echo "{$row['nombre']}";?></td>
                    <td><?php echo "{$row['apellido']}";?></td>
                </tr>
                <?php } ?>
            </table>
    </div>
</body>
</html>