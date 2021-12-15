<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="../js/validacion.js"></script>
     <title>Reserva</title>
</head>
<body>
<?php
    require_once '../services/conexion.php';
    session_start();
    $fecha=$_POST['fecha'];
    $id_mesa=$_POST['id_mesa'];
    $horainicio=$_POST['horainicio'];
    

    $horamas=strtotime('+1 hours',strtotime($horainicio));
    $horamas=date('H:i',$horamas);

    $horamenos=strtotime('-1 hours',strtotime($horainicio));
    $horamenos=date('H:i',$horamenos);

    $sentenciacomprobar=$pdo->prepare("SELECT id_reserva FROM tbl_reserva WHERE data_reserva='{$fecha}' AND (hora_reserva BETWEEN '{$horamenos}' AND '{$horamas}')");
    $sentenciacomprobar->execute();
    $sentenciacomprobar=$sentenciacomprobar->fetchAll(PDO::FETCH_ASSOC);

    if(empty($sentenciacomprobar)) {
        $sentencia=$pdo->prepare("INSERT INTO tbl_reserva(data_reserva, hora_reserva, hora_fi_reserva, id_mesa) VALUES('{$fecha}', '{$horainicio}', '{$horamas}', '{$id_mesa}')");
        $sentencia->execute();
        header("location:../view/control_sala.php");
   }else {
     echo "<script>yaReservado();</script>";
   }
   ?>
</body>
</html>
