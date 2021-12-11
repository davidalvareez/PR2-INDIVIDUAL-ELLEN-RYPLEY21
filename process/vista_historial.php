<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_sala=$_POST['id_sala']; 
        $id=$id_sala;
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <title>Vista Historial</title>
    </head>
    <body class="fondosala2">
        <button class="botonessala" OnClick="location.href='../view/control_sala.php'">Volver al panel de control</button> <button class="botonessala" OnClick="location.href='../process/incidenciaxd.php'">Incidencias</button> <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
        <br> <br>
        <div class="row flex-cv">
             <div class="cuadro-figura">   
                <br><h2>Información Historial Reservas</h2><br>
                <form action="../process/vista_historial.php" method="POST">
                    <input type="text" name="data_reserva" placeholder="Fecha">
                    <input type="text" name="hora_reserva" placeholder="Hora">
                    <input type="number" name="mesa" placeholder="Mesa">
                    <input type="hidden" name="id_sala" value="<?php echo $id ?>">
                    <input type="submit" value="Filtrar" name="filtro"> 
                    
                </form>
                <?php
                    if(isset($_REQUEST['filtro'])){
                        $fecha=$_REQUEST['data_reserva'];
                        $hora=$_REQUEST['hora_reserva'];
                        $mesa=$_REQUEST['mesa'];
                        if($fecha="" && $hora="" && $mesa=""){
                            $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id;"); //Cambiar el 1 por $id_sala
                        }else if(!empty($fecha) && $hora="" && $mesa=""){
                            $setencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.data_reserva LIKE '%$fecha%';");
                        }else if(!empty($fecha) && !empty($hora) && $mesa=""){
                            $setencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.data_reserva LIKE '%$fecha%' AND tbl_reserva.hora_reserva LIKE '%$hora%';");
                        }else if(!empty($fecha) && $hora="" && !empty($mesa)){
                            $setencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.data_reserva LIKE '%$fecha%' AND tbl_reserva.id_mesa LIKE '%$mesa%';");
                        }else if($fecha="" && !empty($hora) && $mesa=""){
                            $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.hora_reserva LIKE '%$hora%';");
                        }else if($fecha="" && !empty($hora) && !empty($mesa)){
                            $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.hora_reserva LIKE '%$hora%' AND tbl_reserva.id_mesa LIKE '%$mesa%';");
                        }else if($fecha="" && $hora="" && !empty($mesa)){
                            $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.id_mesa LIKE '%$mesa%';");
                        }else{
                            $sentencia=$pdo->prepare("SELECT tbl_reserva.id_reserva,tbl_reserva.data_reserva,tbl_reserva.hora_reserva,tbl_reserva.hora_fi_reserva,tbl_reserva.id_mesa FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_mesa.id_mesa=tbl_reserva.id_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id AND tbl_reserva.data_reserva LIKE '%$fecha%' AND tbl_reserva.hora_reserva LIKE '%$hora%' AND tbl_reserva.id_mesa LIKE '%$mesa%';");
                        }
                        $sentencia->execute();
                        $listaReserva=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                        $lista=$listaReserva;
                        ?> 
                        <br>
                        <table class="table table-striped table-bordered table-sm">
                            <tr class="active">
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora Inicial</th>
                                <th>Hora Final</th>
                                <th>Mesa</th>
                            </tr>
                            <?php
                                foreach($lista as $registro){   
                            ?>
                            <tr>
                                <td><?php echo "{$registro['id_reserva']}";?></td>
                                <td><?php echo "{$registro['data_reserva']}";?></td>
                                <td><?php echo "{$registro['hora_reserva']}";?></td>
                                <td><?php echo "{$registro['hora_fi_reserva']}";?></td>
                                <td><?php echo "{$registro['id_mesa']}";?></td>
                            </tr>
                            <?php } ?>
                        </table>
                    <?php } ?>
            </div>
        </div>  
    </body>
    </html>      
<?php
    }else{
        header('Location: ../view/login.php');
    }