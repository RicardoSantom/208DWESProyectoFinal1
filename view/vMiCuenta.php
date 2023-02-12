<div class="codigophp">
    <h1>Editar Perfil</h1>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <table class="formulario">
            <tr>
                <td><label for="codigoUsuario">Código Usuario:</label></td>
                <td><input type="text" style="background: grey" name="codigoUsuario" id="codigoUsuario" class="entradadatos" value="<?php echo $_SESSION['User208DWESProyectoFinal']->getCodUsuario(); ?>" readonly="true"/></td>
            </tr>
            <tr>
                <td><label for="descripcionUsuario">Descripción Usuario:</label></td>
                <td><input type="text" style="background: lightyellow" name="descripcion" id="descripcion" class="entradadatos" value="<?php echo $_SESSION['User208DWESProyectoFinal']->getDescUsuario(); ?>"/></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="aceptar" value="Aceptar" name="aceptar">
                    <input type="submit" id="cancelar" value="Cancelar" name="cancelar">
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="cambiarPassword" value="Cambiar Contraseña" name="cambiarPassword"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" id="borrarUsuario" value="Borrar Usuario" name="borrarUsuario"></td>
            </tr>
        </table>
    </form>
</div>