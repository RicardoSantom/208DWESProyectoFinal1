<header id="headerId">
    <h1>Aplicación Final</h1>
    <h2>Multicapa, orientada a objetos, incluye microservicios</h2>
    <h3>Página en curso: <?php echo ucfirst($_SESSION['paginaEnCurso']) ?? '' ?></h3>
    <form id="formInicioPublico" method="post">
        <fieldset id="fieldsetInicioPublico">
            <input type="submit"  id="login" value="login" name="login2">
        </fieldset>
    </form>
</header>
<form id="formLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
        <div class="divRegistroCancelar">
            <h2>YA SOY UN USUARIO REGISTRADO</h2>
            <h5 style="opacity: 0 !important;">--------</h5>
            <input type="text" name="usuario" placeholder="Usuario" class="entradadatos"/>
            <input type="password" name="password" placeholder="Contraseña" id="password" class="entradadatos" />
            <div class="inicarSesionLogin"><input type="submit" id="iniciarsesion" value="Iniciar Sesión" name="iniciarSesion"></div>
        </div>
        <div class="divRegistroCancelar">
            <h2>SOY NUEVO EN APLICACIÓN LOGINLOGOFF</h2>
            <h5><strong>REGÍSTRESE HOY!!! ES IGUAL DE GRATIS QUE MAÑANA</strong></h5>
            <p>Si pulsa el botón <strong>"registrarse"</strong> le redirigiremos a nuestro </p>
            <p><strong>formulario de registro.</strong></p>
            <div class="inicarSesionLogin"><input type="submit" id="registrarse" value="Registrarse" name="registrarse"></div>
            <div class="inicarSesionLogin"><input type="submit" id="cancelar" value="Cancelar" name="cancelar"></div>
        </div>
    </fieldset>
</form>

