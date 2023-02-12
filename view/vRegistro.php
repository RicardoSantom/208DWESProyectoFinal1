<?php ?>
<div class = "general">
    <div class = "form_registro">
        <h1>Registro</h1>
        <form name = "registro" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
            <table class = "formulario">
                <tr>
                    <td><label for = "usuario">Usuario:</label></td>
                    <td><input style = "background: lightyellow" type = "text" name = "usuario" class = "entradadatos"/></td>
                </tr>
                <tr>
                    <td><label for = "password">Contraseña:</label></td>
                    <td><input style = "background: lightyellow" type = "password" name = "password" class = "entradadatos"/></td>
                </tr>
                <tr>
                    <td><label for = "password">Vuelva a introducir la contraseña:</label></td>
                    <td><input style = "background: lightyellow" type = "password" name = "repeatPassword" class = "entradadatos"/></td>
                </tr>
                <tr>
                    <td><label for = "password">Descripción:</label></td>
                    <td><input style = "background: lightyellow" type = "text" name = "descripcion" class = "entradadatos"/></td>
                </tr>
                <tr>
                    <td>
                        <input type = "submit" id = "registro" value = "Crear Cuenta" name = "registro">
                    </td>
                    <td>
                        <input type = "submit" id = "volver" name = "volver" value = "Cancelar">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>