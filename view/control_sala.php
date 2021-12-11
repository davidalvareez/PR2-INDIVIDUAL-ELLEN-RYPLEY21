<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {?>
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
                        <h2 class="nombreusuario">Bienvenido: <?php echo $_SESSION['nombre'];?></h2>
                    </div>
                    <br><br>
                    <div class="column-2">
                        <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=1'"><h1>Sala 2</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=2'"><h1>Sala 4</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=3'"><h1>Sala 6</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=4'"><h1>Sala 8</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=5'"><h1>Sala 10</h1></button>
                    </div>
                    <div class="column-2">
                    <button class="btnsala" OnClick="location.href='../process/sala.php?id_sala=6'"><h1>Reservado</h1></button>
                    </div>
                    <div class="column">
                        <button class="btnsala" OnClick="location.href='../process/logout.proc.php'"><h1>Logout</h1></button>
                    </div>
                </div>
            </div>
        </body>
        </html>
    <?php
    }else{
        header('Location: ../view/login.php');
    }