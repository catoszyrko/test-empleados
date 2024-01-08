<?php

class Empleado {
    private $nombreApellido;
    private $salario;
    private $antiguedad;
    private $puestoTrabajo;

    public function __construct($nombreApellido, $salario, $antiguedad, $puestoTrabajo) {
        $this->nombreApellido = $nombreApellido;
        $this->salario = $salario;
        $this->antiguedad = $antiguedad;
        $this->puestoTrabajo = $puestoTrabajo;
    }

    // Métodos de obtener y establecer
    public function getNombreApellido(): string {
        return $this->nombreApellido;
    }

    public function setNombreApellido(string $nombreApellido): void {
        $this->nombreApellido = $nombreApellido;
    }

    public function getSalario(): string {
        return $this->salario;
    }

    public function setSalario(string $salario): void {
        $this->salario = $salario;
    }

    public function getAntiguedad(): string {
        return $this->antiguedad;
    }

    public function setAntiguedad(string $antiguedad): void {
        $this->antiguedad = $antiguedad;
    }

    public function getPuestoTrabajo(): string {
        return $this->puestoTrabajo;
    }

    public function setPuestoTrabajo(string $puestoTrabajo): void {
        $this->puestoTrabajo = $puestoTrabajo;
    }

    public function guardarEnBD(mysqli $conn) {
        $nombre = $conn->real_escape_string($this->nombreApellido);
        $salario = $conn->real_escape_string($this->salario);
        $antiguedad = $conn->real_escape_string($this->antiguedad);
        $puesto = $conn->real_escape_string($this->puestoTrabajo);

        $query = "INSERT INTO empleados (nombre_apellido, salario, antiguedad, puesto_trabajo) VALUES ('$nombre', '$salario', '$antiguedad', '$puesto')";
        $conn->query($query);
    }
}
?>