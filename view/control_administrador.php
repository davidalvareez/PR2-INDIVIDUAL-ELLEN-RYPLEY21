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
    <title>Control Sala</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body class="control_sala">
    <div class="row flex-cv">
        <div class="cuadro_control_sala">
            <h1 class="h1_control_sala">Panel de control administrador</h1>
            <div class="column-2">
                <button class="boton_control_sala" OnClick="location.href='../view/gestion_usuarios.php'"><h1>Gestión de usuarios</button>                    </div>
            <div class="column-2">
                <button class="boton_control_sala" OnClick="location.href='../view/gestion_mesas.php'"><h1>Gestión de mesas</h1></button>
            </div>
            <div class="column">
                <button class="boton_control_sala" OnClick="location.href='../process/logout.proc.php'"><h1>Logout</h1></button>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../view/login.php');
    }