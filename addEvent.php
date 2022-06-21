<?php

// Conexion a la base de datos
require_once('conection.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$empleado = $_POST['empleado'];
	$servicio = $_POST['servicio'];

	$sql = "INSERT INTO events(title, start, end, color, empleado, servicio, estado) values ('$title', '$start', '$end', '$color', '$empleado', '$servicio', 'pendiente')";
	
	mysqli_query($conn, $sql);

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
