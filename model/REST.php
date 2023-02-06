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
     * Llamada a una API diccionario
     * 
     * Llama a una API diccionario con  la palabra que estamos buscando y devuelve
     * categoría gramatical, significados y audio con la pronunciación de
     *  la palabra en la instanciación de un objeto Palabra
     * 
     * @param String $palabra Palabra de la que queremos obtener datos     * 
     * @param string $sRespuestaApi String con sintaxis JSON que guarda la 
     * respuesta de la API a la petición lanzada con el método file_get_contents.
     * @link https://php.net/manual/en/function.file-get-contents.php Guarda en 
     * una variable String el contenido de un fichero.
     * @param stdClass $oSalida Objeto que guarda lo obtenido de la decodificación
     * con el método json_decode aplicado a la variable $sRespuestaApi;
     * guarda un string con el valor de la palabra consultada, 
     * dos arrays con los valores que queremos recoger de la respuesta, otro
     * stdClass de nombre license que a su vez incluye dos string con el nombre y url
     * de la licencia a la que está sometida la API consultada. Guarda también un array
     * de nombre sourceUrls que en su posición 0 contiene un string con la url del Wiktionary,
     * a la postre, fuente de contenidos que consulta la API para ofrecer sus resultados.
     * @link https://en.wiktionary.org/wiki/Wiktionary:Main_Page Proyecto de Wiki para 
     * consultas a diccionarios en diferentes lenguas.     * 
     * @link https://www.php.net/manual/es/reserved.classes.php Clases predefinidas,     * 
     * @link https://www.php.net/manual/es/language.types.object.php#language.types.object.casting Conversión
     * de un valor a Objeto como clase predefinida. 
     */
    public static function buscarPalabra($palabra) {
        $sRespuestaApi = @file_get_contents("https://api.dictionaryapi.dev/api/v2/entries/en/{$palabra}");
        //Guardado en variable stdClass de la decodificación de la respuesta,lo hace en su posición 0
        //al ser esta la que corresponde con la url solicitante desde esta api al wiktionary
        $oSalida = json_decode($sRespuestaApi)[0] ;
        //Si $oSalida es reconocido como un objeto
        if (is_object($oSalida)) {
            //Construye un objeto palabra con los atributos pasados como parámetro al constructor
            return new Palabra($oSalida->word, $oSalida->meanings, $oSalida->phonetics);
        } else {
            //Si no se ha construido el objeto $oSalida, devuelve nulo.
            return null;
        }
    }
    
    /**
     * Summary Funcion para buscar universidades con llamada a API
     * 
     * Description Función que recibe un pais como parámetro y devuelve un array
     * con la información proporcionada por la llamada a una API
     * 
     * @author Manuel Martín Alonso <https://github.com/Manuel0119/204DWESProyectoFinal/blob/developer/model/REST.php>
     * 
     * @param string $pais
     * @return array $aUniversidad Contiene los valores del nombre, pais, página web
     * código y provincia de la universidad consultada.
     */
      public static function buscarUniversidad($pais) {
        $aUniversidad = [];
        $archivoJSON = file_get_contents("http://universities.hipolabs.com/search?country=$pais");
        $aUniversidades = json_decode($archivoJSON, true);
        if ($aUniversidades) {
            foreach ($aUniversidades as $valor){
                array_push($aUniversidad, new Universidad($valor['name'], $valor['country'], $valor['web_pages'][0], $valor['alpha_two_code'], $valor['state-province']));
            }
        }
        return $aUniversidad;
    }

}
