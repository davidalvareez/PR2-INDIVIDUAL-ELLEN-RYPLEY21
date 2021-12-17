<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/validacion.js"></script>
</head>
<body class="login2">
    <div class="cuadro_login2">
        <form class="formulario_login" action="../process/login.proc.php" method="post" onsubmit=" return validarLogin();">
            <h1 class="h1_login">Iniciar sesión</h1>
            <div class="form-element">
                <input class="input_login" type="text" id="username" name="username" placeholder="Usuario..."/>
            </div>
            <br>
            <div class="form-element">
                <input class="input_login" type="password" id="password" name="password" placeholder="Contraseña..."/>
            </div>
            <br><br>
            <button class= "boton_login" type="submit" name="register" value="register">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
