<?php
    $dbHelper = new DBUntil();
    $errors = [];
    $id = $_GET['id'];
    $data = [
        'statusOrder' => 5,
    ]; 
    $isUpdate = $dbHelper->update('tiendat_orders', $data, "idOrder = $id");
        if ($isUpdate) {
            // header("Location: http://localhost/FPT%20PHP/PHP_1/TIENDAT/master.php?view=order_list");
            header("Location: http://localhost/FPT%20PHP/PHP_1/TIENDAT/order/order-admin.php");
            exit();
        } else {
            $errors['database'] = "Failed to update user";
        }
?>