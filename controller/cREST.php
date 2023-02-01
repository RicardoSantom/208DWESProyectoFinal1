<?php

/**
 * Description Controlador para la vista de REST
 * @author Ricardo Santiago Tomé
 * @since 28/01/2023
 * @version 0.1
 */
// Si se pulsa en volver, regresa a la página anterior
if (isset($_REQUEST['volver'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header("Location: index.php");
    exit();
}
//Definir array para almacenar errores
$aErrores = [
    "palabra" => null,
    "idioma" => null,
    "codDepartamento" => null
];

if (isset($_REQUEST['buscar'])) {
    $entradaOK = true;

    $aErrores["palabra"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST["palabra"], 255, 1, OBLIGATORIO);
    $aErrores["idioma"] = validacionFormularios::validarElementoEnLista($_REQUEST["idioma"], ["ES", "EN", "FR"]);

    if ($aErrores["palabra"] != null && $aErrores["idioma"] != null) {
        $entradaOK = false;
    }
} else {
    //El formulario no se ha rellenado nunca
    $entradaOK = false;
}

if ($entradaOK) {
    $oPalabra = REST::buscarPalabra($_REQUEST["idioma"], $_REQUEST["palabra"]);

    $aVPalabra = [
        'palabra' => $oPalabra->palabra,
        'origen' => $oPalabra->origen,
        'significados' => $oPalabra->significados
    ];
}

require_once $aVistas['layout'];
?>