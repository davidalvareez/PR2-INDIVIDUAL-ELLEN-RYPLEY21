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
    <title>Crear empleado</title>
</head>
<body class="login">
    <table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../view/gestion_usuarios.php'">Volver a la lista de usuarios</button>
        </td>
    </table>
        <div class="row flex-cv">
            <div class="cuadro_formulario_mesa_user">
                <form class="formulario_inscripcion"  action="../process/crearempleado.proc.php" method="post" onsubmit="return validarCrearUser()">
                    <h1 class="h1login">Crear un nuevo empleado</h1>
                    <br>
                    <div class="form-element">
                        <input class="input_login" type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del usuario..."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="input_login" type="text" id="apellido" name="apellido" placeholder="Introduce el apellido del usuario..."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="input_login" type="email" id="email" name="email" placeholder="Introduce el email del usuario..."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <input class="input_login" type="password" id="passwd" name="passwd"  placeholder="Introduce la password del usuario..."/>
                    </div>
                    <br>
                    <div class="form-element">
                        <select class="input_login" name="tipoemp" id="tipoemp">
                            <option value="Camarero">Camarero</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                    <br><br>
                    <button class="boton_login" type="submit" id="enviar" value="enviar">Crear empleado</button>
                    <br><br>
                </form>
        </div>
    </div>
</body>
</html>
<?php
}else{
    header('Location: ../view/login.php');
}