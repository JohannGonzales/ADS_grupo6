<?php
session_start();
$_SESSION["Perfil"] = $_GET["chPerfil"];
header("location:main_menu.php");
 ?>
