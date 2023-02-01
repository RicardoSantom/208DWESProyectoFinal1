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
        <link rel="stylesheet" href="webroot/css/estilosInicioPublico.css"/>
        <link rel="stylesheet" href="webroot/css/estilos<?php echo ucfirst($_SESSION['paginaEnCurso']) ?>.css"/>
        <title><?php echo ucfirst($_SESSION['paginaEnCurso']) ?></title>
        <style>
        </style>
    </head>

    <header id="headerInicioPublico">
        <p>Aplicación multicapa y orientada a objetos - 2ºDAW IES Los Sauces - Vista actual: Inicio Público</p>
        <h1>Aplicación Final</h1>
        <h2>Multicapa, orientada a objetos, incluye microservicios</h2>
        <h3>Página en curso: <?php echo ucfirst($_SESSION['paginaEnCurso']) ?? '' ?></h3>
        <?php require_once $aVistas[$_SESSION['paginaEnCurso']]; ?>            
        <form id="formInicioPublico" method="post">
            <fieldset id="fieldsetInicioPublico">
                <input type="submit"  id="login" value="login" name="login">
            </fieldset>
        </form>
    </header>
    <div class="diapositiva">
        <div class="diapositivaInterior">
            <input class="diapositivaAbrir" type="radio" id="diapositiva1" 
                   name="slide" aria-hidden="true" hidden="" checked="checked">
            <div class="diapositivaItem">
                <label>Ficheros LoginLogoff</label>
                <img src="./webroot/media/Imagen-RelacionDeFicheros.PNG">
            </div>
            <input class="diapositivaAbrir" type="radio" id="diapositiva2" 
                   name="slide" aria-hidden="true" hidden="">
            <div class="diapositivaItem">
                <label>Diagrama de clases LoginLogoff</label>
                <img src="./webroot/media/Imagen-DiagramaDeClasesMulticapa.PNG">
            </div>
            <input class="diapositivaAbrir" type="radio" id="diapositiva3" 
                   name="slide" aria-hidden="true" hidden="">
            <div class="diapositivaItem">
                <label>Árbol de navegación LoginLogoff</label>
                <img src="./webroot/media/Imagen-ArbolDeNavegación.png">
            </div>

            <input class="diapositivaAbrir" type="radio" id="diapositiva4" 
                   name="slide" aria-hidden="true" hidden="">
            <div class="diapositivaItem">
                <label>Diagrama Casos de Uso</label>
                <img src="./webroot/media/Imagen-DiagramaDeCasosDeUso.png">
            </div>
             <!--<input class="diapositivaAbrir" type="radio" id="diapositiva5" 
                   name="slide" aria-hidden="true" hidden="">
            <div class="diapositivaItem">
                <label>Diagrama De Clases</label>
                <img src="./webroot/media/Imagen-DiagramaDeClases.png">
            </div>-->
            <label for="diapositiva4" class="diapositivaControl next control-3">‹</label>
            <label for="diapositiva3" class="diapositivaControl next control-2">‹</label>
            <label for="diapositiva2" class="diapositivaControl prev control-3">›</label>
            <label for="diapositiva1" class="diapositivaControl next control-4">‹</label>
            <label for="diapositiva4" class="diapositivaControl prev control-1">‹</label>
            <label for="diapositiva3" class="diapositivaControl prev control-4">›</label>
            <label for="diapositiva2" class="diapositivaControl next control-1">‹</label>
            <label for="diapositiva1" class="diapositivaControl prev control-2">›</label>
            <ol class="diapositivaIndicador">
                <li>
                    <label for="diapositiva1" class="diapositivaCirculo">•</label>
                </li>
                <li>
                    <label for="diapositiva2" class="diapositivaCirculo">•</label>
                </li>
                <li>
                    <label for="diapositiva3" class="diapositivaCirculo">•</label>
                </li>
                <li>
                    <label for="diapositiva4" class="diapositivaCirculo">•</label>
                </li>
            </ol>
        </div>
    </div>
</html>

