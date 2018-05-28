<?php
include("../model/Producto.php");

$product = new Producto();
$array_producto = Array();
$array_producto = $product->listarProductos();
//echo json_encode(array("$product"=>$array_producto));

$resp = [];
foreach ($array_producto as $p){
    $productoArray = $p->toArray();
    array_push($resp , $productoArray);
}

header('Content-Type: application/json');

echo json_encode($resp);


?>