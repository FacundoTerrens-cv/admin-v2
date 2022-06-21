<?php
if(!isset($_SESSION['user'])){
    header('location: login.php');
  }
  require_once('conection.php');
$servicio = $_POST['servicio'];
$hora_inicio = $_POST['hora_inicio'];
$hora_final = $_POST['hora_final'];
$empleado = $_POST['empleado'];

$sql = "INSERT INTO horarios_turnos (hora_inicio, hora_final, empleado, servicio) VALUES ('$hora_inicio', '$hora_final', '$empleado', '$servicio')";
mysqli_query($conn, $sql);
header("location: horarios.php");
?>