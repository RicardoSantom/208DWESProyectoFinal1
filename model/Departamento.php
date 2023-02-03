<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Departamento
 *
 * @author daw2
 */
class Departamento {
    private $codUsuario;
    private $descDepartamento;
    private $fechaCreacionDepartamento;
    private $volumenDeNegocio;
    private $fechaBajaDepartamento;
    
    public function __construct($codUsuario, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento=null) {
        $this->codUsuario = $codUsuario;
        $this->descDepartamento = $descDepartamento;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
    public function getCodUsuario() {
        return $this->codUsuario;
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

    public function setCodUsuario($codUsuario): void {
        $this->codUsuario = $codUsuario;
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
