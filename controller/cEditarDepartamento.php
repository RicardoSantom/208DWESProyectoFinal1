<?php

$oDepartamento = DepartamentoPDO::buscarDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']); //Buscamos el departamento especificado por el codigo en la base de datos y lo devolvemos como un objeto de la clase departamento
$aVDepartamento = [//Recogemos los datos del objeto departamento y los introducimos en el array
    'codigo' => $oDepartamento->getCodDepartamento(),
    'descripcion' => $oDepartamento->getDescDepartamento(),
    'volumen' => $oDepartamento->getVolumenDeNegocio(),
    'fechaAlta' => $oDepartamento->getFechaCreacionDepartamento(),
    'fechaBaja' => $oDepartamento->getFechaBajaDepartamento()
];
if (isset($_REQUEST['volver'])) {//al pulsar vuelve a la pagina anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
$aErrores = [//array de errores
    "descripcion" => null,
    "volumenNegocio" => null
];
$aRespuestas = [//array de respuestas
    "descripcion" => null,
    "volumenNegocio" => null
];
if (isset($_REQUEST['aceptar'])) {//al hacer clic en el boton aceptar comprobaremos los campos y si son correctos modificaremos los valores por los escritos
    $entradaOk = true;
    $aErrores = [//validamos las entradas y si hay algun error se guardará en este array
        "descripcion" => validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 255, 5, OBLIGATORIO),
        "volumenNegocio" => validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, obligatorio: OBLIGATORIO)
    ];
    foreach ($aErrores as $clave => $valor) {//comprobamos que no hay errores
        if ($valor != null) {
            $entradaOk = false;
        }
    }
    if ($entradaOk) {//si la entrada es correcta se modifican los valores en la base de datos
        $aRespuestas = [
            "descripcion" => $_REQUEST['descripcion'],
            "volumenNegocio" => $_REQUEST['volumen']
        ];
        DepartamentoPDO::modificarDepartamento($aVDepartamento['codigo'], $aRespuestas['volumenNegocio'], $aRespuestas['descripcion']);
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit();
    }
}
require_once $aVistas['layout'];
