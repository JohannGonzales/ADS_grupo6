<!DOCTYPE html>



<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet ViveAmazonas</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/formats.css" type="text/css">
</head>


<body class="login-background">
    <!-- container vive amazonas -->
    <div class="w3-container w3-black w3-leftbar w3-border-light-green">
        <h1 style="">Intranet ViveAmazonas</h1>
    </div>
    <br>

    <!-- aquí empieza el form -->

    <div class="login-container" style="opacity:0.80;">
        <form action="validate_access.php" method="post">
            <h2 style="text-align:center;color:black">Iniciar sesión</h2>

            <!-- logo -->
            <div style="text-align:center">
                <img style="" src="img/logo viveamazonas.png" alt="">
            </div>

            <!-- Usuario y contraseña -->
            <p style="text-align:left">Usuario:</p>
            <input type="text" name="loginUser" style="width:100%"><br><br>

            <p style="text-align:left">Contraseña:</p>
            <input type="password" name="loginPassword" style="width:100%"><br><br>


            <!-- BOTON REGISTRARSE -->
            <p style="text-align:center;line-height:0">¿No estás registrado?</p>
            <p style="text-align:center;line-height:0; font-size:14px">
                <a href="create_account.html">Crear Cuenta</a>
            </p>
            <br>
            <!-- botón INGRESAR -->
            <div style="text-align:center">
                <button class="w3-btn w3-ripple w3-black" type="submit">Ingresar</button>
                <!-- <input type="submit" value="CREAR CUENTA" class="w3-button w3-yellow"> -->
            </div>
        </form>
    </div>

</body>

</html>
