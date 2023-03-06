<?php
//FALTAN COMENTARIOS ('WIP')
$oDepartamento = DepartamentoPDO::buscarDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']); 

if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
$aErrores = [
    "descripcion" => null,
    "volumenNegocio" => null
];
$aRespuestas = [
    "descripcion" => null,
    "volumenNegocio" => null
];
if (isset($_REQUEST['aceptar'])) {
    $entradaOk = true;
    $aErrores = [
        "descripcion" => validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],60 , 5, OBLIGATORIO),
        "volumenNegocio" => validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, obligatorio: OBLIGATORIO)
    ];
    foreach ($aErrores as $clave => $valor) {
        if ($valor != null) {
            $entradaOk = false;
        }
    }
    if ($entradaOk) {
        $aRespuestas = [
            "descripcion" => $_REQUEST['descripcion'],
            "volumenNegocio" => $_REQUEST['volumen']
        ];
        DepartamentoPDO::modificarDepartamento($_SESSION['codDepartamentoEnCurso'], $aRespuestas['volumenNegocio'], $aRespuestas['descripcion']);
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit();
    }
}
$aVistaEditarDepartamento = [
    'codigo' => $oDepartamento->getCodDepartamento(),
    'descripcion' => $oDepartamento->getDescDepartamento(),
    'volumen' => $oDepartamento->getVolumenDeNegocio(),
    'fechaAlta' => $oDepartamento->getFechaCreacionDepartamento()->format('Y-m-d'),
    'fechaBaja' => $oDepartamento->getFechaBajaDepartamento()
];
require_once $aVistas['layout'];
