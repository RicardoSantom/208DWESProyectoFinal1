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
            body{
                margin: 0;
                padding: 0;
                height: 90vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .slider{
                width: 800px;
                height: 500px;
                border-radius: 10px;
                overflow: hidden;
            }
            .slides{
                width: 500%;
                height: 500px;
                display: flex;
            }
            .slides input{
                display: none;
            }
            .slide{
                width: 20%;
                transition: 2s;
            }
            .slide img{
                width: 800px;
                height: 500px;
            }

            /*Navegación Manual*/
            .navigation-manual{
                position: absolute;
                width: 800px;
                margin-top: -40px;
                display: flex;
                justify-content: center;
            }
            .manual-btn{
                border: 2px solid #40D3DC;
                padding: 5px;
                border-radius: 10px;
                cursor: pointer;
                transition: 1s;
            }
            .manual-btn:not(:last-child){
                margin-right: 40px;
            }
            .manual-btn:hover{
                background: #40D3DC;
            }
            #radio1:checked ~ .first{
                margin-left: 0;
            }
            #radio2:checked ~ .first{
                margin-left: -20%;
            }
            #radio3:checked ~ .first{
                margin-left: -40%;
            }
            #radio4:checked ~ .first{
                margin-left: -60%;
            }
            #radio5:checked ~ .first{
                margin-left: -80%;
            }
            #radio6:checked ~ .first{
                margin-left: -100%;
            }
            /*Navegación Automática*/
            .navigation-auto{
                position: absolute;
                display: flex;
                width: 800px;
                justify-content: center;
                margin-top: 460px;
            }
            .navigation-auto div{
                border: 2px solid #40D3DC;
                padding: 5px;
                border-radius: 10px;
                transition: 1s;
            }
            .navigation-auto div:not(:last-child){
                margin-right: 40px;
            }
            #radio1:checked ~ .navigation-auto .auto-btn1{
                background: #40D3DC;
            }
            #radio2:checked ~ .navigation-auto .auto-btn2{
                background: #40D3DC;
            }
            #radio3:checked ~ .navigation-auto .auto-btn3{
                background: #40D3DC;
            }
            #radio4:checked ~ .navigation-auto .auto-btn4{
                background: #40D3DC;
            }
            #radio5:checked ~ .navigation-auto .auto-btn5{
                background: #40D3DC;
            }
            #radio6:checked ~ .navigation-auto .auto-btn6{
                background: #40D3DC;
            }
            /*Estilos botón Iniciar Sesion*/
            .button {
                display: flex;
                border-radius: 30px;
                background-color: #2D3E52;
                border: none;
                color: #FFFFFF;
                text-align: center;
                font-size: 28px;
                padding: 20px;
                transition: all 0.5s;
                cursor: pointer;
                margin: 5px;
                align-content: center;
                align-items: center;
                justify-content: center;
            }

            .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
                font-size: 1.5rem;
            }

            .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
            }

            .button:hover span {
                padding-right: 25px;
            }

            .button:hover span:after {
                opacity: 1;
                right: 0;
            }
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

