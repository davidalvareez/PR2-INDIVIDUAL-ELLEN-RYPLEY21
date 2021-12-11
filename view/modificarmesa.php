<?php
    require_once '../services/conexion.php';
    
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    /*if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }*/
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
    <script src="../js/validacion_login.js"></script>
    <title>Modificar sala</title>
</head>
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_voluntario">
                <form class="formulario_inscripcion"  action="../process/modificarmesa.proc.php" method="post" enctype="multipart/form-data" onsubmit="return eventos()">
                    <h1 class="h1login">¡Formulario modificar sala!</h1>
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
                            <input class="inputlogin" type="text" id="capacidad" name="capacidad" value="<?php echo $capacidad; ?>" placeholder="Introduce la capacidad de la mesa..."/>
                        </div>
                        <br><br>
                        <div class="form-element">
                            <?php 
                                if ($estado == "Libre") {
                                    ?>
                                    <select class="inputlogin" name="estadomesa">
                                        <option selected value="<?php echo $estado; ?>">Estado actual (<?php echo $estado; ?>)</option>   
                                        <option value="Ocupada">Ocupada</option>
                                        <option value="Mantenimiento">Mantenimiento</option>
                                    </select>       
                            <?php
                                }else if ($estado == "Ocupado"){
                                    ?>
                                    <select class="inputlogin" name="estadomesa">
                                        <option selected value="<?php echo $estado; ?>">Estado actual (<?php echo $estado; ?>)</option>   
                                        <option value="Libre">Libre</option>
                                        <option value="Mantenimiento">Mantenimiento</option>
                                    </select>
                            <?php   
                                }else{
                                    ?>
                                    <select class="inputlogin" name="estadomesa">
                                        <option selected value="<?php echo $estado; ?>">Estado actual (<?php echo $estado; ?>)</option>   
                                        <option value="Libre">Libre</option>
                                        <option value="Mantenimiento">Ocupado</option>
                                    </select>
                            <?php
                                }
                            ?>
                        </div>
                        <br>
                        <div class="form-element"> 
                            <?php
                                switch ($idsala) {
                                    case 1:
                                        ?>
                                            <select class="inputlogin" name="nombresala">
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
                                            <select class="inputlogin" name="nombresala">
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
                                            <select class="inputlogin" name="nombresala">
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
                                            <select class="inputlogin" name="nombresala">
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
                                            <select class="inputlogin" name="nombresala">
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
                                            <select class="inputlogin" name="nombresala">
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
                        <div class="form-element">
                            <input class="inputlogin" type="file" id="img" name="img" placeholder="Introduce la foto de la mesa"/>
                            <input class="inputlogin" type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                        <br><br>
                    <button class="botonlogin" type="submit" name="enviar" value="enviar">Modificar mesa</button>
                    <br><br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../process/gestion_mesas.php'" type="submit" name="volver" value="volver">Volver a la lista de mesas</button>
            </div>
        </div>
    </div>
</body>
</html>