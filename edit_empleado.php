<?php
include 'conection.php';
if(isset($_POST['submit'])){
$id = $_POST['idp'];
$nombre = $_POST['nombre'];
$horario = $_POST['horario'];
$servicio = $_POST['servicio'];
$rol = $_POST['rol'];
$mail = $_POST['mail'];
     $query = "UPDATE `empleados` SET nombre = '$nombre', correo = '$mail', rol = '$rol' , horario_trabajo = '$horario', servicio = '$servicio'  WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:index.php');
     }
}
?>