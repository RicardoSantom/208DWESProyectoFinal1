<?php

/**
 * Description of UsuarioPDO clase que implementa métodos declarados en la interfaz DB
 * @author Ricardo Santiago Tomé <https://github.com/RicardoSantom>
 * @since 15/01/2023
 * @version 0.1
 */
class UsuarioPDO implements UsuarioDB {

    /**
     * 
     * @param String $codUsuario
     * @param String $password
     * @return boolean|\Usuario $oUsuario Devuelve un booleano a falso en caso de que
     * no se haya podido contruir un objeto del tipo Usuario
     */
    public static function validarUsuario($codUsuario, $password) {
        try { //String con consulta de selección SQL
            $SQLBuscarPorCodigo = <<<QUERY
                SELECT * FROM T01_Usuario
                WHERE T01_CodUsuario='$codUsuario' AND
                T01_Password=SHA2("{$codUsuario}{$password}", 256);
            QUERY;
            $oResultado = DBPDO::ejecutarConsulta($SQLBuscarPorCodigo);
            $oDatos = $oResultado->fetchObject();
            if (is_object($oDatos)) {
                $oUsuario = new Usuario($oDatos->T01_CodUsuario, $oDatos->T01_Password,
                        $oDatos->T01_DescUsuario, $oDatos->T01_NumConexiones, $oDatos->T01_FechaHoraUltimaConexion,
                        $oDatos->T01_Perfil, $oDatos->T01_ImagenUsuario);
                return $oUsuario;
            } /*else { //Si no existe, devuelve false.
                return false;
            }*/
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function registrarUltimaConexion($oUsuario) {
        $oUsuario->setNumConexiones($oUsuario->getNumConexiones() + 1);
        $SQLActualizacionNumConexiones = <<<query
              UPDATE T01_Usuario SET T01_NumConexiones=T01_NumConexiones+1,T01_FechaHoraUltimaConexion=now()
              WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
              query;
        DBPDO::ejecutarConsulta($SQLActualizacionNumConexiones);
        return $oUsuario;
    }

    public static function altaUsuario() {
        
    }

    public static function modificarUsuario() {
        
    }

    public static function borrarUsuario($codUsuario) {
        
    }

    public static function validarCodNoExiste($codUsuario) {
        
    }

}

?>