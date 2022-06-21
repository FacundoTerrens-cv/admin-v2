<?php
include 'conection.php';
$id = $_GET['id'];
$consulta = "DELETE FROM `clientes` WHERE id = '$id'";
$sentencia = mysqli_query($conn,$consulta);
if($sentencia){
    header("Location:index.php"); 
}else{
    echo "<script>alert('Error')</script>";
}
?>