<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Intranet ViveAmazonas</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/formats.css" type="text/css">
</head>


<body class="background">
    <?php
        session_start();
        $loginUser_toTest = $_POST["loginUser"];
        $loginPassword_toTest = $_POST["loginPassword"];

        $enlace = mysqli_connect("localhost","root","","viveamazonas");
        $query = "SELECT u.ID_Usuario, u.Password, p.ID_Perfil FROM `usuario` AS u LEFT JOIN `perfile_usuarios` AS p ON u.ID_Usuario = p.ID_Usuario WHERE u.ID_usuario='$loginUser_toTest' and u.Password='$loginPassword_toTest'";
        $resultado = mysqli_query($enlace,$query);

        $num_rows = mysqli_num_rows($resultado);

        if ($num_rows==0){
            echo "<br><font color='red'>El usuario o la contraseña no existe</font>";
            mysqli_close($enlace);
            session_destroy();
        } else{
            //// CREAMOS SESION Y VARIABLES GLOBALES PARA MOSTRAR UN CONTENIDO DINAMICO
            $registro= mysqli_fetch_row($resultado);
            mysqli_close($enlace);

            $_SESSION["ID"] = $loginUser_toTest;
            $_SESSION["Perfil"] = $registro[2]; // aqui va el ID DEL PERFIL

            // creo un perfin maestro para poder mostrar los features del sistema frente al jp
            if ($_SESSION["ID"] == "72310783"){
              $_SESSION["MASTER"] =1;
            } else{
              $_SESSION["MASTER"] =0;
            }

            // Redirecciona al menú principal
            header("location: main_menu.php");
        }
    ?>
</body>

</html>
