<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_sala=$_GET['id_sala'];
        // echo $id_sala;
        // die; ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/styles.css">
            <title>Mesas Sala <?php echo $id_sala ?></title>
        </head>
        <body class="sala">
            <div class="contenedor_botones_principales_sala">
                <button class="boton_sala" OnClick="location.href='../view/control_sala.php'">Volver al panel de control</button>
                <button class="boton_sala" OnClick="location.href='../process/logout.proc.php'">Logout</button>            
            </div>
            <h2 class="h1_sala">INFORMACIÓN MESAS SALA <?php echo $id_sala ?></h2>
            <div class="row flex-cv">                   
                <div class="cuadro_users">
                    <?php
                        $sentencia=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.capacidad, tbl_mesa.estado, tbl_mesa.id_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_sala.id_sala=tbl_mesa.id_sala WHERE tbl_sala.id_sala = $id_sala");
                        $sentencia->execute();          
                    ?>
                    <table class="tabla_sala">
                        <tr>
                            <th>Nº MESA</th>
                            <th>CAPACIDAD</th>
                            <th>ESTADO ACTUAL</th>
                            <th>CAMBIAR ESTADO</th>
                            <th>LISTADO DE RESERVAS DE LA MESA</th>
                        </tr>
                        <?php
                            $listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($listaMesas as $registro){ 
                        ?>
                        <tr>
                            <td><?php echo "{$registro['id_mesa']}";?></td>
                            <td><?php echo "{$registro['capacidad']}";?></td>
                            <td><?php echo "{$registro['estado']}";?></td>
                            <td>
                                <form method="GET" action="../process/recibir_estado.php">
                                    <select class="select_sala" name="select">
                                        <option value="Activa">Activa</option>
                                        <option value="Mantenimiento">Mantenimiento</option>
                                    </select>
                                    <button class="boton_confirmar_sala" type="submit" name="Enviar" value="Enviar">Confirmar</button>
                                    <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                                    <input type="hidden" name="id_sala" value="<?php echo "{$registro['id_sala']}";?>">
                                </form>
                            </td>
                            <form method="GET" action="../process/reservas.php">
                            <td>
                                <button class= "boton_confirmar_sala" onclick="location.href='../process/reservas.php?id_mesa=<?php echo $registro['id_mesa']; ?>'" type="submit" name="Enviar" value="Enviar">Ver reservas</button>
                                <input type="hidden" name="id_sala" value="<?php echo "{$registro['id_sala']}";?>">
                                <input type="hidden" name="id_mesa" value="<?php echo "{$registro['id_mesa']}";?>">
                            </td>
                            </form>
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