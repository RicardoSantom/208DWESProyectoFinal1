<?php
/**
 * Description Página que muestra un mensaje informando que el recurso solicitado está en desarrollo
 * @author Ricardo Santiago Tomé
 * @since 27/01/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Aplicación LoginLogoff</h1>
    <h3>Vista REST</h3>
</header>
<main>
    <div id="divRest">
        <h2>REST</h2>
            <p>Esta vista está aún en desarrollo</p>
            <h3>Página anterior: <span><?php echo ($_SESSION['paginaAnterior']); ?></span></h3>
            <h3>Página en curso: <span><?php echo ($_SESSION['paginaEnCurso']); ?></span></h3>
            <form id="formRest" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            </form>
    </div>
</main>