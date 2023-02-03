<header id="headerId">
    <h1>Proyecto Final</h1>
    <h2>Aplicación multicapa POO, MVC incluyendo llamadas a API Rest</h2>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" class="formulario" method = "post">
    <input type="submit" id="detalle" value="Detalle" name="detalle">
    <input type="submit" id="editar_Perfil" value="Editar Perfil" name="editar_Perfil">
    <input type="submit" id="mtoDepartamentos" value="Mto.Departamentos" name="mtoDepartamentos">
    <input type="submit" id="rest" value="Rest" name="rest">
    <input type="submit" id="error" value="Error" name="error">
    <input type="submit" id="salir" value="Cerrar Sesion" name="salir">
</form>      
<h2 id="bienvenida">
    <?php
    if ($_SESSION['User208DWESProyectoFinal']) {
        echo "Bienvenido " . $_SESSION['User208DWESProyectoFinal']->getDescUsuario();
    }
    ?>
</h2>
<article>
    <div id="divBienvenida">
        <div id="divBienvenidaInicio">
            <h3>Ultimo inicio de sesión: </h3>
            <p>
                <?php
                //comprobamos el numero de conexiones si es mayor a 1 tambien mostramos la fecha y hora de la ultima conexion
                if ($_SESSION['User208DWESProyectoFinal']->getNumConexiones() > 1) {
                    echo $_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior();
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
                <tbody>
                    <tr>
                        <td>Código usuario: </td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getCodUsuario() ?></td>
                    </tr>
                    <tr>
                        <td>Descripción usuario: </td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getDescUsuario() ?></td>
                    </tr>
                    <tr>
                        <td>Número conexiones: </td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getNumConexiones() ?></td>
                    </tr>
                    <tr>
                        <td>Fecha Hora Ultima Conexion: </td>
                        <td><?php echo date_format($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion(), 'Y-m-d H:i:s') ?></td>
                    </tr>
                    <tr>
                        <td>Fecha Hora Ultima Conexion Anterior: </td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior() ?></td>
                    </tr>
                    <tr>
                        <td>Perfil: </td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getPerfil() ?></td>
                    </tr>
                    <tr>
                        <td>Imagen usuario</td>
                        <td><?php echo $_SESSION['User208DWESProyectoFinal']->getImagenUsuario() ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="divBienvenidaConexiones">
            <h3>Número de conexiones</h3>
            <p>
                <?php
                if ($_SESSION['User208DWESProyectoFinal']->getNumConexiones() == 2) {
                    echo"Es la primera vez que te conectas.";
                } else {
                    //Mostramos el numero de conexiones
                    echo"<p>Te has conectado " . $_SESSION['User208DWESProyectoFinal']->getNumConexiones() . " veces";
                }
                ?>
            </p>
        </div>
    </div>
</article>