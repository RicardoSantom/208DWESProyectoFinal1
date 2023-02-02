<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Palabra
 *
 * @author desar
 */
class Palabra {

    public $palabra;
    public $significados;
    public $audio;

    /**
     * Constructor de objetos palabra
     * 
     * Obtiene la palabra, origen y significados y crea un objeto
     * 
     * @param String palabra Palabra a buscar en el diccionario
     * @param String origen Origen de la palabra
     * @param String significados Significados y sinonimos de la palabra
     */
    public function __construct($palabra, $significados, $audio) {
        $this->palabra = $palabra;
        $this->significados = $significados;
        $this->audio = $audio;
    }

}

?>