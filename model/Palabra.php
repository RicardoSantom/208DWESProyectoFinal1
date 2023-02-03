<?php

/**
 * Summary Clase con atributos y constructor para instanciar un objeto Palabra
 * 
 * Description Molde para construir objetos Palabra con 3 atributos recibidos
 * como parámetros en la función constructora.
 *
 * @author Ricardo Santiago Tomé
 * @since 28/01/2023
 * @version 0.3
 * 
 */
class Palabra {

    public $palabra;
    public $significados;
    public $audio;

    /**
     * Summary Constructor de objetos palabra
     * 
     * Description Obtiene como parámetros los atributos palabra, origen y 
     * significados y crea un objeto Palabra con ellos.
     * 
     * @param String palabra Palabra a buscar en el diccionario
     * @param String significados Distintas acepciones del término palabra
     * @param String audio Audio requerido de la palabra
     */
    public function __construct($palabra, $significados, $audio) {
        $this->palabra = $palabra;
        $this->significados = $significados;
        $this->audio = $audio;
    }

}
