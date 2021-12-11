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
    <title>Vista de usuarios</title>
</head>
<body>
    <h1 class="h1_eventos">LISTA DE PARTICIPANTES</h1>
    <button class="botonmodif" onclick="location.href='../view/crearempleado.php'">Crear usuario</button>
    <form action="../view/gestion_usuarios.php" method="POST">
        <input type="text" class="inputfiltro" name="nombre" placeholder="Indica el nombre">
        <input type="text" class="inputfiltro" name="apellido" placeholder="Indica el apellido">
        <input type="submit" class="botonfiltro"value="Filtrar" name="filtrar"> 
    </form>
    <table class="tabla_principal">
    <?php
    if (isset($_POST['filtrar'])){
        //Si le hemos dado al boton de filtrar añadimos la sentencia del filtro mediante DNI ya que es único
        $empleado=$pdo->prepare("SELECT * FROM tbl_empleado WHERE nombre_emp LIKE '%{$_POST['nombre']}%' AND apellido_emp LIKE '%{$_POST['apellido']}%'");
        $empleado->execute();
        $empleados=$empleado->fetchAll(PDO::FETCH_ASSOC);
        if (empty($empleados)) {
            //En caso que el filtro encuentre vacio mostrará lo siguiente y en caso contrario el header de la tabla
            echo "<h1>No se ha encontrado ningun usuario</h1>";
        }else{
            ?>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo Empleado</th>
            </tr>
             <?php
        }
    }else{
        //Sin filtro simplemente mostramos todos los empleados
        $empleado=$pdo->prepare("SELECT * FROM tbl_empleado");
        $empleado->execute();
        $empleados=$empleado->fetchAll(PDO::FETCH_ASSOC);
        if (empty($empleados)) {
            //Y en caso de la página aún no haya ningun empleado mostramos que no hay y si hay mostramos encabezado de tabla
            echo "<h1>No hay ningun usuario</h1>";
        }else{
            ?>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Tipo Empleado</th>
            </tr>
             <?php
        }
    }
    ?>
        <?php
        //Mostramos todos los datos
            foreach ($empleados as $row) {
        ?>
        <tr>
            <td class="tdempleados"><?php echo "{$row['nombre_emp']}";?></td>
            <td class="tdempleados"><?php echo "{$row['apellido_emp']}";?></td>
            <td class="tdempleados"><?php echo "{$row['email_emp']}";?></td>
            <td class="tdempleados"><?php echo "{$row['tipo_emp']}";?></td>
            <td class="tdempleados"><button class="botonmodif" onclick="location.href='../view/modificarempleado.php?id_emp=<?php echo $row['id_emp']; ?>'">Modificar usuario</button></td>
            <td class="tdempleados"><button class="botoneliminar" onclick="location.href='../process/eliminarempleado.proc.php?id_emp=<?php echo $row['id_emp']; ?>'">Eliminar usuario</button></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
