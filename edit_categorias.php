<?php
include 'conection.php';
if(isset($_POST['submit'])){
$id = $_POST['idp'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$servicio = $_POST['servicio'];
$duracion = $_POST['duracion'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$localidad = $_POST['localidad'];
$capacidad = $_POST['capacidad'];
echo $nombre;
     $query = "UPDATE `categorias` SET nombre = '$nombre', categoria = '$categoria', servicio = '$servicio', duracion = '$duracion', precio = '$precio', descripcion = '$descripcion', localizacion = '$localidad', capacidad = '$capacidad' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){
      header('location:clientes.php');
     }
}
?>