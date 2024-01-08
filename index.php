<?php

// Clase Empleado
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
}


// Clase GestorEmpleados
class GestorEmpleados {
    private $empleados = [];

    // Agregar empleado a la lista
    public function agregarEmpleado(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    // Calcular y mostrar salario promedio
    public function obtenerSalarioPromedio(): string {
        $totalSalarios = 0;
        foreach ($this->empleados as $empleado) {
            $totalSalarios += $empleado->getSalario();
        }
        $promedioSalarios = count($this->empleados) > 0 ? $totalSalarios / count($this->empleados) : 0;
        return "Salario promedio de todos los empleados: $promedioSalarios" . PHP_EOL;
    }

    // Incrementar salarios
    public function incrementarSalarios(int $porcentaje): void {
        foreach ($this->empleados as $empleado) {
            $nuevoSalario = $empleado->getSalario() * (1 + $porcentaje / 100);
            $empleado->setSalario($nuevoSalario);
        }
    }

    // Visualizar salarios antes y después de incrementos
    public function visualizarSalarios(): string {
        $string = "";
        foreach ($this->empleados as $empleado) {
            $string = $string . $empleado->getNombreApellido() . " (" . $empleado->getAntiguedad() . "): $" . $empleado->getSalario() . "<br>";
        }
        return $string;
    }

    // Visualizar empleados
    public function getEmpleados(): array {
        return $this->empleados;
    }
}

// Ejemplo de uso
$empleado1 = new Empleado("Juan Pérez", 50000, 3, "Vendedor");
$empleado2 = new Empleado("María González", 60000, 7, "Atención al cliente");
$empleado3 = new Empleado("Carlos Rodríguez", 70000, 5, "Gerente");

$gestorEmpleados = new GestorEmpleados();
foreach ($gestorEmpleados as $empleado) {
    echo $empleado;
}

$gestorEmpleados->agregarEmpleado($empleado1);
$gestorEmpleados->agregarEmpleado($empleado2);
$gestorEmpleados->agregarEmpleado($empleado3);

echo "<br>Salarios antes del incremento: <br>" . $gestorEmpleados->visualizarSalarios();

// Incrementar el salario un 10% a todos los empleados.
$gestorEmpleados->incrementarSalarios(10);

echo "<br>Salarios después del incremento a todos los empleados: <br>" . $gestorEmpleados->visualizarSalarios();

// Incrementar el salario un 15% a todos los empleados con más de 5 años de antigüedad.
foreach ($gestorEmpleados->getEmpleados() as $empleado) {
    if ($empleado->getAntiguedad() > 5) {
        $empleado->setSalario($empleado->getSalario() * 1.15);
    }
}
echo "<br>Salarios después del incremento a los empleados con más de 5 años de antiguedad: <br>" . $gestorEmpleados->visualizarSalarios();

// Incrementar el salario un 5% adicional a los Vendedores y un 7.5% adicional a Atención al cliente.
foreach ($gestorEmpleados->getEmpleados() as $empleado) {
    if ($empleado->getPuestoTrabajo() == "Vendedor") {
        $empleado->setSalario($empleado->getSalario() * 1.05);
    } elseif ($empleado->getPuestoTrabajo() == "Atención al cliente") {
        $empleado->setSalario($empleado->getSalario() * 1.075);
    }
}
echo "<br>Salarios después del Incremento de salario un 5% adicional a los Vendedores y un 7.5% adicional a Atención al cliente: <br>" . $gestorEmpleados->visualizarSalarios();

