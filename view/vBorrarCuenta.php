<?php
/**
 * Description Vista que muestra un usuario a ser borrado
 * 
 * @author Ricardo Santiago Tomé
 * @since 05/03/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Aplicación Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form id = "formInicioPrivado" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table id="bienvenida">
            <caption>¿Desea eliminar el siguiente Usuario?</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="codUsuario">Codigo: </label></th> 
                    <th class="numerica"><input type="text" id="codUsuario" name="codUsuario" 
                                                value="<?php echo $aVistaBorrarCuentaDatosUsuario['codUsuario'] ?? '' ?>"
                                                readonly style="background-color: #cccccc;"/></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descUsuario">Descripcion: </label></th>
                    <th class="numerica"><input type="text" id="descUsuario" name="descUsuario" 
                                                value="<?php echo $aVistaBorrarCuentaDatosUsuario['descUsuario'] ?? '' ?>" 
                                                readonly style="background-color: #cccccc;"/></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="numConexiones">Número de conexiones: </label></th>
                    <th class="numerica"><input id="numConexiones" type="text" name="numConexiones" 
                                                value="<?php echo $aVistaBorrarCuentaDatosUsuario['numConexiones'] ?? '' ?>"
                                                readonly style="background-color:#cccccc;"/></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="fechaHoraUltimaConexion">Fecha última conexión: </label></th>
                    <th class="numerica"><input type="text" name="fechaHoraUltimaConexion" 
                                                value="<?php echo date_format($aVistaBorrarCuentaDatosUsuario['fechaHoraUltimaConexion'], 'Y-m-d') ?? '' ?>"
                                                readonly style="background-color: #cccccc;"/></th>
                </tr>
                <?php if (! is_null($aVistaBorrarCuentaDatosUsuario['fechaHoraUltimaConexionAnterior'])) { ?>
                    <tr>
                        <th class="alfabetica"><label for="fechaHoraUltimaConexionAnterior">Fecha última conexión anterior: </label></th>
                        <th class="numerica"><input type="text" name="fechaHoraUltimaConexionAnterior" 
                                                    value="<?php echo date_format($aVistaBorrarCuentaDatosUsuario['fechaHoraUltimaConexionAnterior'], 'Y-m-d')
                                                            ?? '' ?>" readonly style="background-color: #cccccc;"/></th>
                    </tr>             
                <?php } else {
                    ?>
                <?php } ?>
                <tr>
                    <th class="alfabetica"><label for="perfil">Perfil: </label></th>
                    <th class="numerica"><input type="text" name="perfil" title="¿ESTÁ SEGURO DE ELIMINAR ESTE USUARIO?"
                                                value="<?php echo $aVistaBorrarCuentaDatosUsuario['perfil'] ?? '' ?>"
                                                id="perfil"  readonly style="background-color: #cccccc;"/></th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="alfabetica"><input type="submit" value="Cancelar" name="cancelar" id="cancelar"/></td>
                    <td class="alfabetica"><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>