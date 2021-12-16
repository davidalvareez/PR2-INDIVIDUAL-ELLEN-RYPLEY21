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
    <link rel="stylesheet" href="../css/styles.css">
    <title>Vista de mesa</title>
</head>
<body class="sala">
<table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../view/control_administrador.php'">Volver al panel control</button>
            <button class="boton_sala" onclick="location.href='../view/crearmesa.php'">Crear mesa</button>
            <button class="boton_sala" onclick="location.href='../process/logout.proc.php'">Logout</button>  
        </td>
    </table>
    <h1 class="h1_sala">LISTA DE MESAS</h1>
    <div class="cuadro_mesas">
        <form action="../view/gestion_mesas.php" method="POST">
            <input type="text" class="input_filtro" name="nombresala" placeholder="Indica el nombre de sala">
            <input type="submit" class="boton_filtrar_user"value="Filtrar" name="filtrar"> 
        </form>
        <table class="tabla_mesas">
        <?php
        if (isset($_POST['filtrar'])){
            //Si le hemos dado al boton de filtrar añadimos la sentencia del filtro mediante DNI ya que es único
            $mesa=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.capacidad, tbl_mesa.estado, tbl_mesa.img, tbl_sala.nom_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala WHERE tbl_sala.nom_sala LIKE '%{$_POST['nombresala']}%'");
            $mesa->execute();
            $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
            if (empty($mesas)) {
                //En caso que el filtro encuentre vacio mostrará lo siguiente y en caso contrario el header de la tabla
                echo "<h1>No se ha encontrado ninguna mesa</h1>";
            }else{
                ?>
                <tr>
                    <th>IMAGEN MESA</th>
                    <th>CAPACIDAD</th>
                    <th>ESTADO</th>
                    <th>NOMBRE SALA</th>
                    <th>MODIFICAR MESA</th>
                    <th>ELIMINAR MESA</th>
                </tr>
                 <?php
            }
        }else{
            //Sin filtro simplemente mostramos todos los mesas
            $mesa=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.capacidad, tbl_mesa.estado , tbl_mesa.img, tbl_sala.nom_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala");
            $mesa->execute();
            $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
            if (empty($mesas)) {
                //Y en caso de la página aún no haya ningun mesa mostramos que no hay y si hay mostramos encabezado de tabla
                echo "<h1>No hay ninguna mesa</h1>";
            }else{
                ?>
                    <tr>
                        <th>IMAGEN MESA</th>
                        <th>CAPACIDAD</th>
                        <th>ESTADO</th>
                        <th>NOMBRE SALA</th>
                        <th>MODIFICAR MESA</th>
                        <th>ELIMINAR MESA</th>
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
                <td><img class='imgmesa' src= "<?php echo "{$row['img']}";?>"></td>
                <td><?php echo "{$row['capacidad']}";?></td>
                <td><?php echo "{$row['estado']}";?></td>
                <td><?php echo "{$row['nom_sala']}";?></td>
                <td><button class="boton_modificar_mesa" onclick="location.href='../view/modificarmesa.php?id_mesa=<?php echo $row['id_mesa']; ?>'">Modificar mesa</button></td>
                <td><button class="boton_eliminar_mesa" onclick="location.href='../process/eliminarmesa.proc.php?id_mesa=<?php echo $row['id_mesa']; ?>'">Eliminar mesa</button>
            <?php } ?>
        </table>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../view/login.php');
}
