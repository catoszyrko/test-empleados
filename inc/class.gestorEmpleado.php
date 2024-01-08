<?php

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
?>