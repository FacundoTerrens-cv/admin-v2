<?php
include 'conection.php';
$id = $_GET['id'];
$consulta = "DELETE FROM `events` WHERE id = '$id'";
$sentencia = mysqli_query($conn,$consulta);
if($sentencia){
    header("Location:pedidos.php"); 
}else{
    echo "<script>alert('Error')</script>";
}
?>