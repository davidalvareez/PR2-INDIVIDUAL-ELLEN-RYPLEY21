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
    <title>Vista de usuarios</title>
</head>
<body class="sala">
    <table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../view/control_administrador.php'">Volver al panel de control</button>
            <button class="boton_sala" onclick="location.href='../view/crearempleado.php'">Crear usuario</button>
            <button class="boton_sala" onclick="location.href='../process/logout.proc.php'">Logout</button>  
        </td>
    </table>
    <h1 class="h1_sala">Lista de todos los usuarios</h1>
    <div class="cuadro_users">
        <form action="../view/gestion_usuarios.php" method="POST">
            <input type="text" class="input_filtro" name="nombre" placeholder="Indica el nombre...">
            <input type="text" class="input_filtro" name="apellido" placeholder="Indica el apellido...">
            <input type="submit" class="boton_filtrar_user"value="Filtrar" name="filtrar"> 
        </form>
        <table class="tabla_users">
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
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CORREO</th>
                    <th>TIPO DE USUARIO</th>
                    <th>MODIFICAR USUARIO</th>
                    <th>ELIMINAR USUARIO</th>
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
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CORREO</th>
                    <th>TIPO DE USUARIO</th>
                    <th>MODIFICAR USUARIO</th>
                    <th>ELIMINAR USUARIO</th>
                </tr>
                 <?php
            }
        }
        ?>
            <?php
            //Mostramos todos los datos
                foreach ($empleados as $row) {
                    if ($row['nombre_emp']==$_SESSION['nombre']) {
                        # code...
                    }else{
            ?>
            <tr>
                <td><?php echo "{$row['nombre_emp']}";?></td>
                <td><?php echo "{$row['apellido_emp']}";?></td>
                <td><?php echo "{$row['email_emp']}";?></td>
                <td><?php echo "{$row['tipo_emp']}";?></td>
                <td><button class="boton_modificar_user" onclick="location.href='../view/modificarempleado.php?id_emp=<?php echo $row['id_emp']; ?>'">Modificar usuario</button></td>
                <td><button class="boton_eliminar_user" onclick="location.href='../process/eliminarempleado.proc.php?id_emp=<?php echo $row['id_emp']; ?>'">Eliminar usuario</button></td>
            </tr>
            <?php 
            }
        } ?>
        </table>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../view/login.php');
}

