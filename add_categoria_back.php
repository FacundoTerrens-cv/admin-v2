<?php
require_once('conection.php');
$categoria = $_POST['categoria'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$imagen = $_FILES['imagen']['name'];
    if(isset($imagen) && $imagen != ""){
    $tipo = $_FILES['imagen']['type'];
    $temp  = $_FILES['imagen']['tmp_name'];
        if( !((strpos($tipo,'gif') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg')|| strpos($tipo,'png')))){
          header('location: categorias.php');
        }else{
        $sql = "INSERT INTO contenido_paginas (tipo_contenido, tipo_servicio, titulo, descripcion, imagen1) VALUES ('categoria', '$categoria', '$titulo', '$descripcion', '$imagen')";
        $resultado = mysqli_query($conn, $sql);
        header("location: categorias.php");
            if($resultado){
            move_uploaded_file($temp,'images/'.$imagen); 
            header('location: categorias.php');
            }
        }
    }
?>
