<?php
    require_once '../services/conexion.php';
    
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    /*if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }*/
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
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_voluntario">
                <form class="formulario_inscripcion"  action="../process/crearempleado.proc.php" method="post" onsubmit="return validarCrearUser()">
                    <h1 class="h1login">¡Formulario modificar empleado!</h1>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del usuario..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="apellido" name="apellido" placeholder="Introduce el apellido del usuario..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="email" name="email" placeholder="Introduce el email del usuario..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="password" id="passwd" name="passwd"  placeholder="Introduce la constraseña del usuario..."/>
                        </div>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="tipoemp" name="tipoemp"  placeholder="Introduce el tipo de empleado (Camarero/Administrador)"/>
                        </div>
                    <button class="botonlogin" type="submit" id="enviar" value="enviar">Crear empleado</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/gestion_usuarios.php'" type="submit" name="volver" value="volver">Volver a la lista de usuarios</button>
            </div>
        </div>
    </div>
</body>
</html>