<?php
include 'conection.php';
$id = $_GET['id'];
$estado = $_GET['estado'];
$valor_servicio = $_GET['valor_servicio'];
$empleado = $_GET['empleado'];
echo $id." ".$estado." ".$valor_servicio." ".$empleado;
     $query = "UPDATE `servicios` SET servicio = '$valor_servicio', estado = '$estado' WHERE id = '$id' AND empleado = '$empleado'";
     $resultado = mysqli_query($conn,$query);

     if($resultado){
      header('location:admin_servicios.php');
     }
?>