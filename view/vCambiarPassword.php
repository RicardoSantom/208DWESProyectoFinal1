<header id="headerId">
    <h1>Aplicación Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form action = "<?php echo $_SERVER['PHP_SELF']; ?>" id = "formInicioPrivado"  method = "post">
        <table id="bienvenida">
            <caption>Cambiar Password</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for="viejoPassword">Contraseña Antigua:</label></th>
                    <th class="alfabetica"><input type="password" style="background: #ffffcc" name="viejoPassword" id="viejoPassword"/></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['viejoPassword']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="nuevoPassword">Contraseña Nueva:</label></th>
                    <th class="alfabetica"><input type="password" style="background: #ffffcc" name="nuevoPassword" id="nuevoPassword" /></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['nuevoPassword']; ?></th>
                </tr>
                <tr>
                    <th class="alfabetica"><label for="nuevoPassword2">Repita Contraseña Nueva:</label></th>
                    <th class="alfabetica"><input type="password" style="background: #ffffcc" name="nuevoPassword2" id="nuevoPassword2" /></th>
                    <th class="errorLibreriaValidacion" style="color: red;"> <?php echo $aErrores['nuevoPassword2']; ?></th>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <input type="submit" id="aceptar" value="Aceptar" name="aceptar">
                    </td>
                    <td class="alfabetica"></td>
                    <td>
                        <input type="submit" id="cancelar" value="Cancelar" name="cancelar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</main>