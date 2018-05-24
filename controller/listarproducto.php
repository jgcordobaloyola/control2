<?php
include("../model/Producto.php");

//$producto = new Producto();
//
//
//$query = $producto->listar();
//while ($resultado = mysql_fetch_array($query)){
//    echo $resultado['id'];
//}

//print_r($producto->listar());// $producto->listar();

$product = new Producto();
$array_producto = Array();
//$products = Array();
$array_producto = $product->listProduc();
echo json_encode($array_producto);

?>