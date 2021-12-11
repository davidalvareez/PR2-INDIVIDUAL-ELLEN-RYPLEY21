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
            <div class="columnusuario">
                <h2 class="nombreusuario">Bienvenido</h2>
            </div>
            <br><br>
            <div class="column-2">
                <button class="btnsala" OnClick="location.href='../view/gestion_usuarios.php'"><h1>Gestión de usuarios</h1></button>
            </div>
            <div class="column-2">
            <button class="btnsala" OnClick="location.href='../view/gestion_mesas.php'"><h1>Gestión de salas</h1></button>
            </div>
            <div class="column">
                <button class="btnsala" OnClick="location.href='../process/incidenciamantenimiento.php'"><h1>Gestión de incidencias</h1></button>
            </div>
        </div>
    </div>
</body>
</html>