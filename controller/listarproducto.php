<?php
include("../model/Producto.php");

$producto = new Producto();


$query = $producto->listar();
while ($resultado = mysql_fetch_array($query)){
    echo $resultado['id'];
}

//print_r($producto->listar());// $producto->listar();

?>