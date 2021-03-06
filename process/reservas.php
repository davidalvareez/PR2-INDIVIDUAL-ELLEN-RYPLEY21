<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_mesa=$_GET['id_mesa'];
        $id_sala=$_GET['id_sala'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion.js"></script>
    <title>Historial reservas mesa <?php echo $id_mesa ?></title>
</head>
<body class="reserva">
    <div class="contenedor_botones_principales_sala">
        <button class="boton_sala" onclick="location.href='../process/sala.php?id_sala=<?php echo $id_sala ?>'">Volver a la sala</button>
        <button class="boton_sala" onclick="location.href='../view/crearreserva.php?id_mesa= <?php echo $id_mesa?>&id_sala=<?php echo $id_sala?>'">Crear reserva</button>          
        <button class="boton_sala" onclick="location.href='../process/logout.proc.php'">Logout</button>  
    </div>
    <h2 class="h1_sala">Información de las reservas mesa <?php echo $id_mesa ?></h2>
    <div class="row flex-cv">
        <div class="cuadro_reserva">
            <?php
                $sentencia=$pdo->prepare("SELECT id_reserva, DATE_FORMAT(data_reserva,'%d/%m/%Y') AS data_reserva, TIME_FORMAT(hora_reserva,'%H:%i') AS `hora_reserva` , TIME_FORMAT(hora_fi_reserva,'%H:%i') AS `hora_fi_reserva`, id_mesa FROM tbl_reserva WHERE id_mesa= $id_mesa");
                $sentencia->execute();          
            ?>
            <table class="tabla_reserva">
                <tr>
                    <th>FECHA RESERVA</th>
                    <th>HORA INICIO RESERVA</th>
                    <th>HORA FINAL RESERVA</th>
                    <th>ELIMINAR RESERVA</th>
                </tr>
                <?php
                    $listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                    foreach($listaMesas as $registro){ 
                ?>
                <tr>
                    <td><?php echo "{$registro['data_reserva']}";?></td>
                    <td><?php echo "{$registro['hora_reserva']}";?></td>
                    <td><?php echo "{$registro['hora_fi_reserva']}";?></td>
                    <td><form method="POST" action="../process/eliminar_reserva.php">
                        <button class="boton_eliminar_reserva" type="submit" name="Enviar" value="Enviar">Eliminar</button>
                        <input type="hidden" name="id_reserva" value="<?php echo "{$registro['id_reserva']}";?>">
                        <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                        <input type="hidden" name="id_sala" value="<?php echo "{$id_sala}";?>">
                    </form></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <?php
    if (!empty($_REQUEST['error'])) {
        echo "<script>yaReservado();</script>";
    }
    ?>
</body>
</html>
<?php
    }else{
        header('Location: ../view/login.php');
    }