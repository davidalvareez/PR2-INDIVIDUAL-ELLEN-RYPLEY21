<?php
    require_once '../services/conexion.php';
    session_start();
    $capacidad=$_POST['capacidad'];
    $estado=$_POST['estado'];
    $idsala=$_POST['nombresala'];
    $path="../img/".$_FILES['img']['name']; 
    //En caso que subio un archivo le añadimos los datos junto con el archivo
    if (move_uploaded_file($_FILES['img']['tmp_name'],$path)) {
        $sentencia=$pdo->prepare("INSERT INTO tbl_mesa(capacidad,estado,img,id_sala) VALUES ('{$capacidad}','{$estado}','{$path}','{$idsala}')");
        $sentencia->execute();
        header("location:../view/gestion_mesas.php");
    }else{
        //En caso que no subio foto ponemos como nulo
        $sentencia=$pdo->prepare("INSERT INTO tbl_mesa(capacidad,estado,img,id_sala) VALUES ('{$capacidad}','{$estado}',NULL,'{$idsala}')");
        $sentencia->execute();
        header("location:../view/gestion_mesas.php");
    }