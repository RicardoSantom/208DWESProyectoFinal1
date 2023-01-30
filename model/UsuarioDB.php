<?php
/**
 * Descriptin Interface que declara dos funciones que se implementarán en la clase
 * UsuarioPDO.
 * @author Ricardo Santiago Tomé
 * @version 0.1
 * @since 20/01/2023
 */
interface UsuarioDB {
    public static function validarUsuario($codUsuario,$password);
    public static function registrarUltimaConexion($oUsuarioValido);
}
?>
