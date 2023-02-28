<?php

if (isset($_REQUEST['cancelar'])) {//al pulsar vuelve a la pagina anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
if(isset($_REQUEST['eliminar'])){
    DepartamentoPDO::bajaFisicaDepartamento($_SESSION['codDepartamentoEnCurso']);
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit(); 
}
$oDepartamento= DepartamentoPDO::buscarDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
$aVistaEliminarDepartamento=[
    'codigo'=>$oDepartamento->getCodDepartamento(),
    'descripcion'=>$oDepartamento->getDescDepartamento(),
    'volumen'=>$oDepartamento->getVolumenDeNegocio(),
    'fechaAlta'=>$oDepartamento->getFechaCreacionDepartamento(),
    'fechaBaja'=>$oDepartamento->getFechaBajaDepartamento()
        ];
require_once $aVistas['layout'];