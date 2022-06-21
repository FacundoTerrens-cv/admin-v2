<?php
require_once('conection.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$sql = "INSERT INTO empleados (nombre,apellido,correo,pass, rol) VALUES ('$nombre', '$apellido', '$correo', '$pass', 2)";
mysqli_query($conn, $sql);

$dias = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
$valor_dia = ['1', '2', '3', '4', '5', '6','0'];

for($i = 0; $i <= 6; $i++) { 
$sql = "INSERT INTO dias_trabajo (nombre_dia, dia_trabajo, valor_dia, estado, empleado) VALUES ('$dias[$i]', '10', '$valor_dia[$i]', 'Activado', '$nombre')";
mysqli_query($conn, $sql);
}

header("location: index.php");
?>