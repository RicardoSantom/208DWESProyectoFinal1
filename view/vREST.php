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
    <article>
        <h1>REST</h1>
        <section>
            <h2>Esta vista está aún en desarrollo</h2>
            <form id="formRest" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button type="submit" name="volver" id="volver" value="volver">Volver</button>
            </form>

            <?php echo ("<h3>Página anterior</h3>" . $_SESSION['paginaAnterior']); ?>
            <?php echo ("<h3>Página en curso</h3>" . $_SESSION['paginaEnCurso']); ?>
        </section>
    </article>
</main>