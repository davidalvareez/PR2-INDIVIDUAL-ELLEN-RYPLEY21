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
<body class="login">
    <div class="contenidosBody">
        <table>
            <tr>
                <td class="column-2">
                    <div class="containerLoginDer">
                        <h1>LA MASIA</h1>
                        <h2>LA MASIASEWRQWYRUWQYERUIQYWRIUWQ</h2>
                    </div>
                </td>
                <td class="column-2">
                    <div class="containerLoginIzq">
                        <div class="row flex-cv">
                            <div class="cuadro_login">
                                <form class="formulario_login" action="../process/login.proc.php" method="post" onsubmit=" return validarLogin();">
                                    <h1 class="h1login">Inicio de Sesión</h1>
                                    <br>
                                    <div class="form-element">
                                        <input class="inputlogin" type="text" id="username" name="username" placeholder="Usuario..."/>
                                    </div>
                                    <br>
                                    <div class="form-element">
                                        <input class="inputlogin" type="password" id="password" name="password" placeholder="Contraseña..."/>
                                    </div>
                                    <br><br>
                                    <button class= "botonlogin" type="submit" name="register" value="register">Iniciar Sesión</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
