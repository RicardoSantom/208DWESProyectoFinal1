<?php
if (isset($_REQUEST['salir'])){
    $_SESSION['paginaEnCurso']='inicioPublico';
    $_SESSION['User208DWESProyectoFinal']=null;
    session_destroy();
    header("Location: index.php"); 
    exit();
}
if(isset($_REQUEST['detalle'])){
    $_SESSION['paginaEnCurso']='detalle';
    $_SESSION['paginaAnterior']='inicioPrivado';
    header("Location: index.php"); 
    exit();
}
if(isset($_REQUEST['error'])){
     DBPDO::ejecutarConsulta("Select * from meInventoElNombreDeUnaTablaQueNoExiste;");
}
if(isset($_REQUEST['editar_Perfil'])){
    $_SESSION['paginaEnCurso']='wip';
    $_SESSION['paginaAnterior']='inicioPrivado';
    header("Location: index.php"); 
    exit();
}
if(isset($_REQUEST['mtoDepartamentos'])){
    $_SESSION['paginaEnCurso']='mtoDepartamentos';
    $_SESSION['paginaAnterior']='inicioPrivado';
    header("Location: index.php"); 
    exit();
}
if(isset($_REQUEST['rest'])){
    $_SESSION['paginaEnCurso']='rest';
    $_SESSION['paginaAnterior']='inicioPrivado';
    header("Location: index.php"); 
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