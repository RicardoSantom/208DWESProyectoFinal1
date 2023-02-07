<?php
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if(isset($_REQUEST['tecnologias'])){
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];
?>

