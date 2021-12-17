<?php
require_once '../services/conexion.php';
session_start();
if (empty($_GET['id_emp'])) {
    header("location: ../view/gestion_ususarios.php");
}else{
    $id=$_GET['id_emp'];
    $sentencia=$pdo->prepare("SELECT * FROM tbl_empleado WHERE id_emp=:id");
    $sentencia->bindParam(":id_emp",$id);
    $sentencia->execute();
    $comprobacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();
        $pdo->exec("DELETE FROM tbl_empleado WHERE id_emp='{$id}'");
        $pdo->commit();
        header("location:../view/gestion_usuarios.php");
    }
    catch(Exception $e){
        $pdo->rollBack();
        echo "Fallo: " . $e->getMessage();
    }
}
