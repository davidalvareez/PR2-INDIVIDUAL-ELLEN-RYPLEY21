<?php
require_once '../services/conexion.php';
session_start();

if(empty($_POST['id'])){
    header("location: ../view/gestion_mesas.php");
}else{
    $id=$_POST['id'];
    $capacidad=$_POST['capacidad'];
    $estadomesa=$_POST['estadomesa'];
    $id_sala=$_POST['nombresala'];
    
    $sentencia=$pdo->prepare("UPDATE tbl_mesa SET capacidad='{$capacidad}',estado='{$estadomesa}',id_sala='{$id_sala}' WHERE id_mesa='{$id}'");
    $sentencia->execute();
    header("location:../view/gestion_mesas.php");
}