<?php
    include '../services/conexion.php';
    session_start();
    /* Controla que la sesión esté iniciada */
    if (!$_SESSION['nombre']=="") {?>
    <!DOCTYPE html>
    <html>   
    <head>
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/stylesextras.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="sala">
        <table class="contenedor_botones_principales_sala">
            <td>
                <button class="boton_sala" onclick="location.href='../view/control_administrador.php'">Volver al panel control</button>
                <button class="boton_sala" onclick="location.href='../process/logout.proc.php'">Logout</button>  
            </td>
        </table>
        <h1 class="h1_sala">LISTA DE INCIDENCIAS</h1>
        <div>
            <button class="boton_filtrar_user" id="myBtn">Incidencias</button>
        </div>
        </div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Tabla incidencias</h2>
            </div>
            <div class="modal-body">
                <div class="row flex-cv">
                    <div class="cuadro-figura">   
                        <?php
                            $sentencia=$pdo->prepare("SELECT * FROM tbl_incidencia");
                            $sentencia->execute(); 
                            $listaReserva=$sentencia->fetchAll(PDO::FETCH_ASSOC);
                            $lista=$listaReserva;         
                        ?>
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Hora Inicial</th>
                                <th>Descripcion</th>
                                <th>Mesa</th>
                                <th>Modificar</th>
                                <th>Eliminar</th>
                            </tr>
                            <?php
                                foreach($lista as $registro){   
                            ?>
                            <tr>
                                <td><?php echo "{$registro['id_incidencia']}";?></td>
                                <td><?php echo "{$registro['data_incidencia']}";?></td>
                                <td><?php echo "{$registro['hora_incidencia']}";?></td>
                                <td><?php echo "{$registro['desc_incidencia']}";?></td>
                                <td><?php echo "{$registro['id_mesa']}";?></td>
                                <td><button class="boton_modificar_user" onclick="location.href='../view/actualizar.php?id_incidencia=<?php echo $registro['id_incidencia']?>'">Modificar incidencia</button></td>
                                <td><button class="boton_eliminar_user" onclick="location.href='../process/eliminar.php?id_incidencia=<?php echo $registro['id_incidencia']?>'">Eliminar incidencia</button></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <script>
                            var modal = document.getElementById("myModal");

                            var btn = document.getElementById("myBtn");

                            var span = document.getElementsByClassName("close")[0];

                            btn.onclick = function() {
                            modal.style.display = "block";
                            }
                        
                            span.onclick = function() {
                            modal.style.display = "none";
                            }
                        
                            window.onclick = function(event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                            }
                        </script>
                    </div>
                </div>
            </div>
    </body>
    </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }

?>