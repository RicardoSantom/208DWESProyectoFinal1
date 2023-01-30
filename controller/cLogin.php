<?php
require_once 'core/221024ValidacionFormularios.php';
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
/*if (isset($_REQUEST['registrarse'])) {
   $_SESSION['paginaEnCurso']='wip';
    $_SESSION['paginaAnterior']='inicioPrivado';
    header("Location: index.php"); 
    exit();
}*/
if (isset($_REQUEST['iniciarSesion'])) {
    $aErrores = [
        'usuario' => null,
        'password' => null
    ];
    $entradaOk = true;
    $oUsuario = null;
    //Comprobamos que el usuario no haya introducido inyeccion de codigo y los datos están correctos
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 8, 4, OBLIGATORIO);
    $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1, OBLIGATORIO);
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
    if ($entradaOk) {
        //Comprobación de Usuario Correcto
        $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']);
        if (is_null($oUsuario)) {
            $entradaOk = false;
        }
    }
//   si no se ha pulsado iniciar sesion le pedimos que muestre el formulario de inicio
    if ($entradaOk) {
        UsuarioPDO::registrarUltimaConexion($oUsuario);
        $_SESSION['User208DWESProyectoFinal'] = $oUsuario;
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header("Location: index.php");
        exit();
    }
}
require_once $aVistas['layout'];
?>

