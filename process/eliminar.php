<?php 
include '../services/conexion.php';
$id_incidencia=$_REQUEST['id_incidencia'];
$stm= $pdo->prepare("DELETE  FROM tbl_incidencia WHERE id_incidencia=:id_incidencia");
$stm->bindParam(':id_incidencia',$id_incidencia);
$stm->execute();
header('location: ../process/incidenciaxd.php');
