<?php
include_once ('./DBUntil.php');
$id = $_GET['id'];
var_dump($id);


$dbHelper = new DBUntil();

$categories = $dbHelper->delete("tiendat_cart", "idCart = $id");
header("location: http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/cart.php");