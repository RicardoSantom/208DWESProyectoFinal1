<?php

/**
 * Summary Controlador para vMtoDepartamentos.
 * 
 * Description Controlador para la vista Mantenimiento de Departamentos.
 * Controla la navegación entre la citada vista y la vista anterior a esta.
 * 
 * @author Ricardo Santiago Tomé
 * @version 0.1
 * @since 04/03/2023
 */
/* Guardado en la variable array de la ejecución de la función correspondiente 
 * del modelo con los datos proporcionados por el array de valores.
 * En su primera ocurrencia y gracias a la inicialización a cadena vacía en el 
 * controlador de inicio privado, muestra todos los departamentos de la DB.
 */
$aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamento']);
//Array para guardar los campos del objeto Departamento y mostrarlos en la vista
$aVMtoDepartamentos = [];
//Array de errores con el único campo consultado.
$aErrores = [
    'descripcion' => null
];
//Si DepartamentoPDO ha devuelto resultado válido(un array de objetos)
if ($aDepartamentos) {
    //Recorro el array y por cada objeto...
    foreach ($aDepartamentos as $oDepartamento) {
        /**
         * Utilizo el método array_push para introducir los valores devueltos
         * por los getters para cada objeto departamento.
         */
        array_push($aVMtoDepartamentos, [
            'codDepartamento' => $oDepartamento->getCodDepartamento(),
            'descDepartamento' => $oDepartamento->getDescDepartamento(),
            'fechaAlta' => $oDepartamento->getFechaCreacionDepartamento(),
            'volumenNegocio' => $oDepartamento->getVolumenDeNegocio(),
            'fechaBaja' => $oDepartamento->getFechaBajaDepartamento()
        ]);
    }
}
if (isset($_REQUEST['editar'])) {
    $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['editar'];
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'editarDepartamento';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['eliminar'])) {
     $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['eliminar'];
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'eliminarDepartamento';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['rehabilitar'])) {
    $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['rehabilitar'];
    DepartamentoPDO::rehabilitarDepartamento($_SESSION['codDepartamentoEnCurso']);
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['deshabilitar'])) {
    $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['deshabilitar'];
    DepartamentoPDO::bajaLogicaDepartamento($_SESSION['codDepartamentoEnCurso']);
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['aniadir'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'altaDepartamento';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['importar'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'wip';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['exportar'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'wip';
    header("Location: index.php");
    exit();
}
if (isset($_REQUEST['refrescar'])) {
    //Limpio el input de descripción.
    $_SESSION['criterioBusquedaDepartamento'] = "";
    header("Location: index.php");
    exit();
}
//Si se pulsa el botón volver, regresa a la página anterior.
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if (isset($_REQUEST['tecnologias'])) {
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}

//Si se pulsa el botón buscar.
if (isset($_REQUEST['buscar'])) {
    //Booleano para controlar que la ejecución es correcta.
    $entradaOk = true;
    //Validación del input para la descripción.
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 30, 0, 0);
    /* Recorrer el array de errores comprobando que no haya errores. Si no los hay
     * el booleano continua a true, si los hay, cambia a falso.
     */
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
//Si el booleano sigue a true.
    if ($entradaOk) {
        //Guardado en la sesión la descripción solicitada en el input.
        $_SESSION['criterioBusquedaDepartamento'] = $_REQUEST['descripcion'];
        header('Location: index.php');
        exit();
    }
} else {
    $entradaOk = false;
}
//Inclusión de la vista.
require_once $aVistas['layout'];
