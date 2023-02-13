<?php
/**
 * Summary Clase para la creación, consulta y modificación de objetos Departamento.
 * 
 * Description of Departamento. Esta clase define los atributos privados para el 
 * objeto Departamento, define también el constructor con los parámetros indicados
 * para instanciar un objeto Departamento, así como los métodos getter y setter
 * para consultar y modificar los valores de los atributos.
 *
 * @author Ricardo Santiago Tomé
 * @version 0.1
 * @since 04/02/2023
 */
class Departamento {
     /**
     * @access private
     * @var string $codDepartamento Código del Departamento
     */
    private $codDepartamento;
    
    /**
     * @access private
     * @var string $descDepartamento Descripción del Departamento
     */
    private $descDepartamento;
    
    /**
     * @access private
     * @var DateTime $fechaCreacionDepartamento Fecha de creación del Departamento
     */
    private $fechaCreacionDepartamento;
    
    /**
     * @access private
     * @var float $volumenDeNegocio Volumen de negocio del Departamento
     */
    private $volumenDeNegocio;
    
    /**
     * @access private
     * @var DateTime $fechaBajaDepartamento Fecha de baja del Departamento
     */
    private $fechaBajaDepartamento;

    /**
     * 
     * Funcion __construct
     * 
     * Funcion que inicializa los atributos declarados
     * 
     * @author Ricardo Santiago Tomé
     * @version 0.1
     * @since: 04/02/2023
     * @param string $codDepartamento Código del Departamento
     * @param string $descDepartamento Descripción del Departamento
     * @param dateTime $fechaCreacionDepartamento Fecha de creación del Departamento
     * @param float $volumenDeNegocio Volumen de negocio del Departamento
     * @param datetime $fechaBajaDepartamento Fecha de baja del Departamento
     */
    
    public function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento=null) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
    
    public function getCodDepartamento() {
        return $this->codDepartamento;
    }

    public function getDescDepartamento() {
        return $this->descDepartamento;
    }

    public function getFechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }

    public function getVolumenDeNegocio() {
        return $this->volumenDeNegocio;
    }

    public function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

    public function setCodDepartamento($codDepartamento): void {
        $this->codDepartamento = $codDepartamento;
    }

    public function setDescDepartamento($descDepartamento): void {
        $this->descDepartamento = $descDepartamento;
    }

    public function setFechaCreacionDepartamento($fechaCreacionDepartamento): void {
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    }

    public function setVolumenDeNegocio($volumenDeNegocio): void {
        $this->volumenDeNegocio = $volumenDeNegocio;
    }

    public function setFechaBajaDepartamento($fechaBajaDepartamento): void {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }


}
