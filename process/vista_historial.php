<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
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
    <body class="sala">
        <table class="contenedor_botones_principales_sala">
            <td>
                <button class="boton_sala" onclick="location.href='../view/control_administrador.php'">Volver al panel control</button>
                <button class="boton_sala" onclick="location.href='../process/logout.proc.php'">Logout</button>  
            </td>
        </table>
        <h1 class="h1_sala">HISTORIAL DE RESERVAS</h1>
        <div class="cuadro_mesas">   
           <form action="../process/vista_historial.php" method="POST">
           <input class="input_login" type="date" id="fecha" name="fecha" placeholder="Introduce la fecha de la reserva..."/>
           <input class="input_login" type="time" step= "3600" max="23:00" min="13:00" id="horainicio" name="horainicio" placeholder="Introduce la hora de la reserva..."/>
           <input type="submit" class="boton_filtrar_user"value="Filtrar" name="filtrar">       
           </form>
        <table class="tabla_mesas">
            <?php
            if (isset($_POST['filtrar'])){
                //Si le hemos dado al boton de filtrar añadimos la sentencia del filtro mediante DNI ya que es único
                $mesa=$pdo->prepare("SELECT * FROM tbl_reserva WHERE data_reserva LIKE '%{$_POST['fecha']}%' AND hora_reserva LIKE '%{$_POST['horainicio']}%'");
                $mesa->execute();
                $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
                if (empty($mesas)) {
                    //En caso que el filtro encuentre vacio mostrará lo siguiente y en caso contrario el header de la tabla
                    echo "<h1>No se ha encontrado ninguna mesa</h1>";
                }else{
                    ?>
                    <tr>
                        <th>Nº RESERVA</th>
                        <th>DATA RESERVA</th>
                        <th>HORA RESERVA</th>
                        <th>HORA FIN RESERVA</th>
                        <th>NUMERO DE MESA</th>
                    </tr>
                     <?php
                }
            }else{
                //Sin filtro simplemente mostramos todos los mesas
                $mesa=$pdo->prepare("SELECT * FROM tbl_reserva");                
                $mesa->execute();
                $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
                if (empty($mesas)) {
                    //Y en caso de la página aún no haya ningun mesa mostramos que no hay y si hay mostramos encabezado de tabla
                    echo "<h1>No hay ninguna mesa</h1>";
                }else{
                    ?>
                    <tr>
                        <th>Nº RESERVA</th>
                        <th>DATA RESERVA</th>
                        <th>HORA RESERVA</th>
                        <th>HORA FIN RESERVA</th>
                        <th>NUMERO DE MESA</th>
                    </tr>
                    <?php
                }
            }
            ?>
                <?php
                //Mostramos todos los datos
                    foreach ($mesas as $row) {
                ?>
                <tr>
                    <td><?php echo "{$row['id_reserva']}";?></td>
                    <td><?php echo "{$row['data_reserva']}";?></td>
                    <td><?php echo "{$row['hora_reserva']}";?></td>
                    <td><?php echo "{$row['hora_fi_reserva']}";?></td>
                    <td><?php echo "{$row['id_mesa']}";?></td>
                <?php } ?>
            </table>
        </div>
    </body>
    </html>
<?php
}else{
    header('Location: ../view/login.php');
}
