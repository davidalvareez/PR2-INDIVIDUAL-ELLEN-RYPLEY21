<?php
    require_once '../services/conexion.php';
    session_start();
    $fecha=$_POST['fecha'];
    $id_mesa=$_POST['id_mesa'];
    $horainicio=$_POST['horainicio'];
    $id_sala=$_POST['id_sala'];

    $horamas=strtotime('+1 hours',strtotime($horainicio));
    $horamas=date('H:i',$horamas);

    $horamenos=strtotime('-1 hours',strtotime($horainicio));
    $horamenos=date('H:i',$horamenos);

    $horamas2=strtotime('+2 hours',strtotime($horainicio));
    $horamas2=date('H:i',$horamas2);

    $sentenciacomprobar=$pdo->prepare("SELECT id_reserva FROM tbl_reserva WHERE data_reserva='{$fecha}' AND (hora_reserva BETWEEN '{$horamenos}' AND '{$horamas}')");
    $sentenciacomprobar->execute();
    $sentenciacomprobar=$sentenciacomprobar->fetchAll(PDO::FETCH_ASSOC);

    if(empty($sentenciacomprobar)) {
        $sentencia=$pdo->prepare("INSERT INTO tbl_reserva(data_reserva, hora_reserva, hora_fi_reserva, id_mesa) VALUES('{$fecha}', '{$horainicio}', '{$horamas2}', '{$id_mesa}')");
        $sentencia->execute();
        header("location:../view/control_sala.php");
   }else {
     header("location:../process/reservas.php?Enviar=Enviar&id_sala={$id_sala}&id_mesa={$id_mesa}&error=1");
   }