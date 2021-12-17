<?php
//transacciones SQL en ejecucciones, no hace falta en las que sean directas(?)
require_once '../services/conexion.php';
session_start();
if (empty($_GET['id_mesa'])) {
    header("location: ../view/gestion_mesas.php");
}else{
    $id=$_GET['id_mesa'];
    $sentencia=$pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mesa=:id");
    $sentencia->bindParam(":id_mesa",$id);
    $sentencia->execute();
    $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM tbl_mesa WHERE id_mesa='{$id}'");
        $pdo->commit();
        header("location:../view/gestion_mesas.php");
    }
    catch(Exception $e){
        $pdo->rollBack();
        echo "Fallo: " . $e->getMessage();
    }
}
