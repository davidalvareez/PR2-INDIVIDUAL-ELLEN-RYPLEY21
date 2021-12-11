<?php
    require_once '../services/conexion.php';
    
    session_start();
    //Evitar que accedan desde url ya que es pagina admin
    /*if (!$_SESSION['tipo_user']==2) {
        header("location:login.php");
    }*/
    if (empty($_GET['id_emp'])){
        header("location:../view/gestion_usuarios.php");
    }else{
        $id=$_GET['id_emp'];
        $sentencia=$pdo->prepare("SELECT * FROM tbl_empleado WHERE id_emp=:id_emp");
        $sentencia->BindParam(":id_emp",$id);
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
    <title>Modificar empleado</title>
</head>
<body class="fondoimg2">
    <div class="contenido">
        <div class="row flex-cv">
            <div class="cuadro_modificar_voluntario">
                <form class="formulario_inscripcion"  action="../process/modificarempleado.proc.php" method="post" onsubmit="return validarModificarUser()">
                    <h1 class="h1login">¡Formulario modificar empleado!</h1>
                        <br>
                        <?php
                            if (empty($comprobacion)) {
                                //Si la query fue mal nos vamos a la vista de nuevo
                                header("location:../view/gestion_usuarios.php");
                            }else{
                                foreach ($comprobacion as $row){
                                    //Si fue bien guardamos todo en variable y los mostramos en los valores
                                    $id=$row['id_emp'];
                                    $nombre=$row['nombre_emp'];
                                    $apellido=$row['apellido_emp'];
                                    $email=$row['email_emp'];
                                    $tipoemp=$row['tipo_emp'];
                                }
                            }
                        ?>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" placeholder="Introduce el nombre del camarero o administrador..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>" placeholder="Introduce el apellido del camarero o administrador..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="Introduce el email del camarero o administrador..."/>
                        </div>
                        <br>
                        <div class="form-element">
                            <input class="inputlogin" type="text" id="tipoemp" name="tipoemp" value="<?php echo $tipoemp; ?>" placeholder="Introduce el tipo de empleado (Camarero/Administrador)"/>
                            <input class="inputlogin" type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        </div>
                    <button class="botonlogin" type="submit" name="login" value="login">Modificar empleado</button>
                    <br><br>
                </form>
                <button class="botonloginvolver" onclick="location.href='../view/gestion_usuarios.php'" type="submit" name="volver" value="volver">Volver a la lista de usuarios</button>
            </div>
        </div>
    </div>
</body>
</html>