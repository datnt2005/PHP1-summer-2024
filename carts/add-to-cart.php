<?php
session_start();
include_once './DBUntil.php';

$dbHelper = new DBUntil();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add-to-cart'])) {
    $idProduct = $_POST['idProduct']; // Không cần sử dụng intval ở đây
    $iduser = $_SESSION['id'];

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    $isCheck = $dbHelper->select('SELECT * FROM tiendat_cart WHERE iduser = :iduser AND idProduct = :id', ['iduser' => $iduser, 'id' => $idProduct]);

    if ($isCheck) {
        $quantity = $isCheck[0]['quantityCart'] + 1;
        $condition = "iduser = $iduser AND idProduct = $idProduct";
        $updateCart = $dbHelper->update('tiendat_cart', ['quantityCart' => $quantity], $condition);
    } else {
        $data = [
            'iduser' => $iduser,
            'idProduct' => $idProduct,
            'quantityCart' => 1,
        ];
        $addCart = $dbHelper->insert('tiendat_cart', $data);
    }

    header("Location: http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/cart.php");
    exit();
}
?>
