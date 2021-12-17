<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        require_once '../services/conexion.php';
        $email=$_POST['username'];
        $password=$_POST['password'];
        $passMD5=md5($password);
        $stmt = $pdo->prepare("SELECT * FROM tbl_empleado WHERE email_emp='$email' and pass_emp='{$passMD5}'");
        $stmt->execute();
        $comprobacion=$stmt->fetch(PDO::FETCH_ASSOC);
        try {
            if (!$comprobacion=="" && $comprobacion['tipo_emp']=="Camarero") {
                session_start();
                $_SESSION['nombre']=$comprobacion['nombre_emp'];
                header("location:../view/control_sala.php");

            }else if(!$comprobacion=="" && $comprobacion['tipo_emp']=="Administrador"){
                session_start();
                $_SESSION['nombre']=$comprobacion['nombre_emp'];
                header("Location:../view/control_administrador.php");
            }else {
                header("location: ../view/login.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }else{
        header("location: ../view/login.php");
    }