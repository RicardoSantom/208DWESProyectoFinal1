<?php
/**
 * Description Controlador para la vista de MtoUsuarios
 * @author Ricardo Santiago Tomé
 * @since 28/02/2023
 * @version 0.1
 */
// Si se pulsa en volver, regresa a la página anterior
$martir=$_SESSION['paginaEnCurso'];
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if(isset($_REQUEST['tecnologias'])){
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];