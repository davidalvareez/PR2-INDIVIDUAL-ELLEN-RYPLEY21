<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {
        if (empty($_GET['id_mesa'])){
            header("location:../process/gestion_mesas.php");
        }else{
            $id=$_GET['id_mesa'];
            $sentencia=$pdo->prepare("SELECT capacidad, estado, id_sala FROM tbl_mesa WHERE id_mesa=:id_mesa");
            $sentencia->BindParam(":id_mesa",$id);
            $sentencia->execute();
            $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        }
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
    <title>Modificar mesa</title>
</head>
<body class="login">
    <table class="contenedor_botones_principales_sala">
        <td>
            <button class="boton_sala" onclick="location.href='../view/gestion_mesas.php'">Volver a la lista de las mesas</button>
        </td>
    </table>
        <div class="row flex-cv">
            <div class="cuadro_formulario_mesa_user">
                <form class="formulario_inscripcion"  action="../process/modificarmesa.proc.php" method="post" enctype="multipart/form-data" onsubmit="return validarModificarMesa()">
                    <h1 class="h1_login">Modificar una mesa</h1>
                        <br>
                        <?php
                            if (empty($comprobacion)) {
                                //Si la query fue mal nos vamos a la vista de nuevo
                                header("location:../process/gestion_mesas.php");
                            }else{
                                foreach ($comprobacion as $row){
                                    //Si fue bien guardamos todo en variable y los mostramos en los valores
                                    $id=$_GET['id_mesa'];
                                    $estado=$row['estado'];
                                    $capacidad=$row['capacidad'];
                                    $idsala=$row['id_sala'];
                                }
                            }
                        ?>
                        <div class="form-element">
                            <input class="input_login" type="text" id="capacidad" name="capacidad" value="<?php echo $capacidad; ?>" placeholder="Introduce la capacidad de la mesa..."/>
                        </div>
                        <br><br>
                        <div class="form-element"> 
                            <?php
                                switch ($idsala) {
                                    case 1:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="1">Sala actual (Sala 2)</option>
                                                <option value="2">Sala 4</option>
                                                <option value="3">Sala 6</option>
                                                <option value="4">Sala 8</option>
                                                <option value="5">Sala 10</option>
                                                <option value="6">Sala Reservado</option>
                                            </select>
                                        <?php
                                        break;
                                    case 2:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="2">Sala actual (Sala 4)</option>
                                                <option value="1">Sala 2</option>
                                                <option value="3">Sala 6</option>
                                                <option value="4">Sala 8</option>
                                                <option value="5">Sala 10</option>
                                                <option value="6">Sala Reservado</option>
                                            </select>
                                        <?php
                                        break; 
                                    case 3:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="3">Sala actual (Sala 6)</option>
                                                <option value="1">Sala 2</option>
                                                <option value="2">Sala 4/option>
                                                <option value="4">Sala 8</option>
                                                <option value="5">Sala 10</option>
                                                <option value="6">Sala Reservado</option>
                                            </select>
                                        <?php
                                        break;  
                                    case 4:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="4">Sala actual (Sala 8)</option>
                                                <option value="1">Sala 2</option>
                                                <option value="2">Sala 4</option>
                                                <option value="3">Sala 6</option>
                                                <option value="5">Sala 10</option>
                                                <option value="6">Sala Reservado</option>
                                            </select>
                                        <?php
                                        break;
                                    case 5:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="5">Sala actual (Sala 10)</option>
                                                <option value="1">Sala 2</option>
                                                <option value="2">Sala 4</option>
                                                <option value="3">Sala 6</option>
                                                <option value="4">Sala 8</option>
                                                <option value="6">Sala Reservado</option>
                                            </select>
                                        <?php
                                        break;
                                    case 6:
                                        ?>
                                            <select class="input_login" id="nombresala" name="nombresala">
                                                <option selected value="6">Sala actual (Sala Reservado)</option>
                                                <option value="1">Sala 2</option>
                                                <option value="2">Sala 4</option>
                                                <option value="3">Sala 6</option>
                                                <option value="4">Sala 8</option>
                                                <option value="5">Sala 10</option>
                                            </select>
                                        <?php
                                        break;  
                                }
                            ?>
                        </div>
                        <br><br>
                        <div class="form-element">
                            <input class="input_login" type="file" id="img" name="img" placeholder="Introduce la foto de la mesa"/>
                            <input class="input_login" type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <br><br>
                    <button class="boton_login" type="submit" name="enviar" value="enviar">Modificar mesa</button>
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
