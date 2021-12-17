<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        $id_incidencia=$_GET['id_incidencia'];?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/styles.css">
            <link rel="stylesheet" href="../css/stylesextras.css">
            <title>Formulario actualizar</title>
        </head>
        <body class="fondosala2">
        <form action="../process/modificarmantenimiento.php" method="get">
                    <h1 class="titulomodif">Modificar la descripcion</h1>
                    <input class="inputactualizar" type="text" name="descripcion" id="total" placeholder="Escribe la descripcion">
                    <input type="hidden" name="id_incidencia" value="<?php echo $id_incidencia ;?>">
                    <br><br>
                    <input class= "botonessala" type="submit" value="Enviar" name="submit">
                </form>

        </body>
        </html>
        <?php
    }else{
        header('Location: ../view/login.php');
    }
