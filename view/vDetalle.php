<!--
    Autor: Ricardo Santiago Tomé.
    Utilidad: Este programa consiste en crear una ventana de detalle.
    Fecha-última-revisión: 30-01-2023.
-->
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h2>Aplicación multicapa POO, MVC incluyendo llamadas a API Rest</h2>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <article>
        <h3>Detalle de variables superglobales <strong>+ </strong>phpinfo</h3>
        <form name="ejercicio" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="submit" id="volverPrograma" value="Volver" name="volver">
        </form>
        <?php
        /**
         * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
         * @version 1.0
         * @since 15/01/2023
         */
        require_once 'core/TablasSuperglobales.php';        
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_COOKIE, "\$_COOKIE");
        if (!empty($_SESSION) || is_null($_SESSION)) {
            ?>
        <table class="tablaGlobales"><caption><?php printf('$_SESSION') ?></caption><tbody>
                <?php
                if (is_null($_SESSION) || empty($_SESSION)) {
                    print('<thead><th  style="border:none;color:red;text-align:center;">La variable $_SESSION no guarda ningún valor</th></thead>');
                } else {
                    foreach ($_SESSION as $clave => $valor) {
                        echo '<tr>';
                        echo "<td>$clave</td><td><pre>";
                        print_r($valor);
                        echo '</pre></td></tr>';
                    }
                }
                ?>
            </tbody>
            </table>
        <?php
        } else {
            printf('<h3>La variable superglobal $_SESSION está vacía</h3>');
        }
        ?>
        <table class="tablaGlobales">
            <caption>Datos Objeto Usuario en $_SESSION, con formato personalizado</caption>
            <thead>
                <tr>
                    <th>Atributo</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Código usuario</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getCodUsuario() ?></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getPassword() ?></td>
                </tr>
                <tr>
                    <td>Descripción usuario</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getDescUsuario() ?></td>
                </tr>
                <tr>
                    <td>Número conexiones</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getNumConexiones() ?></td>
                </tr>
                <tr>
                    <td>Fecha Hora Ultima Conexion</td>
                    <td><?php echo date_format($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion(), 'Y-m-d H:i:s') ?></td>
                </tr>
                <tr>
                    <td>Fecha Hora Ultima Conexion Anterior</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior() ?></td>
                </tr>
                <tr>
                    <td>Perfil</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getPerfil() ?></td>
                </tr>
                <tr>
                    <td>Imagen usuario</td>
                    <td><?php echo $_SESSION['User208DWESProyectoFinal']->getImagenUsuario() ?></td>
                </tr>
            </tbody>
        </table>
        <?php
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_SERVER, "\$_SERVER");
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_REQUEST, "\$_REQUEST");
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_FILES, "\$_FILES");
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_ENV, "\$_ENV");
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_POST, "\$_POST");
        TablasSuperglobales::imprimirTablaVariablesSuperGlobales($_GET, "\$_GET");
        ?>
<?php phpinfo();
?>
    </article>
</main>