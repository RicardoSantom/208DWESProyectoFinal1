<?php

require_once 'core/221024ValidacionFormularios.php';
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
$entradaOk=true;
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['descripcion'])) {
    $aErrores = [
        'descripcion' => null
    ];
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
    if ($entradaOk) {
        //Comprobación de Usuario Correcto
        $oUsuario = DepartamentoPDO::buscaDepartamentosPorDesc($descDepartamento);
        if (is_null($oUsuario)) {
            $entradaOk = false;
        }
    }
//   si no se ha pulsado iniciar sesion le pedimos que muestre el formulario de inicio
    
}
if ($entradaOk) {
        
    } else{
        /*$aErrores['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 8, 4, OBLIGATORIO);
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header("Location: index.php");
        exit();*/
    }
require_once $aVistas['layout'];
