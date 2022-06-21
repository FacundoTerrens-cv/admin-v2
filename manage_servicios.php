<?php
include 'conection.php';
$id = $_GET['id'];
$valor_servicio = $_GET['valor_servicio'];
$empleado = $_GET['empleado'];
$estado = $_GET['estado'];
echo $valor_dia;
echo $empleado;
     $query = "UPDATE `servicios` SET servicio = '$valor_servicio', estado = '$estado' WHERE id = '$id' AND empleado = '$empleado'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:servicios_empleado.php');
     }
?>