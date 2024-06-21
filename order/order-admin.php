<?php
include_once('../DBUntil.php');
$dbHelper = new DBUntil();
$orders = $dbHelper->select("select * from tiendat_orders");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí đơn hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 20px;
            font-family: Arial, sans-serif;
        }
        .btn-group {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Quản lí đơn hàng</h1> 
        <a href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/index_admin.php"><button class="btn btn-primary">back</button></a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Order</li>
        </ol>
        <div class="d-flex justify-content-end btn-group">
            <a href="master.php?view=product_created" class="btn btn-primary px-4">Add Product</a>
        </div>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>iduser</th>
                    <th>id</th>
                    <th>totalPrice</th>
                    <th>Khach Mua</th>
                    <th>email</th>
                    <th>Dien thoai</th>
                    <th>Dia chi</th>
                    <th>Thoi gian</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['iduser']; ?></td>
                        <td><?php echo $order['idOrder']; ?></td>
                        <td>$<?php echo $order['allPrice']; ?></td>
                        <td><?php echo $order['username']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['phone']; ?></td>
                        <td><?php echo $order['address']; ?></td>
                        <td><?php echo $order['orderDate']; ?></td>
                        <td><?php echo $order['orderNote']; ?></td>
                        <td>
                            <?php
                            switch ($order['statusOrder']) {
                                case 1:
                                    echo "Chờ xác nhận";
                                    break;
                                case 3:
                                    echo "Chuẩn bị hàng";
                                    break;
                                case 5:
                                    echo "Từ chối";
                                    break;
                                default:
                                    echo "Trạng thái không xác định";
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($order['statusOrder'] == 1): ?>
                                <a class="btn btn-primary" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/master.php?view=Order_confirmation&id=<?php echo $order['idOrder']; ?>">Xác Nhận</a>
                                <a class="btn btn-danger mx-3" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/master.php?view=refuse_order&id=<?php echo $order['idOrder']; ?>">Từ Chối</a>
                            <?php elseif ($order['statusOrder'] == 3): ?>
                                <a class="btn btn-primary" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/master.php?view=update_order&id=<?php echo $order['idOrder']; ?>">Chuẩn bị hàng</a>
                            <?php elseif ($order['statusOrder'] == 5): ?>
                                <a class="btn btn-danger" href="#">Từ Chối</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
