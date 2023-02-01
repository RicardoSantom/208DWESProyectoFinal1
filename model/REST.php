<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Summary Clase para llamar servicios REST
 * 
 * Description of REST
 *
 * @author Ricardo Santiago Tomé
 * @since 01/02/2022
 * @version 0.3
 */
class REST {
     /**
        * Llamada a una api diccionario
        * 
        * Llama a una api diccionario con el idioma y la palabra que estamos buscando y devulve el origen y
        * significados de la palabra en un objeto Palabra
        * 
        * @param String $idioma Idioma de la palabra
        * @param String $palabra Palabra de la que queremos obtener los significados
        */
        public static function buscarPalabra($idioma, $palabra){
            $oJSON=file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/{$idioma}/{$palabra}");
            
            $salida=json_decode($oJSON)[0];
            
            if(is_object($salida)){
                return new Palabra($salida->word, $salida->origin??"Desconocido", $salida->meanings);
            }
        }
}
