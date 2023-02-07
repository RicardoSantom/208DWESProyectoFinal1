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
 * correspondiente dentro del modelo.
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
    //Array con las respuestas recibidas.
    $aRespuestasApi = [
        "buscaDepartamentosPorDesc" => null
    ];
    //Validación del input para la descripción.
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 0, 0);
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
        //Guardado en el array de respuestas de la descripción solicitada en el input.
        $aRespuestasApi['buscaDepartamentosPorDesc'] = $_REQUEST['descripcion'];
        /*Guardado en la variable array de la ejecución de la función correspondiente 
         * del modelo con los datos proporcionados por el array de respuestas.
         */
        $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestasApi['buscaDepartamentosPorDesc']);
    }
}
//Inclusión de la vista.
require_once $aVistas['layout'];
