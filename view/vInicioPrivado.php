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
    if ($aVistaDatosUsuarioInicioPrivado['perfil'] == 'administrador') {
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
        echo "Bienvenido " . $aVistaDatosUsuarioInicioPrivado['descUsuario'];
    }
    ?>
</h2>
<article>
    <div id="divBienvenida">
        <?php
        //comprobamos el numero de conexiones si es mayor a 1 tambien mostramos la fecha y hora de la ultima conexion
        if ($aVistaDatosUsuarioInicioPrivado['numConexiones'] > 1) {
            ?>
            <div class="divBienvenidaInicio">
                <h3>Ultimo inicio de sesión: </h3>
                <?php echo '<p>' . date_format($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexionAnterior'],'Y-m-d H:i:s') . '</p>';
                ?>
            </div>
            <div class="divBienvenidaTabla">
                <h3>Datos objeto usuario</h3>
                <table>
                    <caption>Datos Objeto Usuario en $_SESSION</caption>
                    <tbody>
                        <tr>
                            <td>Código usuario: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['codUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Descripción usuario: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['descUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Número conexiones: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['numConexiones'] ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion: </td>
                            <td><?php echo date_format($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexion'], 'Y-m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion Anterior: </td>
                            <td><?php
                                if ($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexionAnterior'] != null) {
                                    echo date_format($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexionAnterior'],'Y-m-d H:i:s');
                                } else {
                                    echo 'Aún no hay datos de su última conexión anterior.';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Perfil: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['perfil'] ?></td>
                        </tr>
                        <tr>
                            <td>Imagen usuario</td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['imagenUsuario'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="divBienvenidaConexiones">
                <h3>Número de conexiones</h3>
                <p>
                    <?php
                    if ($aVistaDatosUsuarioInicioPrivado['numConexiones'] == 1) {
                        echo"Es la primera vez que te conectas.";
                    } else {
                        //Mostramos el numero de conexiones
                        echo"<p>Te has conectado " . $aVistaDatosUsuarioInicioPrivado['numConexiones'] . " veces";
                    }
                    ?>
                </p>
            </div>
        <?php } else {
            ?>
            <div class="divBienvenidaInicio">
                <h3>Ultimo inicio de sesión: </h3>
                <p>Esta es la primera vez que se conecta</p>
            </div>
            <div class="divBienvenidaTabla">
                <h3>Datos objeto usuario</h3>
                <table>
                    <caption>Datos Objeto Usuario en $_SESSION</caption>
                    <tbody>
                        <tr>
                            <td>Código usuario: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['codUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Descripción usuario: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['descUsuario'] ?></td>
                        </tr>
                        <tr>
                            <td>Número conexiones: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['numConexiones'] ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion: </td>
                            <td><?php echo date_format($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexion'],'Y-m-d H:i:s') ?></td>
                        </tr>
                        <tr>
                            <td>Fecha Hora Ultima Conexion Anterior: </td>
                            <td><?php
                                if ($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexionAnterior'] != null) {
                                    echo date_format($aVistaDatosUsuarioInicioPrivado['fechaHoraUltimaConexionAnterior'],'Y-m-d H:i:s');
                                } else {
                                    echo 'Aún no hay datos de su última conexión anterior.';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Perfil: </td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['perfil'] ?></td>
                        </tr>
                        <tr>
                            <td>Imagen usuario</td>
                            <td><?php echo $aVistaDatosUsuarioInicioPrivado['imagenUsuario'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="divBienvenidaConexiones">
                <h3>Número de conexiones</h3>
                <p>
                    <?php
                    if ($aVistaDatosUsuarioInicioPrivado['numConexiones'] == 1) {
                        echo"Es la primera vez que te conectas.";
                    } else {
                        //Mostramos el numero de conexiones
                        echo"<p>Te has conectado " . $aVistaDatosUsuarioInicioPrivado['numConexiones'] . " veces";
                    }
                    ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
</article>