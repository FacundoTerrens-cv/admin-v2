<?php
if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
  require_once('conection.php');
$categoria = $_POST['categoria'];
$servicio = $_POST['servicio'];
$empleado = $_POST['empleado'];

$sql = "INSERT INTO servicios (empleado, categoria, servicio, data_servicio, estado) VALUES ('$empleado', '$categoria', '$servicio', '$servicio', 'Activado')";
mysqli_query($conn, $sql);
header("location: admin_servicios.php");
?>