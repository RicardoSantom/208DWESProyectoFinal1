<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AppError Clase que construirá y mostrará detalles de los
 * errores ocurridos en la aplicación.
 *
 * @author Ricardo Santiago Tomé
 * @since 30/01/2023
 * @version 0.1
 */
class ErrorApp {
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
    private $paginaSiguiente;
    /**
     * Constructor ErrorApp 
     * @param int $codError Codigo del Error
     * @param string $descError Descripcion del Error
     * @param string $archivoError Archivo del error
     * @param string $lineaError Linea del error
     * @param string $paginaSiguiente Página siguiente, la utiiizaré para indicar
     * dónde ha de navegar la aplicación cuando se construya el objeto error
     */
    function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }
    /**
     *  Description Recoge el codigo del error y lo devuelve
     * @return string Codigo del error
     */
    function getCodError(){
        return $this->codError;
    }
    /**
     * Description Recoge la descripcion del error y la devuelve
     * @return string descripcion del error
     */
    function getDescError(){
        return $this->descError;
    }
    /**
     * Description Recoge la linea donde ocurre el error y la devuelve
     * @return int linea donde se ubica el error
     */
    function getLineaError() {
        return $this->lineaError;
    }
    /**
     * Description Recoge el archivo donde ocurre el error y lo devuelve
     * @return string archivo donde ocurre el error
     */
    function getArchivoError() {
        return $this->archivoError;
    }
    /**
     * Description Recoge la pagina la cual mostrara cuando cerremos la ventana del error
     * @return string pagina siguiente
     */
    function getPaginaSiguiente() {
        return $this->paginaSiguiente;
    }
}
