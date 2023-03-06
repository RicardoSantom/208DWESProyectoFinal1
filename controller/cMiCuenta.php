<?php
/*
 * Summary Controlador de la vista vMiCuenta.
 * 
 * Description Control de los input, si se pulsa cambiarPassword, redirige a la
 * vista cambiarPassword, valida o no la descripción de usuario introducida y en
 * caso de validarla, modifica los datos del usuario.
 * 
 * @author Ricardo Santiago Tomé
 * @since: 12-02-2023
 * Última modificación: 12-02-2023
 */
$aVistaMiCuentaDatosUsuario =[
    'codUsuario' => ($_SESSION['User208DWESProyectoFinal']->getCodUsuario()),
    'password' => ($_SESSION['User208DWESProyectoFinal']->getPassword()),
    'descUsuario' => ($_SESSION['User208DWESProyectoFinal']->getDescUsuario()),
    'numConexiones' => ($_SESSION['User208DWESProyectoFinal']->getNumconexiones()),
    'fechaHoraUltimaConexion' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion()),
    'fechaHoraUltimaConexionAnterior' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior()),
    'perfil' => $_SESSION['User208DWESProyectoFinal']->getPerfil(),
    'imagenUsuario'=>$_SESSION['User208DWESProyectoFinal']->getImagenUsuario()
];
$aErrores = [
    "descripcion" => null
];
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaAnterior'] = "inicioPrivado";
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
if (isset($_REQUEST['cambiarPassword'])) {
    $_SESSION['paginaAnterior'] = 'miCuenta';
    $_SESSION['paginaEnCurso'] = 'cambiarPassword';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['aceptar'])) {
    $entradaOk = true;
    //Comprobamos que el usuario no haya introducido inyeccion de codigo y los datos estén correctos
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 60, 4, OBLIGATORIO);
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
    if ($entradaOk) {
        //Comprobación de Descripción Correcta
        UsuarioPDO::modificarUsuario($_SESSION['User208DWESProyectoFinal'], $_REQUEST['descripcion']);
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
}
if (isset($_REQUEST['borrarUsuario'])) {
    $_SESSION['paginaEnCurso'] = 'borrarCuenta';
    $_SESSION['paginaAnterior'] = 'miCuenta';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];