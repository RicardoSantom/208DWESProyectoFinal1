<header id="headerId">
    <h1>Proyecto Final</h1>
    <h2>Aplicación multicapa POO, MVC incluye uso de API Rest</h2>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" class="formulario" method = "post">
    <input type="submit" id="detalle" value="Detalle" name="detalle">
    <input type="submit" id="editar_Perfil" value="Editar Perfil" name="editar_Perfil">
    <input type="submit" id="mtoDepartamentos" value="Mto.Departamentos" name="mtoDepartamentos">
    <?php
    if ($aVistaDatosUsuario['perfil'] == 'administrador') {
        echo '<input type="submit" id="mtoUsuarios" value="Mto.Usuarios" name="mtoUsuarios">';
    }
    ?>
    <input type="submit" id="rest" value="Rest" name="rest">
    <input type="submit" id="error" value="Error" name="error">
    <input type="submit" id="salir" value="Cerrar Sesion" name="salir">
</form>      
<h2 id="bienvenida">
    <?php
    if ($_SESSION['User208DWESProyectoFinal']) {
        echo "Bienvenido " . $aVistaDatosUsuario['descUsuario'];
    }
    ?>
</h2>
<article>
    <div id="divBienvenida">
        <?php
        //comprobamos el numero de conexiones si es mayor a 1 tambien mostramos la fecha y hora de la ultima conexion
        if ($aVistaDatosUsuario['numConexiones'] > 1) {
            ?>
            <div class="divBienvenidaInicio">
                <h3>Ultimo inicio de sesión: </h3>
                <?php echo '<p>' . $aVistaDatosUsuario['fechaHoraUltimaConexionAnterior'] . '</p>';
                ?>
            </div>
            <div class="divBienvenidaTabla">
                <h3>Datos objeto usuario</h3>
                <table>
                    <caption>Datos Objeto Usuario en $_SESSION</caption>
                    <tbody>
                        <tr>
                            <td>Código usuario: </td>
                            <td><?php echo $aVistaDatosUsuario['codUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Descripción usuario: </td>
                            <td><?php echo $aVistaDatosUsuario['descUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Número conexiones: </td>
                            <td><?php echo $aVistaDatosUsuario['numConexiones'] ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion: </td>
                            <td><?php echo date_format($aVistaDatosUsuario['fechaHoraUltimaConexion'], 'Y-m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion Anterior: </td>
                            <td><?php
                                if ($aVistaDatosUsuario['fechaHoraUltimaConexionAnterior'] != null) {
                                    echo $aVistaDatosUsuario['fechaHoraUltimaConexionAnterior'];
                                } else {
                                    echo 'Aún no hay datos de su última conexión anterior.';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Perfil: </td>
                            <td><?php echo $aVistaDatosUsuario['perfil'] != null ?></td>
                        </tr>
                        <tr>
                            <td>Imagen usuario</td>
                            <td><?php echo $aVistaDatosUsuario['imagenUsuario'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="divBienvenidaConexiones">
                <h3>Número de conexiones</h3>
                <p>
                    <?php
                    if ($aVistaDatosUsuario['numConexiones'] == 1) {
                        echo"Es la primera vez que te conectas.";
                    } else {
                        //Mostramos el numero de conexiones
                        echo"<p>Te has conectado " . $aVistaDatosUsuario['numConexiones'] . " veces";
                    }
                    ?>
                </p>
            </div>
        <?php } else {
            ?>
            <div class="divBienvenidaInicio">
                <h3>Ultimo inicio de sesión: </h3>
                <p>Aún no hay una fecha registrada de su última conexión anterior</p>
            </div>
            <div class="divBienvenidaTabla">
                <h3>Datos objeto usuario</h3>
                <table>
                    <caption>Datos Objeto Usuario en $_SESSION</caption>
                    <tbody>
                        <tr>
                            <td>Código usuario: </td>
                            <td><?php echo $aVistaDatosUsuario['codUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Descripción usuario: </td>
                            <td><?php echo $aVistaDatosUsuario['descUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Número conexiones: </td>
                            <td><?php echo $aVistaDatosUsuario['numConexiones'] ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion: </td>
                            <td><?php echo date_format($aVistaDatosUsuario['fechaHoraUltimaConexion'], 'Y-m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion Anterior: </td>
                            <td><?php
                                if ($aVistaDatosUsuario['fechaHoraUltimaConexionAnterior'] != null) {
                                    echo $aVistaDatosUsuario['fechaHoraUltimaConexionAnterior'];
                                } else {
                                    echo 'Aún no hay datos de su última conexión anterior.';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Perfil: </td>
                            <td><?php echo $aVistaDatosUsuario['perfil'] != null ?></td>
                        </tr>
                        <tr>
                            <td>Imagen usuario</td>
                            <td><?php echo $aVistaDatosUsuario['imagenUsuario'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="divBienvenidaConexiones">
                <h3>Número de conexiones</h3>
                <p>
                    <?php
                    if ($aVistaDatosUsuario['numConexiones'] == 1) {
                        echo"Es la primera vez que te conectas.";
                    } else {
                        //Mostramos el numero de conexiones
                        echo"<p>Te has conectado " . $aVistaDatosUsuario['numConexiones'] . " veces";
                    }
                    ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
</article>