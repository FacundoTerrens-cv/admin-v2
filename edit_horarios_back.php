<?php
include 'conection.php';
$id = $_POST['id'];
$horario_inicio = $_POST['hora_inicio'];
$horario_final = $_POST['hora_final'];
$empleado = $_POST['empleado'];
     $query = "UPDATE `horarios_turnos` SET hora_inicio = '$horario_inicio', hora_final = '$horario_final', empleado = '$empleado' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:horarios.php');
     }
?>