<?php

require_once 'db/database.php';
require_once 'inc/class.empleado.php';
require_once 'inc/class.gestorEmpleado.php';

// Ejemplo de uso con conexión a la base de datos
$empleado1 = new Empleado("Juan Pérez", 50000, 3, "Vendedor");
$empleado2 = new Empleado("María González", 60000, 7, "Atención al cliente");
$empleado3 = new Empleado("Carlos Rodríguez", 70000, 5, "Gerente");

$gestorEmpleados = new GestorEmpleados();
$gestorEmpleados->agregarEmpleado($empleado1, $conn);
$gestorEmpleados->agregarEmpleado($empleado2, $conn);
$gestorEmpleados->agregarEmpleado($empleado3, $conn);

// ...

// Cierre de la conexión a la base de datos al final del script
$conn->close();

?>