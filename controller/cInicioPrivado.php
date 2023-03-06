<?php

/**
 * Utilizo el método array_push para introducir los valores devueltos
 * por los getters para el objeto usuario.
 */
$aVistaDatosUsuarioInicioPrivado =[
    'codUsuario' => ($_SESSION['User208DWESProyectoFinal']->getCodUsuario()),
    'password' => ($_SESSION['User208DWESProyectoFinal']->getPassword()),
    'descUsuario' => ($_SESSION['User208DWESProyectoFinal']->getDescUsuario()),
    'numConexiones' => ($_SESSION['User208DWESProyectoFinal']->getNumconexiones()),
    'fechaHoraUltimaConexion' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion()),
    'fechaHoraUltimaConexionAnterior' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior()),
    'perfil' => $_SESSION['User208DWESProyectoFinal']->getPerfil(),
    'imagenUsuario'=>$_SESSION['User208DWESProyectoFinal']->getImagenUsuario()
];

if (isset($_REQUEST['salir'])) {
    $_SESSION['paginaEnCurso'] = 'inicioPublico';
    $_SESSION['User208DWESProyectoFinal'] = null;
    session_destroy();
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['detalle'])) {
    $_SESSION['paginaEnCurso'] = 'detalle';
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['error'])) {
    DBPDO::ejecutarConsulta("Select * from meInventoElNombreDeUnaTablaQueNoExiste;");
}
if (isset($_REQUEST['editar_Perfil'])) {
    $_SESSION['paginaEnCurso'] = 'miCuenta';
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['mtoDepartamentos'])) {
    //Si no hay valor guardado en la sesión de una búsqueda en MtoDepartamentos
    if ($_SESSION['criterioBusquedaDepartamento'] == null) {
        /*
         * Guarda en la sesión la búsqueda como vacía, para que al entrar por
         * primera vez, muestre todos los departamentos.
         */
        $_SESSION['criterioBusquedaDepartamento'] = "";
    }
    $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['mtoUsuarios'])) {
    $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['rest'])) {
    $_SESSION['paginaEnCurso'] = 'rest';
    $_SESSION['paginaAnterior'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if (isset($_REQUEST['tecnologias'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];
