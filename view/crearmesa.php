<?php
/*
    require_once '../services/conexion.php';
    session_start();
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion_login.js"></script>
    <title>Modificar</title>
</head>
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_evento">
                <form class="formulario_inscripcion"  action="../process/crearmesa.proc.php" method="post" enctype="multipart/form-data" onsubmit="return eventos()">
                    <h1 class="h1login">Formulario crear evento</h1>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="capacidad" name="capacidad" placeholder="Introduce la capacidad de la mesa..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <select class="inputlogin" name="estado">
                                <option value="Libre">Libre</option>
                                <option value="Ocupada">Ocupada</option>
                                <option value="Mantenimiento">Mantenimiento</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-element">
                            <select class="inputlogin" name="nombresala">
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
                            <input class="inputlogin" type="file" id="img" name="img" placeholder="Introduce la foto de la mesa"/>
                        </div>
                        <br>
                    <button class="botonlogin" type="submit" name="crear" value="crear">Crear mesa</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/gestion_mesas.php'" type="submit" name="volver" value="volver">Volver a la lista de mesas</button>
            </div>
        </div>
    </div>
</body>
</html>