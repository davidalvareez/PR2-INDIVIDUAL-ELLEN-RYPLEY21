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

    <body class="fondosala2">
    <button class="botonessala" OnClick="location.href='../process/logout.proc.php'">Logout</button>
        <br> <br>
        <div class="row flex-cv">
             <div class="cuadro-figura">
             <h2>Incidencias (Usuario de Mantenimiento)</h2>
             <button class="botonessala" id="myBtn">Incidencias</button>
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
            <tr class="active">
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
                <td class="tdinci"><?php echo "{$registro['id_incidencia']}";?></td>
                <td class="tdinci"><?php echo "{$registro['data_incidencia']}";?></td>
                <td class="tdinci"><?php echo "{$registro['hora_incidencia']}";?></td>
                <td class="tdinci"><?php echo "{$registro['desc_incidencia']}";?></td>
                <td class="tdinci"><?php echo "{$registro['id_mesa']}";?></td>
                <td class="tdinci"><button><a class="btnmodif" href= "../view/actualizarmantenimiento.php?id_incidencia=<?php echo $registro['id_incidencia']?>" onclick="return confirm('¿Estás seguro de actualizar?')">Modificar</a></button></td>
                <td class="tdinci"><button><a class="btnelimin" href= "../process/eliminar.php?id_incidencia=<?php echo $registro['id_incidencia']?>" onclick="return confirm('¿Estás seguro de eliminar?')">Eliminar</a></button></td>
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
    </body>
    </html>
<?php
    }else{
        header('Location: ../view/login.php');
    }

?>