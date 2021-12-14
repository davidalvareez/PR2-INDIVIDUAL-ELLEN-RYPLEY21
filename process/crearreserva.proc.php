<?php
    require_once '../services/conexion.php';
    session_start();
    $fecha=$_POST['fecha'];
    $horainicio=$_POST['horainicio'];
    $horaentradafin	= strtotime ( "2 hours" , strtotime ( $horainicio ) ) ;
    $horafinal 	= date ( 'H:i' , $horaentradafin );
    $id_mesa=$_POST['id_mesa'];

    $sentenciacomprobar=$pdo->prepare("SELECT id_reserva FROM tbl_reserva WHERE hora_reserva = '$horainicio' ");
    $sentenciacomprobar->execute();
    $sentenciacomprobar=$sentenciacomprobar->fetchAll(PDO::FETCH_ASSOC);

    if(empty($sentenciacomprobar)) {
        $sentencia=$pdo->prepare("INSERT INTO tbl_reserva (data_reserva, hora_reserva, hora_fi_reserva, id_mesa) VALUES('{$fecha}', '{$horainicio}', '{$horafinal}', '{$id_mesa}')");
        $sentencia->execute();
        header("location:../view/control_sala.php");
   } else {
        echo "existe ya";
        die;
        echo "<script>alert('xexsfs')</script>";
        header("location:../view/gestion_usuarios.php");

   }
    
    