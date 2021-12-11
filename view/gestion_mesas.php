<?php
    require_once '../services/conexion.php';
    /*
    session_start();
    //Si intentan entrar con la url no podrá acceder ya que no está guardado el tipo de usuario
    if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }
    */
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
<body>
    <h1 class="h1_eventos">LISTA DE MESAS</h1>
    <form action="../view/gestion_mesas.php" method="POST">
        <input type="text" class="inputfiltro" name="nombresala" placeholder="Indica el nombre de sala">
        <input type="submit" class="botonfiltro"value="Filtrar" name="filtrar"> 
    </form>
    <table class="tabla_principal">
    <?php
    if (isset($_POST['filtrar'])){
        //Si le hemos dado al boton de filtrar añadimos la sentencia del filtro mediante DNI ya que es único
        $mesa=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.capacidad, tbl_mesa.estado , tbl_sala.nom_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala WHERE tbl_sala.nom_sala LIKE '%{$_POST['nombresala']}%'");
        $mesa->execute();
        $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
        if (empty($mesas)) {
            //En caso que el filtro encuentre vacio mostrará lo siguiente y en caso contrario el header de la tabla
            echo "<h1>No se ha encontrado ninguna mesa</h1>";
        }else{
            ?>
            <tr>
                <th>Capacidad</th>
                <th>Estado</th>
                <th>Nombre sala</th>
            </tr>
             <?php
        }
    }else{
        //Sin filtro simplemente mostramos todos los mesas
        $mesa=$pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.capacidad, tbl_mesa.estado , tbl_sala.nom_sala FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala");
        $mesa->execute();
        $mesas=$mesa->fetchAll(PDO::FETCH_ASSOC);
        if (empty($mesas)) {
            //Y en caso de la página aún no haya ningun mesa mostramos que no hay y si hay mostramos encabezado de tabla
            echo "<h1>No hay ninguna mesa</h1>";
        }else{
            ?>
                <tr>
                    <th>Capacidad</th>
                    <th>Estado</th>
                    <th>Nombre sala</th>
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
            <td class="tdmesas"><?php echo "{$row['capacidad']}";?></td>
            <td class="tdmesas"><?php echo "{$row['estado']}";?></td>
            <td class="tdmesas"><?php echo "{$row['nom_sala']}";?></td>
            <td class="tdmesas"><button class="botonmodif" onclick="location.href='../view/modificarmesa.php?id_mesa=<?php echo $row['id_mesa']; ?>'">Modificar mesa</button></td>
            <td class="tdmesas"><button class="botoneliminar" onclick="location.href='../process/eliminarmesa.proc.php?id_mesa=<?php echo $row['id_mesa']; ?>'">Eliminar mesa</button></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

