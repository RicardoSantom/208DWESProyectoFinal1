<div>
    <h1>Cambiar Password</h1>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <table>
            <tr>
                <td><label for="viejoPassword">Contraseña Antigua:</label></td>
                <td><input type="password" style="background: lightyellow" name="viejoPassword" id="viejoPassword"/></td>
            </tr>
            <tr>
                <td><label for="nuevoPassword">Contraseña Nueva:</label></td>
                <td><input type="password" style="background: lightyellow" name="nuevoPassword" id="nuevoPassword" /></td>
            </tr>
            <tr>
                <td><label for="nuevoPassword2">Repita Contraseña Nueva:</label></td>
                <td><input type="password" style="background: lightyellow" name="nuevoPassword2" id="nuevoPassword2" /></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" id="aceptar" value="Aceptar" name="aceptar">
                </td>
                <td>
                    <input type="submit" id="cancelar" value="Cancelar" name="cancelar">
                </td>
            </tr>
        </table>
    </form>
</div>