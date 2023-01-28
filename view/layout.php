<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <meta name="copyright" content="Ricardo Santiago Tomé" />
        <meta name="keywords" content="desarrollo,software,servidor,cliente,PHP,HTML,CSS,JavaScript,MySQL,aplicacion,web"/>
        <meta name="description" content="Aplicacion de control de acceso y navegación LoginLogoff, práctica 2ºDAW IES Los Sauces, Benavente"/>
        <link href="webroot/css/fonts.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="webroot/css/estilos.css"/>
        <link rel="stylesheet" href="webroot/css/estilosVistaDetalle.css"/>
        <link rel="stylesheet" href="webroot/css/estilosLogin.css"/>
        <link rel="stylesheet" href="webroot/css/estilos<?php echo ucfirst($_SESSION['paginaEnCurso']) ?>.css"/>
        <title><?php echo ucfirst($_SESSION['paginaEnCurso']) ?></title>
    <style>
            .volver {
                width: 33px;
                height: 33px;
                margin-top: 15px;
            }
            .formulario{
                border: none;
            }
            header{
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            tbody {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .encabezado-layout {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }
        </style>
    </head>
    <body>
         <footer>
            <p>2022-23 IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé </a> © Todos los derechos reservados</p>
            <p>|</p>
            <a href="https://github.com/RicardoSantom/208DWESProyectoFinal1" target="blank" id="github" title="RicardoSantom en GitHub"></a>
            <p>|</p>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim"  target="_blank"></a>
            <p>|</p>
            <a href="http://daw208.ieslossauces.es/doc/curriculumRicardo.pdf"  title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <p>|</p>
            <div>Esta página <strong>pretende</strong> emular a: <a href="https://www.elganso.com/es/" id="ganso" target="_blank" title="Enlace a página web El Ganso">"El Ganso"</a></div>
        </footer>      
        <script defer src="webroot/js/Reloj.js"></script>
    </body>
</html>

