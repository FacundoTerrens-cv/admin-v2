<?php
include 'conection.php';
if(isset($_POST['submit'])){
$id = $_POST['idp'];
$nombre = $_POST['nombre'];
$mail = $_POST['correo'];
$telefono = $_POST['telefono'];
echo $nombre;
     $query = "UPDATE `clientes` SET nombre = '$nombre', correo = '$mail', telefono = '$telefono' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:clientes.php');
     }
}
?>