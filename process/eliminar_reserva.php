<?php 
include '../services/conexion.php';
$id_reserva=$_REQUEST['id_reserva'];
$id_mesa=$_REQUEST['id_mesa'];
$stm= $pdo->prepare("DELETE  FROM tbl_reserva WHERE id_reserva =:id_reserva");
$stm->bindParam(':id_reserva',$id_reserva);
$stm->execute();
header("location: ../process/reservas.php?id_mesa=$id_mesa");
