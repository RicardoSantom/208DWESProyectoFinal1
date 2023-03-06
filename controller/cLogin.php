<?php

require_once 'core/221024ValidacionFormularios.php';
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaAnterior'] = 'inicioPublico';
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
if (isset($_REQUEST['registrarse'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'registro';
    header("Location: index.php");
    exit();
}
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
        } else{
            $oUsuarioPrivado=new Usuario($_REQUEST['usuario'], $_REQUEST['password'], $descUsuario, $numConexiones, $fechaHoraUltimaConexion, 
                    $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario);
        }
    }
//Si el booleano sigue en true, registra la última conexión y redirige a inicioPrivado
    if ($entradaOk) {
        UsuarioPDO::registrarUltimaConexion($oUsuario);
        $_SESSION['User208DWESProyectoFinal'] = $oUsuario;
        $_SESSION['perfilUsuarioEnCurso'] =$oUsuario->getPerfil();
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header("Location: index.php");
        exit();
    }
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if (isset($_REQUEST['tecnologias'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
require_once $aVistas['layout'];
?>

