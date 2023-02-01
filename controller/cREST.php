<?php

/**
 * Description Controlador para la vista de REST
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
//Definir array para almacenar errores
$aErrores = [
    "palabra" => null
];

if (isset($_REQUEST['buscar'])) {
    $entradaOk = true;

    $aErrores["palabra"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["palabra"], 255, 1, OBLIGATORIO);

    if ($aErrores["palabra"] != null) {
        $entradaOk = false;
    }
} else {
    //El formulario no se ha rellenado nunca
    $entradaOk = false;
}

if ($entradaOk) {
    $oPalabra = REST::buscarPalabra( $_REQUEST["palabra"]);

   /* $aVPalabra = [
        'palabra' => $oPalabra->palabra,
        'origen' => $oPalabra->origen,
        'significados' => $oPalabra->significados
    ];*/
}

require_once $aVistas['layout'];
?>