<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" id = "formInicioPrivado" method = "post">
        <table id="bienvenida">
            <caption>Editar perfil usuario</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="codigoUsuario">Código Usuario:</label></th>
                    <th class="numerica"><input type="text" style="background: #cccccc" name="codigoUsuario" id="codigoUsuario"
                                                value="<?php echo $aVistaMiCuentaDatosUsuario['codUsuario']; ?>" readonly/></th>
                    <th></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="descripcionUsuario">Descripción Usuario:</label></th>
                    <th class="numerica"><input type="text" style="background: #ffffcc" name="descripcion" id="descripcion"
                                                value="<?php echo $aVistaMiCuentaDatosUsuario['descUsuario']; ?>"/></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['descripcion']; ?></th>
                </tr>
                <tr>
                    <td><input type="submit" id="aceptar" value="Aceptar" name="aceptar"></td>
                    <td class="alfabetica"></td>
                    <td><input type="submit" id="cancelar" value="Cancelar" name="cancelar"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="alfabetica"><input type="submit" id="cambiarPassword" value="Cambiar Contraseña" name="cambiarPassword"></td>
                    <td class="alfabetica"></td>
                    <td class="alfabetica"><input type="submit" id="borrarUsuario" value="Borrar Usuario" name="borrarUsuario"></td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>