<?php
/**
 * Summary Clase para llamar servicios REST
 * 
 * Description of REST Esta clase
 *
 * @author Ricardo Santiago Tomé
 * @since 01/02/2022
 * @version 0.3
 */
class REST {

    /**
     * Llamada a una api diccionario
     * 
     * Llama a una api diccionario con  la palabra que estamos buscando y devulve el origen y
     * significados de la palabra en un objeto Palabra
     * 
     * @param String $palabra Palabra de la que queremos obtener datos
     */
    public static function buscarPalabra($palabra) {
        $oDevolucion = @file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/en/{$palabra}");
        //Trabajando en los comentarios
        $aSalida = $oDevolucion ? json_decode($oDevolucion)[0] : '' ;

        if (is_object($aSalida)) {
            return new Palabra($aSalida->word, $aSalida->meanings, $aSalida->phonetics);
        } else{
            return null;
        }
    }

}
