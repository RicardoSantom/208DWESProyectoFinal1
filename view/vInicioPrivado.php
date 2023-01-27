<form name = "formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
    <input type="submit"  id="login" value="" name="login">
    <input type="submit" id="detalle" value="Detalle" name="detalle">
    <input type="submit" id="salirInicioPrivado" value="Salir" name="salir">
</form>
<article>
    <h2 id="bienvenida"><?php  echo "Bienvenido " . $_SESSION['User204DWESProyectoFinal']->getDescUsuario(); ?> -</h2>
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