<?php
/**
 * Description Controlador para la vista de WIP
 * @author Ricardo Santiago Tomé
 * @since 27/01/2023
 * @version 0.1
 */
// Si se pulsa en volver, regresa a la página anterior
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];
?>