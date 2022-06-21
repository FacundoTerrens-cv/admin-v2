<?php
include 'conection.php';
$id = $_GET['id'];
$consulta = "DELETE FROM contenido_paginas WHERE id = '$id'";
$sentencia = mysqli_query($conn,$consulta);
if($sentencia){
    header("Location:categorias.php"); 
}else{
    echo "<script>alert('Error')</script>";
}
?>