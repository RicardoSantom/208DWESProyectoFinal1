<?php
/**
 * Description Controlador para la vista de borrar cuenta
 * 
 * @author Ricardo Santiago Tomé
 * @since 27/01/2023
 * @version 0.1
 */
$aVistaBorrarCuentaDatosUsuario =[
    'codUsuario' => ($_SESSION['User208DWESProyectoFinal']->getCodUsuario()),
    'password' => ($_SESSION['User208DWESProyectoFinal']->getPassword()),
    'descUsuario' => ($_SESSION['User208DWESProyectoFinal']->getDescUsuario()),
    'numConexiones' => ($_SESSION['User208DWESProyectoFinal']->getNumconexiones()),
    'fechaHoraUltimaConexion' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion()),
    'fechaHoraUltimaConexionAnterior' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior()),
    'perfil' => $_SESSION['User208DWESProyectoFinal']->getPerfil(),
    'imagenUsuario'=>$_SESSION['User208DWESProyectoFinal']->getImagenUsuario()
];
if(isset($_REQUEST['cancelar'])){
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
if(isset($_REQUEST['eliminar'])){
    UsuarioPDO::borrarUsuario($_SESSION['User208DWESProyectoFinal']->getCodUsuario());
    $_SESSION['paginaEnCurso'] = $_SESSION['inicioPublico'];
    session_destroy();
    header('Location: index.php');
    exit(); 
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if(isset($_REQUEST['tecnologias'])){
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];