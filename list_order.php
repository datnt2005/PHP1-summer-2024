<?php
    include_once('./DBUntil.php');
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: http://localhost/FPT%20PHP/PHP_1/TIENDAT/login.php");
        exit();
    }
    $id = $_SESSION['id'];
    $dbHelper = new DBUntil();
    // $orders = $dbHelper->select("SELECT * FROM tiendat_orders");
    $sql = $dbHelper->select("SELECT allPrice, username, email, phone, address, orderDate, orderDate, orderNote, statusOrder FROM tiendat_orders WHERE iduser=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Order History</title>
</head>
<body>
    <?php
        include "./haf/header.php";
    ?>
 <div class="container">
        <section class="banner-contact" style="background: #F9F3EC; width: 100%;  padding-top: 70px;">
    <div class="container banner-items">
        <h3>Order History</h3>
        <nav class="breadcrumb">
            <a href="index.html" class="breadcrumb-item nav-link">Home</a>
            <a href="#" class="breadcrumb-item nav-link">Pages</a>
            <span class="breadcrumb-item active">Cart</span>
        </nav>
    </div>
</section>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    
                    <th>totalPrice</th>
                    <th>Khach Mua</th>
                    <th>email</th>
                    <th>Dien thoai</th>
                    <th>Dia chi</th>
                    <th>Thoi gian</th>
                    <th>Note</th>
                    <th>Status</th>
              
                 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sql as $order): ?>
                    <tr>
             
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
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <?php
         include "./haf/footer.php";
    ?>
</body>
</html>