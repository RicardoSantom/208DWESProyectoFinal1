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
    <body>
        <header id="headerInicioPublico">
            <h1>Aplicación Final</h1>
            <h2>Multicapa, orientada a objetos, incluye microservicios</h2>
            <h3><?php echo ucfirst($_SESSION['paginaEnCurso']) ?? '' ?></h3>
            <?php require_once $aVistas[$_SESSION['paginaEnCurso']]; ?>            
            <form id="formInicioPublico" method="post">
                <fieldset id="fieldsetInicioPublico">
                    <input type="submit"  id="login" value="login" name="login">
                </fieldset>
            </form>
        </header>
        <div class="slider">
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <input type="radio" name="radio-btn" id="radio5">
                <input type="radio" name="radio-btn" id="radio6">
                <div class="slide first">
                    <img src="webroot/media/Imagen-ArbolNavegacion.PNG" alt="">
                </div>
                <div class="slide">
                    <img src="webroot/media/Imagen-DiagramaDeClasesLoginLogoff.PNG" alt="">
                </div>
                <div class="slide">
                    <img src="webroot/media/Imagen-DiagramaDeClasesMulticapa.PNG" alt="">
                </div>
                <div class="slide">
                    <img src="webroot/media/Imagen-FicherosLoginLogoff.PNG" alt="">
                </div>
                <div class="slide">
                    <img src="webroot/media/Imagen-ModeloFisicoDeDatos.PNG" alt="">
                </div>
                <div class="slide">
                    <img src="webroot/media/Imagen-RelacionDeFicheros.PNG" alt="">
                </div>
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                    <div class="auto-btn5"></div>
                    <div class="auto-btn6"></div>
                </div>
            </div>
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
                <label for="radio5" class="manual-btn"></label>
                <label for="radio6" class="manual-btn"></label>
            </div>
        </div>
        <script>
            var totalRadios = 6;
            var contador = 1;
            setInterval(function () {
                var radio = document.getElementById('radio' + contador);
                if (radio) {
                    radio.checked = true;
                    contador = (contador % totalRadios) + 1;
                }
            }, 5000);
        </script>
    </body>
</html>

