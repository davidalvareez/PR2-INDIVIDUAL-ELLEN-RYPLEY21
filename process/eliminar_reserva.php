<?php 
include '../services/conexion.php';
$id_reserva=$_POST['id_reserva'];
$id_mesa=$_POST['id_mesa'];
$id_sala=$_POST['id_sala'];
$stm=$pdo->prepare("DELETE  FROM tbl_reserva WHERE id_reserva =:id_reserva");
$stm->bindParam(':id_reserva',$id_reserva);
$stm->execute();
header("location:reservas.php?Enviar=Enviar&id_sala={$id_sala}&id_mesa={$id_mesa}");