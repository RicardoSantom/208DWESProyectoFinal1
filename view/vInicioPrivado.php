<!--<form name = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
    <input type="submit"  id="login" value="" name="login">
    <input type="submit" id="detalle" value="Detalle" name="detalle">
    <input type="submit" id="salirInicioPrivado" value="Salir" name="salir">
</form>-->
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
                height: 94.2vh;
                display: flex;
                justify-content: center;
                flex-flow: wrap;
                align-items: flex-start;
            }
            tbody{
                padding: 10px;
            }
            td{
                font-size: 2rem;
            }
            input[type="submit"]{
                align-items: center;
                border-radius: 64px;
                display: inline-flex;
                justify-content: center;
                min-height: 2.5rem;
                padding: 0 2rem;
                width: 13rem;
                cursor: pointer;
                font-size: large;
                border: 1px solid black;
            }
            input[type="submit"]:hover{
                background: white;
            }
            .formulario{
                position: absolute;
                background: #bbbbbb;
                right: 5px;
                top: 8rem;
                border-radius: 1rem;
            }
            .imgUsuario{
                position: absolute;
                top: 4.5rem;
                right: 3rem;
                width: 3rem;
                height: 3rem;
                cursor: pointer;
            }
            /*            .imgUsuario:checked ~form {
                            right: 0;
                        }*/
            form{
                transition: all 0.5s ease;
            }
        </style>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <table class="formulario">
            <tr>
                <td colspan="2"><input type="submit" id="salir" value="Cerrar Sesion" name="salir"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="detalle" value="Detalle" name="detalle"></td>
            </tr> 
            <tr>
                <td colspan="2"><input type="submit" id="error" value="Error" name="error"></td>
            </tr> 
            <tr>
                <td colspan="2"><input type="submit" id="editar_Perfil" value="Editar Perfil" name="editar_Perfil"></td>
            </tr> 
            <tr>
                <td colspan="2"><input type="submit" id="mant_departamentos" value="Mto.Departamentos" name="mant_departamentos"></td>
            </tr> 
            <tr>
                <td colspan="2"><input type="submit" id="rest" value="Rest" name="rest"></td>
            </tr> 

        </table>
    </form>
    <article>
        <h2 id="bienvenida"><?php echo "Bienvenido " . $_SESSION['User204DWESProyectoFinal']->getDescUsuario(); ?> -</h2>
        <div id="divBienvenida">
            <div id="divBienvenidaInicio">
                <h3>Ultimo inicio de sesión: </h3>
                <p>
                    <?php
                    //comprobamos el numero de conexiones si es mayor a 1 tambien mostramos la fecha y hora de la ultima conexion
                    if ($_SESSION['User204DWESProyectoFinal']->getNumConexiones() > 1) {
                        echo $_SESSION['User204DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior();
                    } else {
                        ?>
                    </p>
                    <p>
                        <?php
                        echo 'Es la primera vez que te conectas, aún no hay una fecha guardada de tu última conexión';
                    }
                    ?>
                </p>
            </div>
            <div id="divBienvenidaTabla">
                <h3>Datos objeto usuario</h3>
                <table>
                    <caption>Datos Objeto Usuario en $_SESSION</caption>
                    <thead>
                        <tr>
                            <th>Atributo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Código usuario</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getCodUsuario() ?></td>
                        </tr>
                        <tr>
                            <td>Descripción usuario</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getDescUsuario() ?></td>
                        </tr>
                        <tr>
                            <td>Número conexiones</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getNumConexiones() ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion</td>
                            <td><?php echo date_format($_SESSION['User204DWESProyectoFinal']->getFechaHoraUltimaConexion(), 'Y-m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion Anterior</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior() ?></td>
                        </tr>
                        <tr>
                            <td>Perfil</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getPerfil() ?></td>
                        </tr>
                        <!--Añadir campo imagen en constructor y verificar en DB<tr>
                            <td>Imagen usuario</td>
                            <td><?php echo $_SESSION['User204DWESProyectoFinal']->getImagenUsuario() ?></td>
                        </tr>-->
                    </tbody>
                </table>
            </div>
            <div id="divBienvenidaConexiones">
                <h3>Número de conexiones</h3>
                <p>
                    <?php
                    if ($_SESSION['User204DWESProyectoFinal']->getNumConexiones() == 2) {
                        echo"Es la primera vez que te conectas.";
                    } else {
                        //Mostramos el numero de conexiones
                        echo"<p>Te has conectado " . $_SESSION['User204DWESProyectoFinal']->getNumConexiones() . " veces";
                    }
                    ?>
                </p>
            </div>
        </div>
    </article>
</body>
</html>