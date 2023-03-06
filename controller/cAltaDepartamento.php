<?php

if (isset($_REQUEST['volver'])) {//al pulsar vuelve a la pagina anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
//Array de errores.
$aErrores = [
    "codigo" => null,
    "descripcion" => null,
    "volumen" => null,
    "duplicado" => null
];
//Array de respuestas.
$aRespuestas = [
    "codigo" => null,
    "descripcion" => null,
    "volumen" => null
];
/* Si se ha pulsado el botón aceptar validamos o no los campos con la librería de
 * validación;si son correctos modificaremos los valores por los recibidos de los input.
 */
if (isset($_REQUEST['aceptar'])) {
    $entradaOk = true;
    //Si hay errores se guardan en su array
    $aErrores = [
        "codigo" => validacionFormularios::comprobarAlfabetico($_REQUEST["codigo"], 3, 3, OBLIGATORIO),
        "descripcion" => validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 60, 5, OBLIGATORIO),
        "volumen" => validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, obligatorio: OBLIGATORIO)
    ];
    //Comprobamos que no hay errores
    foreach ($aErrores as $clave => $valor) {
        if ($valor != null) {
            $entradaOk = false;
            $_REQUEST[$clave] = '';
        }
    }
    
    if (DepartamentoPDO::validarCodNoExiste($_REQUEST["codigo"]) == false) {
        $aErrores['duplicado'] = "El código introducido está duplicado, elija otro.";
        $entradaOk = false;
    }
    //Si la entrada es correcta se modifican los valores en array de respuetas
    if ($entradaOk) {
        $aRespuestas = [
            "codigo" => $_REQUEST['codigo'],
            "descripcion" => $_REQUEST['descripcion'],
            "volumen" => $_REQUEST['volumen']
        ];
        //Damos de alta un nuevo departamento con los valores del array de respuestas
        DepartamentoPDO::altaDepartamento($aRespuestas['codigo'], $aRespuestas['descripcion'], $aRespuestas['volumen']);
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit();
    }
}
require_once $aVistas['layout'];
