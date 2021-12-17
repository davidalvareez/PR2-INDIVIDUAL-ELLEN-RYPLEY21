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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion.js"></script>
    <title>Crear mesa</title>
</head>
<body class="login">
    <table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../view/gestion_mesas.php'">Volver a la lista de las mesas</button>
        </td>
    </table>
        <div class="row flex-cv">
            <div class="cuadro_formulario_mesa_user">
                <form action="../process/crearmesa.proc.php" method="post" enctype="multipart/form-data" onsubmit="return validarCrearMesa()">
                    <h1 class="h1login">Crear una nueva mesa</h1>
                        <br>
                        <div class="form-element">
                            <input class="input_login" type="text" id="capacidad" name="capacidad" placeholder="Introduce la capacidad de la mesa..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <select class="input_login" id="estado" name="estado">
                                <option value="Activa">Activa</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-element">
                            <select class="input_login" id="nombresala" name="nombresala">
                                <option value="1">Sala 2</option>
                                <option value="2">Sala 4</option>
                                <option value="3">Sala 6</option>
                                <option value="4">Sala 8</option>
                                <option value="5">Sala 10</option>
                                <option value="6">Sala Reservado</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="input_login" type="file" id="img" name="img" placeholder="Introduce la foto de la mesa"/>
                        </div>
                        <br>
                    <button class="boton_login" type="submit" name="crear" value="crear">Crear mesa</button>
                    <br><br>
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