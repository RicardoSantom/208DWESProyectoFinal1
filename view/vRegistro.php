<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <form id="formInicioPrivado" name="formInicioPrivado" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <table id="bienvenida">
            <caption>Registro Usuario</caption>
            <tbody>
                <tr>
                    <th class="alfabetica"><label for = "usuario">Usuario:</label></th>
                    <th class="numerica"><input style = "background: #ffffcc" type = "text" id="usuario" name = "usuario" class="error"/></th>
                    <td style="color: red;"> <?php echo $aErrores['usuario']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for = "password">Contraseña:</label></th>
                    <th class="numerica"><input style = "background: #ffffcc" id="password" type = "password" name = "password" class="error"/></th>
                    <td style="color: red;"> <?php echo $aErrores['password']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for = "repetirPassword">Vuelva a introducir la contraseña:</label></th>
                    <th class="numerica"><input style = "background: #ffffcc" id="repetirPassword" type = "password" name = "repetirPassword" class="error"/></th>
                    <td style="color: red;"> <?php echo $aErrores['repetirPassword']; ?></td>
                </tr>
                <tr>
                    <th class="alfabetica"><label for = "descripcion">Descripción:</label></th>
                    <th class="numerica"><input style = "background: #ffffcc" placeholder="Máximo 60 caracteres" id="descripcion" type = "text" name = "descripcion" class="error"/></th>
                    <td style="color: red;"> <?php echo $aErrores['descripcion']; ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td class="alfabetica">
                        <input type = "submit" id = "registro" value = "Registrarse" name = "registro">
                    </td>
                    <td class="alfabetica"></td>
                    <td class="alfabetica">
                        <input type = "submit" id = "cancelar" name = "cancelar" value = "Cancelar">
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
     <div id="captcha" class="captcha">
        <p>DEMUESTRA QUE NO ERES UN ROBOT:</p>
        <div id="num1" class="cuestion"></div>
        <div class="cuestion">+</div>
        <div id="num2" class="cuestion"></div>
        <div class="cuestion">=</div>
        <div class="cuestion resultado"></div>

        <div id="sol1" class="opcaptcha"></div>
        <div id="sol2" class="opcaptcha"></div>
        <div id="sol3" class="opcaptcha"></div>
    </div>
    <script defer src="webroot/js/validacion.js"></script>
</main>