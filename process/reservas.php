<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_mesa=$_GET['id_mesa'];
?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Historial reservas mesa <?php echo $id_mesa ?></title>
        </head>
        <body class="fondosala2">
            <br>
            <form class="formbtn" action="../process/vista_historial.php" method="POST"><input type="hidden" name="id_sala" value="<?php echo $id_sala; ?>"><button type="submit" class="botonessala">Historial</button></form> <br> <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Volver al panel de control</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button><button type="submit" class="botonessala">Historial</button></form>
            <br> <br>
            <div class="row flex-cv">
                <div class="cuadro-figura">
                    <?php
                        $sentencia=$pdo->prepare("SELECT id_reserva, data_reserva, hora_reserva, hora_fi_reserva, id_mesa FROM tbl_reserva WHERE id_mesa= $id_mesa");
                        $sentencia->execute();          
                    ?>
                    <br><h2>Reservas</h2>
                    <table class="table table-striped table-bordered table-sm">
                        <tr class="active">
                            <th>FECHA RESERVA</th>
                            <th>HORA INICIO RESERVA</th>
                            <th>HORA FIN RESERVA</th>
                        </tr>
                        <?php
                            $listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaMesas as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['data_reserva']}";?></td>
                            <td><?php echo "{$registro['hora_reserva']}";?></td>
                            <td><?php echo "{$registro['hora_fi_reserva']}";?></td>
                            <td><form method="GET" action="../process/eliminar_reserva.php">
                                <button class= "boton" type="submit" name="Enviar" value="Enviar">Eliminar</button>
                                <input type="hidden" name="id_reserva" value="<?php echo "{$registro['id_reserva']}";?>">
                                <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                                <input type="hidden" name="id_sala" value="<?php echo "{$registro['id_sala']}";?>">
                            </form></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </body>
        </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }