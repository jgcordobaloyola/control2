<?php
include '../model/Producto.php';

$method = $_SERVER['REQUEST_METHOD'];
  if($method=="POST"){
    $producto = new Producto();
    $producto->setId($_POST["id"]);
    $producto->setNombre($_POST["nombre"]);
    $producto->setCodigo($_POST["codigo"]);
    $producto->setValor($_POST["valor"]);
    $resp = $producto->updateById();
    if($resp[0]){
      http_response_code(200);
    }else{
      http_response_code(400);
    }
    echo $resp[1];
  }


?>