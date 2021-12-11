<?php
include '../services/conexion.php';

$desc_incidencia=$_GET['descripcion'];
$id_incidencia=$_GET['id_incidencia'];
$stmt = $pdo->prepare("UPDATE tbl_incidencia SET desc_incidencia=:desc_incidencia WHERE id_incidencia=:id_incidencia");

$stmt->bindParam(':desc_incidencia',$desc_incidencia);
$stmt->bindParam(':id_incidencia',$id_incidencia);
$stmt->execute();
header('location: ../process/incidenciaxd.php');
