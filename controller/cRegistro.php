<?php

/*
 * Summary Controlador para la ventana de gestión de registros de nuevos usuarios en la aplicación.
 * 
 * Description Este controlador conecta con la librería de validacion de formularios,
 * si el usuario pulsa el botón de registro, valida los valores previamente introducidos
 * en los input usuario,password,repetirPassword y descripcion.
 * Si el codigo de usuario existe, da de alta a un nuevo usuario.
 * 
 * @author Ricardo Santiago Tomé <https://github.com/RicardoSantom>
 * @since: 11/02/2023
 * @version 0.1
 * Última modificación 01/03/2023
 * @version 0.2
 */
//Inclusión de la librería de validación
require_once 'core/221024ValidacionFormularios.php';
//Array para guardar valores de los inputs.
$aErrores = [
    'usuario' => null,
    'password' => null,
    'repetirPassword' => null,
    'descripcion' => null
];
//Si se pulsa el botón volver, regresa a la página anterior.
if (isset($_REQUEST['cancelar'])) {
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: index.php');
    exit();
}
//Si se pulsa registro
if (isset($_REQUEST['registro'])) {
    //Booleano para comprobar validez de falta de errores y existencia de código
    //introducido
    $entradaOk = true;
    //Conexión a base de datos
    $miDB = new PDO(DSN, USER, PASSWORD);
    //Comprobación de datos correctos
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 8, 4, OBLIGATORIO);
    $aErrores['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, 4, 1, OBLIGATORIO);
    $aErrores['repetirPassword'] = validacionFormularios::validarPassword($_REQUEST['repetirPassword'], 8, 4, 1, OBLIGATORIO);
    $aErrores['descripcion'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 60, 2, OBLIGATORIO);
    //Bucle para guardar los posibles errores
    foreach ($aErrores as $claveError => $mensajeError) {
        if ($mensajeError != null) {
            //Si hay errores, booleano a false
            $entradaOk = false;
        }
    }
    //Si el código existiera, booleano a false
    if (!UsuarioPDO::validarCodNoExiste($_REQUEST['usuario'])) {
        $entradaOk = false;
    }
    /* Si se ha introducido la contraseña y la nueva contraseña, además de
     * permanecer el booleano a true, se da de alta al usuario creando una instancia
     * de UsuarioPDO y se regresa a inicioPrivado.
     */
    if (($_REQUEST['password'] == $_REQUEST['repetirPassword']) && $entradaOk) {
        $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['descripcion'], 'usuario');
        $_SESSION['User208DWESProyectoFinal'] = $oUsuario;
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        $aVistaDatosUsuario = [
            'codUsuario' => ($_SESSION['User208DWESProyectoFinal']->getCodUsuario()),
            'password' => ($_SESSION['User208DWESProyectoFinal']->getPassword()),
            'descUsuario' => ($_SESSION['User208DWESProyectoFinal']->getDescUsuario()),
            'numConexiones' => ($_SESSION['User208DWESProyectoFinal']->getNumconexiones()),
            'fechaHoraUltimaConexion' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexion()),
            'fechaHoraUltimaConexionAnterior' => ($_SESSION['User208DWESProyectoFinal']->getFechaHoraUltimaConexionAnterior()),
            'perfil' => $_SESSION['User208DWESProyectoFinal']->getPerfil(),
            'imagenUsuario' => $_SESSION['User208DWESProyectoFinal']->getImagenUsuario()
        ];
        $entradaOk = true;
    } else {
        $entradaOk = false;
    }
}
/*if (!empty($_POST) == true) {
    //$oUsuario = UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['password'], $_REQUEST['descripcion'], 'usuario');
    // $_SESSION['User208DWESProyectoFinal'] = $oUsuario;
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    $entradaOk = true;
}*/
require_once $aVistas['layout'];
