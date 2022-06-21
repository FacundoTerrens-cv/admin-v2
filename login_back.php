<?php
session_start();
include 'conection.php';
$email=$_POST['email'];
$pass=$_POST['pass'];
//$_SESSION['user'] = $email;
$consulta="SELECT*FROM empleados where correo='$email' AND pass='$pass'";
$resultado=mysqli_query($conn, $consulta);
$filas=mysqli_fetch_array($resultado);
$_SESSION['user'] = $filas['nombre'];
$_SESSION['servicio'] = $filas['servicio'];
$filas_num=mysqli_num_rows($resultado);
if ($filas_num > 0) {
            if ($filas['rol']==2){
                header('location:pedidos_doc.php');
            } elseif ($filas['rol'] == 1) {
                header('location:index.php');
            } else {
                echo "error";
            }
} 