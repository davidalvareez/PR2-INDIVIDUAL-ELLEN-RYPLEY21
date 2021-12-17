<?php
require_once '../services/conexion.php';
session_start(); 
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $passwd=$_POST['passwd'];
    $passMD5=md5($passwd);
    $tipoemp=$_POST['tipoemp'];
    $sentencia=$pdo->prepare("INSERT tbl_empleado(nombre_emp, apellido_emp, email_emp, pass_emp, tipo_emp) VALUES('{$nombre}', '{$apellido}', '{$email}', '{$passMD5}', '{$tipoemp}')");
    $sentencia->execute();
    header("location:../view/gestion_usuarios.php");
