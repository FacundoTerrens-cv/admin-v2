<?php
session_start();
$empleado = $_SESSION['user'];
$servicio = $_SESSION['servicio'];
// Conexion a la base de datos
require_once('conection.php');

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];

	$sql = "INSERT INTO events(title, start, end, empleado, servicio, vacations) values ('$title', '$start', '$end', '$empleado', '$servicio', 1)";
	mysqli_query($conn, $sql);

	$sql_delete = "DELETE FROM events WHERE end < CURDATE() AND vacations = 1 AND empleado = '$empleado'";
	mysqli_query($conn, $sql_delete);

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
