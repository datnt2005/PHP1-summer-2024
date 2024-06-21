<?php
include_once('./DBUntil.php');
$idProduct = $_GET['id'];
var_dump($idProduct);


$dbHelper = new DBUntil();

$categories = $dbHelper->delete("tiendat_products", "idProduct = $idProduct");
header("Location: index.php");