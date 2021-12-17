<?php
require_once '../services/conexion.php';
session_start();
if(empty($_REQUEST['id'])){
    header("location: ../view/gestion_usuarios.php");

}else{
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $email=$_POST['email'];
    $tipoemp=$_POST['tipoemp'];
    //Ejecutamos la sentencia de actualizar voluntario con dicho dni
    $sentencia=$pdo->prepare("UPDATE tbl_empleado SET nombre_emp='{$nombre}',apellido_emp='{$apellido}',email_emp='{$email}',tipo_emp='{$tipoemp}' WHERE id_emp='{$id}'");
    $sentencia->execute();
    header("location:../view/gestion_usuarios.php");
}
