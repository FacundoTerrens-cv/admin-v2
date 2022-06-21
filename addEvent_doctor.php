<?php
session_start();
$doctor = $_SESSION['user'];
// Conexion a la base de datos
require_once('conection.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	is_string($start);
	$end = $_POST['end'];
	$color = $_POST['color'];
	is_string($end);
	$empleado = $_POST['empleado'];
	$servicio = $_POST['servicio'];
	$horarios = explode("-", $empleado);
	is_string($horarios);
	$horario_inicio  =  $start." ".$horarios[0];
	$horario_final  =  $end." ".$horarios[1];
	$sql = "INSERT INTO events(title, start, end, color, empleado, servicio, estado) values ('$title', '$horario_inicio', '00-00-00 00:00:00', '$color', '$doctor', '$servicio', 'pendiente')";
	
	mysqli_query($conn, $sql);

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
