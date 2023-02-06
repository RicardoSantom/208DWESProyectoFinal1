<?php

/**
 * @author Manuel Martín Alonso
 * @version 1.0
 * 
 * Clase para usar el constructor y los métodos en la clase REST
 */

class Universidad{
    
    private $nombre;
    private $pais;
    private $pagina;
    private $codigo;
    private $provincia_estado;
    
    public function __construct($nombre, $pais, $pagina, $codigo, $provincia_estado) {
        $this->nombre = $nombre;
        $this->pais = $pais;
        $this->pagina = $pagina;
        $this->codigo = $codigo;
        $this->provincia_estado = $provincia_estado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getPagina() {
        return $this->pagina;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getProvincia_estado() {
        return $this->provincia_estado;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }

    public function setPagina($pagina): void {
        $this->pagina = $pagina;
    }

    public function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    public function setProvincia_estado($provincia_estado): void {
        $this->provincia_estado = $provincia_estado;
    }
}
?>
