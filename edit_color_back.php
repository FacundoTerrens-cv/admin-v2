<?php
include 'conection.php';
$id = $_POST['id'];
$color = $_POST['color'];
echo $color;

     $query = "UPDATE `colors` SET color = '$color' WHERE id = '$id'";
     $resultado = mysqli_query($conn,$query);
     if($resultado){

      header('location:colors.php');
     }
?>