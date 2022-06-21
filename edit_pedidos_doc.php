<?php
include 'conection.php';
if(isset($_POST['submit'])){
$id = $_POST['idp'];
$nombre = $_POST['nombre'];
$start = $_POST['start'];
$empleado = $_POST['empleado'];
$servicio = $_POST['servicio'];
$estado = $_POST['estado'];
echo $nombre;
     $query = "UPDATE `events` SET title = '$nombre', start = '$start', empleado = '$empleado', servicio = '$servicio', estado = '$estado' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:pedidos_doc.php');
     }
}
?>