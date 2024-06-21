<?php
include_once('./DBUntil.php');
$iduser = $_GET['id'];
var_dump($iduser);


$dbHelper = new DBUntil();

$categories = $dbHelper->delete("tiendat_users", "iduser = $iduser");
header("Location: list_user.php");