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
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion.js"></script>
    <title>Modificar</title>
</head>
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_evento">
                <form class="formulario_inscripcion"  action="../process/crearreserva.proc.php" method="post" onsubmit="return validarCrearReserva()">
                    <h1 class="h1login">Formulario crear reserva</h1>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="date" id="fecha" min="<?php $fechasistema=date('Y-m-d'); echo $fechasistema ?>" name="fecha" placeholder="Introduce la fecha de la reserva..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="time" step= "3600" max="23:00" min="13:00" id="horainicio" name="horainicio" placeholder="Introduce la hora de la reserva..."/>
                            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa; ?>">
                            <input type="hidden" name="id_sala" value="<?php echo $id_sala; ?>">
                        </div>
                        <br>
                    <button class="botonlogin" type="submit" name="crear" value="crear">Crear reserva</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../process/reserva.php?id_mesa=<?php echo $row['id_mesa']; ?>" type="submit" name="volver" value="volver">Volver a la lista de mesas</button>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../view/login.php');
}