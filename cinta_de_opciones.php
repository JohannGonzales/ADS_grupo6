<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/miestilo.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/formats.css" type="text/css">
    <title></title>
</head>

<body>
    <nav id='cssmenu'>
        <ul>

            <!-- INICIO -->
            <li><a href='main_menu.php'>Inicio</a></li>

            <!-- Convocatorias de proyectos -->
            <li class='active'><a href='#'>Convocatorias de proyectos</a>
                <!-- OPCION CONVOCATORIA DE PROYECTOS -->
                <ul>
                    <!-- Revisar la lista de convocatorias, todos pueden hacer esto -->
                    <li><a href='convocatoria_main.php'>Revisar Convocatorias</a></li>

                    <?php
                    if ($_SESSION["Perfil"]=="1"){
                        // ver las postulaciones con el ID del usuario
                        echo ("<li><a href='work_in_progress.php'>Revisar mis consultas</a></li>");
                        echo ("<li><a href='mis_postulaciones.php'>Revisar mis postulaciones</a></li>");

                    // // opciones del AND (Autirodidad Nacional Designada)
                    // } elseif ($_SESSION["Perfil"]=="2"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'>################</a></li>");

                    // opciones del CE (###############3)
                    } elseif ($_SESSION["Perfil"]=="3"){
                        // registrar convocatoria
                        echo("<li><a href='listaconcursos.php'>Concursos en proceso de evaluación</a></li>");


                    // // opciones del DIGE
                    // } elseif ($_SESSION["Perfil"]=="4"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'> #####################</a></li>");
                    //
                    // // opciones del DAF
                    // } elseif ($_SESSION["Perfil"]=="5"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'> ################ </a></li>");
                    //
                    // // opciones del DIME
                    // } elseif ($_SESSION["Perfil"]=="6"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'> ############## </a></li>");
                    //
                    // // opciones del Administrador
                    // } elseif ($_SESSION["Perfil"]=="7"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'> ############## </a></li>");
                    //
                    // // opciones del DE
                    // } elseif ($_SESSION["Perfil"]=="8"){
                    //     // registrar convocatoria
                    //     echo("<li><a href='work_in_progress.php'> ############## </a></li>");

                    }
                    ?>

                </ul>
            </li>

            <!-- Selección de Proyectos -->
            <li><a href='#'>Selección de Proyectos</a>
                <ul>
                    <?php

                    // opciones del AND (Autirodidad Nacional Designada)
                    if ($_SESSION["Perfil"]=="2"){
                        // registrar convocatoria
                        echo("<li><a href='etapa1.php'>Aprobación de concursos y comités</a></li>");

                        // opciones del DE
                    } elseif ($_SESSION["Perfil"]=="8"){
                        // registrar convocatoria
                        echo("<li><a href='etapa1.php'> Aprobación de concursos y comités </a></li>");
                    }

                    ?>
                </ul>

            </li>

            <li><a href='logout.php'>Salir del Sistema</a></li>

        </ul>
    </nav>

</body>

</html>
