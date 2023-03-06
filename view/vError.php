<?php
/**
 * Description Vista que imprime errores ocurridos durante la ejecuión
 * de la aplicación.
 * 
 * @author Ricardo Santiago Tomé
 * @since 30/01/2023
 * @version 0.1
 * ÚLitma modificación 04/03/2023
 */
?>
<header id="headerId">
    <h1>Proyecto Final</h1>
    <h3>Vista <?php echo ucfirst($_SESSION['paginaEnCurso']) ?></h3>
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
                <td><?php echo $aVistaError['error']; ?></td>
            </tr>
            <tr>
                <th>Código</th>
                <td><?php echo $aVistaError['codigo']; ?></td>
            </tr>
            <tr>
                <th>Archivo</th>
                <td><?php echo $aVistaError['archivo']; ?></td>
            </tr>
            <tr>
                <th>Línea</th>
                <td><?php echo $aVistaError['linea']; ?></td>
            </tr>
        </table>
    </div>
</main>