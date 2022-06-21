<?php

  require_once('conection.php');
$categoria = $_POST['categoria'];
$servicio = $_POST['servicio'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$sql = "INSERT INTO contenido_paginas (tipo_contenido, tipo_servicio, servicio, titulo, descripcion) VALUES ('seccion', '$categoria', '$servicio', '$titulo', '$descripcion')";
mysqli_query($conn, $sql);
header("location: servicios.php");
?>