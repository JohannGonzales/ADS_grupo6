<!DOCTYPE html>

<?php
$userId = $_POST["userDNI"];
$userPassword = substr($_POST["userBirthday"],0,4) *substr($_POST["userBirthday"],5,2)+substr($_POST["userBirthday"],8,2)
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

        <h2 style="text-align:center;color:black">Confirmar datos</h2>

        <p style="text-align:left">Documento de Identidad (DNI):</p>
        <div style="text-align:center; color:white"><?php echo $_POST["userDNI"] ?></div>

        <p style="text-align:left">Nombres:</p>
        <div style="text-align:center; color:white"><?php echo $_POST["userName"] ?></div>

        <p style="text-align:left">Apellidos (DNI):</p>
        <div style="text-align:center; color:white"><?php echo $_POST["userSurname"] ?></div>

        <p style="text-align:left">Fecha de Nacimiento:</p>
        <div style="text-align:center; color:white"><?php echo $_POST["userBirthday"] ?></div><br>

        <div style="text-align:center">
            <form action="results.php" method="POST">
                <input type="hidden" name="userId" value="<?php  echo $userId; ?>">
                <input type="hidden" name="userPassword" value="<?php  echo $userPassword; ?>">
                <input type="hidden" name="userName" value="<?php  echo $userName; ?>">
                <input type="hidden" name="userSurname" value="<?php  echo $userSurname; ?>">
                <input type="hidden" name="userBirthday" value="<?php  echo $userBirthday; ?>">

                <!-- boton atras -->
                <button class="w3-btn w3-ripple w3-red" type="button" onclick="history.back(-1)">Atrás</button>
                <!-- boton confirmar -->
                <button class="w3-btn w3-ripple w3-green" type="submit">CONFIRMAR</button>

            </form>

        </div>

    </div>

</body>

</html>


<!-- CALCULANDO EL USUARIO Y CONTRASEÑA PARA PASARLOS A results.php -->
