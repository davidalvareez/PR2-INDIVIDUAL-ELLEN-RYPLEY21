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
    <title>Crear reserva</title>
</head>
<body class="login">
    <table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../process/reservas.php?id_sala=<?php echo $id_sala ?>&id_mesa=<?php echo $id_mesa ?>'">Volver a la gestión de las mesas</button>
        </td>
    </table>
        <div class="row flex-cv">
            <div class="cuadro_formulario_mesa_user">
                <form class="formulario_inscripcion"  action="../process/crearreserva.proc.php" method="post" onsubmit="return validarCrearReserva()">
                    <h1 class="h1_login">Crear la reserva</h1>
                        <div class="form-element">
                            <input class="input_login" type="date" id="fecha" min="<?php $fechasistema=date('Y-m-d'); echo $fechasistema ?>" name="fecha" placeholder="Introduce la fecha de la reserva..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <select class="input_login" name="horainicio" id="horainicio">
                                <option value="13:00">13:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                                <option value="19:00">19:00</option>
                                <option value="20:00">20:00</option>
                                <option value="21:00">21:00</option>
                            </select>
                            <input type="hidden" name="id_mesa" value="<?php echo $id_mesa; ?>">
                            <input type="hidden" name="id_sala" value="<?php echo $id_sala; ?>">
                        </div>
                        <br>
                    <button class="boton_login" type="submit" name="crear" value="crear">Crear reserva</button>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../view/login.php');
}