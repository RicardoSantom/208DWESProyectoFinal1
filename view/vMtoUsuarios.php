<?php
/**
 * Summary Página de mantenimiento de usuarios.
 * 
 * @author Ricardo Santiago Tomé
 * @since 26/02/2023
 * @version 0.1
 *
 */
?>
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
</header>
<main>
    <div id="divWip">
        <h2>WIP</h2>
        <p>Esta vista está aún en desarrollo</p>
        <h3>Página anterior: <span><?php echo ($_SESSION['paginaAnterior']); ?></span></h3>
        <h3>Página en curso: <span><?php echo ( $_SESSION['paginaEnCurso']); ?></span></h3>            
        <form id="formWip" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <button type="submit" name="volver" id="volver" value="volver">Volver</button>
        </form>
    </div>
</main>