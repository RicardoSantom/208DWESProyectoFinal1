<?php
require_once $aVistas[$_SESSION['paginaEnCurso']];
/**
 * Description Vista que imprime errores ocurridos durante la ejecuión
 * de la aplicación.
 * @author Ricardo Santiago Tomé
 * @since 30/01/2023
 * @version 0.1
 */
?>
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista REST</h3>
</header>
<main>
    <div id="divError">
        <h2>Error</h2>
        <form method="post">
            <button type="submit" name="volver" id="volver" value="volver">Cerrar y volver</button>
        </form>
        <table>
            <caption>Se han registrado los siguientes errores.</caption>
            <tr>
                <th>Error</th>
                <td><?php echo $aVError['error']; ?></td>
            </tr>
            <tr>
                <th>Código</th>
                <td><?php echo $aVError['codigo']; ?></td>
            </tr>
            <tr>
                <th>Archivo</th>
                <td><?php echo $aVError['archivo']; ?></td>
            </tr>
            <tr>
                <th>Línea</th>
                <td><?php echo $aVError['linea']; ?></td>
            </tr>
        </table>
    </div>
</main>