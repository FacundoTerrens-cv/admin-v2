<?php
include 'conection.php';
$id = $_GET['id'];
$valor_dia = $_GET['valor_dia'];
$empleado = $_GET['empleado'];
$estado = $_GET['estado'];
echo $valor_dia;
echo $empleado;
     $query = "UPDATE `dias_trabajo` SET dia_trabajo = '$valor_dia', estado = '$estado' WHERE id = '$id' AND empleado = '$empleado'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:dias_empleado.php');
     }
?>