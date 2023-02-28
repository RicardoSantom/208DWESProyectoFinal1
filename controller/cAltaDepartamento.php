<?php
if (isset($_REQUEST['volver'])) {//al pulsar vuelve a la pagina anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
$aErrores = [ //array de errores
    "codigo"=>null,
    "descripcion"=>null,
    "volumen"=>null,
    "duplicado"=>null
];
$aRespuestas = [ //array de respuestas
    "codigo"=>null,
    "descripcion"=>null,
    "volumen"=>null
];
if (isset($_REQUEST['aceptar'])){//al hacer clic en el boton aceptar comprobaremos los campos y si son correctos modificaremos los valores por los escritos
    $entradaOk=true;
    $aErrores=[//validamos las entradas y si hay algun error se guardará en este array
        "codigo"=> validacionFormularios::comprobarAlfabetico($_REQUEST["codigo"],3,3,OBLIGATORIO),
        "descripcion"=> validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],255,5,OBLIGATORIO),
        "volumen"=> validacionFormularios::comprobarFloat($_REQUEST['volumen'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, obligatorio: OBLIGATORIO)
    ];
    foreach ($aErrores as $clave => $valor) {//comprobamos que no hay errores
        if ($valor != null) {
            $entradaOk = false;
            $_REQUEST[$clave]='';
        }
    }
    if(is_object(DepartamentoPDO::buscarDepartamentoPorCod($_REQUEST["codigo"]))){
        $aErrores['codigo']="Ya existe un departamento con este codigo";
        $entradaOk = false;
    }
    if($entradaOk){//si la entrada es correcta se modifican los valores en la base de datos
    $aRespuestas=[
        "codigo"=>$_REQUEST['codigo'],
        "descripcion"=> $_REQUEST['descripcion'],
        "volumen"=> $_REQUEST['volumen']
        ];
    DepartamentoPDO::altaDepartamento($aRespuestas['codigo'], $aRespuestas['descripcion'],$aRespuestas['volumen']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
    }
}   
require_once $aVistas['layout'];