<?php
/**
 * Summary Controlador para la vista de REST
 * 
 * Description Actúa en función a las decisiones tomadas por el usuario
 * en la vista vREST, valida la entrada del input del formulario y realiza
 * con los valores en él recogidos una llamada a una API externa que consiste
 * en un diccionario de palabras en idioma inglés.
 * 
 * @author Ricardo Santiago Tomé
 * @since 28/01/2023
 * @version 0.3
 */
// Si se pulsa en volver, regresa a la página anterior
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
//Array para almacenar errores(DE MOMENTO,) con un solo campo.
$aErrores = [
    "palabra" => null
];
//Si se pulsa buscar, el usuario ha interactuado con el formulario.
if (isset($_REQUEST['buscar'])) {
    $entradaOk = true;
//Y se valida lo tipeado en el input
    $aErrores["palabra"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["palabra"], 255, 1, 1);
//Si no hay errores en lo tipeado en el input
    if ($aErrores["palabra"] != null) {
        $entradaOk = false;
    }
} else {
    //Si si hay errores, el formulario no se ha rellenado nunca, booleano a false
    $entradaOk = false;
}
//Si el booleano está a true
if ($entradaOk) {
    //Se guarda en $oPalabra el resultado de la llamada a la API
    $oPalabra = REST::buscarPalabra($_REQUEST["palabra"]);
    //Array para guardar los datos a mostrar de la respuesta
    $aRespuestas = [
        'palabra' => $oPalabra->palabra,
        'significados' => $oPalabra->significados,
        'audio' => $oPalabra->audio
    ];
}
//
require_once $aVistas['layout'];
?>