<?php

/*
 * Fichero que contiene el controlador de la gestión de las contraseñas de la aplicación.
 * @author Manuel Martín Alonso
 * @since: 05-02-2023
 * Última modificación: 05-02-2023
 */
$aErrores = [
    'viejoPassword' => null,
    'nuevoPassword' => null,
    'nuevoPassword2' => null,
];
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaAnterior'] = "miCuenta";
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
if (isset($_REQUEST['aceptar'])) {
    $aErrores = [
        'viejoPassword' => null,
        'nuevoPassword' => null,
        'RnewPassword' => null
    ];
    $entradaOk = true;
    //Comprobamos que el usuario no haya introducido inyeccion de código y los datos estén correctos
    $aErrores['viejoPassword'] = validacionFormularios::validarPassword($_REQUEST['viejoPassword'], 8, 4, 1, OBLIGATORIO);
    $aErrores['nuevoPassword'] = validacionFormularios::validarPassword($_REQUEST['nuevoPassword'], 8, 4, 1, OBLIGATORIO);
    $aErrores['nuevoPassword2'] = validacionFormularios::validarPassword($_REQUEST['nuevoPassword2'], 8, 4, 1, OBLIGATORIO);
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
    if (hash('sha256', $_SESSION['User208DWESProyectoFinal']->getCodUsuario() . $_REQUEST['viejoPassword']) 
            != $_SESSION['User208DWESProyectoFinal']->getPassword() || $_REQUEST['nuevoPassword'] != $_REQUEST['nuevoPassword2']) {
        $entradaOk = false;
    }
    if ($entradaOk) {
        $password = hash('sha256', ($_SESSION['User208DWESProyectoFinal']->getCodUsuario() . $_REQUEST['nuevoPassword']));
        UsuarioPDO::cambiarPassword($_SESSION['User208DWESProyectoFinal'], $password);
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit();
    }
}
require_once $aVistas['layout'];