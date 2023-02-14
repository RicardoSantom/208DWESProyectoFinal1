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
//Inclusión librería de validación
require_once 'core/221024ValidacionFormularios.php';
/*Variable de tipo array donde se guarda el resultado de llamar a la función
 * correspondiente dentro del modelo. Inicializada a cadena vacía para que muestre
 * la tabla con todos los departamentos a la entrada a la vMtoDepartamentos.
 */
$aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDesc("");
    //Array con el único campo consultado.
    $aErrores = [
        'descripcion' => null
    ];
//Si se pulsa el botón volver, regresa a la página anterior.
if (isset($_REQUEST['volver'])) {
     $_SESSION['paginaAnterior']= 'inicioPrivado';
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    header("Location: index.php");
    exit();
}
//Si se pulsa tecnologias, se navega a su vista correspondiente
if(isset($_REQUEST['tecnologias'])){
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
//Si se pulsa el botón buscar.
if (isset($_REQUEST['buscar'])) {
    //Booleano para controlar que la ejecución es correcta.
    $entradaOk = true;
    //Array con los valores para buscar
    $aValoresBusqueda = [
        "buscaDepartamentosPorDesc" => null
    ];
    //Validación del input para la descripción.
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 20, 1, 0);
    /*Recorrer el array de errores comprobando que no haya errores. Si no los hay
     * el booleano continua a true, si los hay, cambia a falso.
     */
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            $entradaOk = false;
        }
    }
    //Si el booleano sigue a true.
    if ($entradaOk) {
        //Guardado en el array de valores de la descripción solicitada en el input.
        $aValoresBusqueda['buscaDepartamentosPorDesc'] = $_REQUEST['descripcion'];
        /*Guardado en la variable array de la ejecución de la función correspondiente 
         * del modelo con los datos proporcionados por el array de valores.
         */
        $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDesc($aValoresBusqueda['buscaDepartamentosPorDesc']);
    }
}
//Inclusión de la vista.
require_once $aVistas['layout'];
