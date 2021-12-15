<?php
    include '../services/conexion.php';

    $id_mesa=$_REQUEST['id_mesa'];
    $estado=$_REQUEST['select'];
    $id_sala=$_REQUEST['id_sala'];
    
    switch($estado){
        case "Activa":
            $sql=$pdo->prepare("UPDATE tbl_mesa SET estado=:estado WHERE id_mesa=:id_mesa");
            $sql->bindParam(':estado',$estado);
            $sql->bindParam(':id_mesa',$id_mesa);
            $sql->execute();
            break;
        case "Mantenimiento":
            $sql=$pdo->prepare("UPDATE tbl_mesa SET estado=:estado WHERE id_mesa=:id_mesa");
            $sql->bindParam(':estado',$estado);
            $sql->bindParam(':id_mesa',$id_mesa);
            $sql->execute();
            break;
    }
    header("Location: ../process/sala.php?id_sala=$id_sala");
?>