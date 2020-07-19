<!DOCTYPE html>

<?php

$userId_toInsert = $_POST["userId"];
$userPassword_toInsert = $_POST["userPassword"];
$userName_toInsert = $_POST["userName"];
$userSurname_toInsert = $_POST["userSurname"];
$userBirthday_toInsert = $_POST["userBirthday"];

$enlace = mysqli_connect("localhost","root","","viveamazonas");
$query = "INSERT INTO usuario (ID_Usuario, Nombre_usuario, Apellido, Fecha_nacimiento , Password) VALUES ('$userId_toInsert', '$userName_toInsert', '$userSurname_toInsert', '$userBirthday_toInsert', '$userPassword_toInsert')";
$resultado = mysqli_query($enlace,$query);

 ?>




<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet ViveAmazonas</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/formats.css" type="text/css">
</head>


<body class="background">
    <div class="w3-container w3-black w3-leftbar w3-border-teal">
        <h1 style="">Gestión de cuenta</h1>
    </div>
    <br>
    <!-- aquí empieza el form -->
    <div class="form-container">

        <h2 style="text-align:center;color:black">Cuenta registrada satisfactoriamente.</h2>
        <p style="text-align:left">Se ha registrado su cuenta con las siguientes credenciales:</p>

        <!-- Mostrando resultados -->
        <!-- <div class="blank">&nbsp</div> -->

        <div class="form-container" style="background-color:black;color:white;
                                            margin-left:15%;margin-right:15%;margin-bottom:10px">
            <p style="text-align:left">Usuario:</p>
            <div><?php echo $_POST["userId"];?></div>
            <br>
            <p style="text-align:left">Contraseña:</p>
            <div><?php echo $_POST["userPassword"];?></div>
        </div>

        <!-- <div class="blank">&nbsp</div> -->


        <!-- boton -->

        <div style="text-align:center">
            <form action="index.php" method="post">
                <button class="w3-btn w3-ripple w3-black" type="submit">OK</button>
            </form>
        </div>

    </div>


</body>

</html>
