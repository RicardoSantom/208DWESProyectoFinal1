<?php
/**
 * Description Muestra información del objeto error construido en la clase ErrorApp,
 * este se construirá con los errores ocurridos durante la ejecución de la aplicación. 
 * @author Ricardo Santiago Tomé
 * @since 30/01/2023
 * @version 1.0
 */
//Si se pulsa tecnologias, se navega a su vista correspondiente
if(isset($_REQUEST['tecnologias'])){
    $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
    header("Location: index.php");
    exit();
}
// Si se clicka el botón 'volver', destruye la variable de sesión de error y vuelve al inicio privado.
if(isset($_REQUEST['volver'])){
    /*paginaAnterior se establece a cadena vacía porque no quiero que recuerde
     * que ha estado en la ventana de error
     */
    $_SESSION['paginaAnterior'] = '';
    /*Se establece la paginaEnCurso con el valor de la página 'error' guardada
     * en el objeto en el momento de su instanciación.
     */    
    $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente();
    //Borrado del error de la sesión.
    unset($_SESSION['error']);
    header('Location: index.php');
    exit;
}

// Array con la información de la vista.
$aVError = [
    'error' => $_SESSION['error']->getDescError(),
    'codigo' => $_SESSION['error']->getCodError(),
    'archivo' => $_SESSION['error']->getArchivoError(),
    'linea' => $_SESSION['error']->getLineaError()
];
// Carga de la página de inicio.
require_once $aVistas['layout'];