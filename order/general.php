<?php
include_once('../DBUntil.php');

// Bắt đầu session
session_start();

$dbHelper = new DBUntil();

// Lấy dữ liệu từ cơ sở dữ liệu
$orders = $dbHelper->select("SELECT * FROM tiendat_orders");
$products = $dbHelper->select("SELECT * FROM tiendat_products");
$users = $dbHelper->select("SELECT * FROM tiendat_users");
$salesInDate = $dbHelper->select("
    SELECT DATE(orderDate) AS order_day, SUM(allPrice) AS total_revenue
    FROM tiendat_orders
    WHERE statusOrder = '3'
    GROUP BY DATE(orderDate)
    ORDER BY order_day
");
$salesCharts = $dbHelper->select("
    SELECT DATE(orderDate) AS day, COUNT(idOrder) AS total_orders, SUM(allPrice) AS total_sales 
    FROM tiendat_orders 
    GROUP BY day 
    ORDER BY day
");

$labels = [];
$totalOrders = [];
$totalSales = [];

foreach ($salesCharts as $row) {
    $labels[] = $row['day'];
    $totalOrders[] = $row['total_orders'];
    $totalSales[] = $row['total_sales'];
}

$labelsJson = json_encode($labels);
$totalOrdersJson = json_encode($totalOrders);
$totalSalesJson = json_encode($totalSales);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://kit.fontawesome.com/1d3d4a43fd.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <title>Thống kê</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1 class="container text-aline-center">Thống kê</h1>
    <ol class="breadcrumb container">
        <li class="breadcrumb-item"><a class="text-decoration-none btn btn-primary" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/index_admin.php">Home</a></li>
        
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="quantiy_product d-flex align-items-center">
                    <h5>Số lượng sản phẩm:</h5>
                    <p class="mb-1 mx-2 fw-bold"><?php echo count($products); ?></p>
                </div>
                <div class="quantity-user d-flex align-items-center">
                    <h5>Số lượng người dùng:</h5>
                    <p class="mb-1 mx-2 fw-bold"><?php echo count($users); ?></p>
                </div>
                <div class="quantity-order d-flex align-items-center">
                    <h5>Số lượng đơn hàng:</h5>
                    <p class="mb-1 mx-2 fw-bold"><?php echo count($orders); ?></p>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo $order['idOrder']; ?></td>
                                <td>
                                    <?php 
                                    switch ($order['statusOrder']) {
                                        case 7:
                                            echo "Đã hủy đơn.";
                                            break;
                                        case 6:
                                            echo "Giao hàng thất bại.";
                                            break;
                                        case 8:
                                            echo "Giao hàng thành công.";
                                            break;
                                        default:
                                            echo "Đơn hàng đang được xử lí.";
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="warning-products">
                    <h4 class="text-warning">Cảnh báo:</h4>
                    <?php foreach ($products as $product): 
                        if ($product['quantity'] < 3): ?>
                            <p>Sản phẩm <b><?php echo $product['name']; ?></b> sắp hết hàng</p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="total-revenue">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Danh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($salesInDate as $sale): ?>
                                <tr>
                                    <td><?php echo $sale['order_day']; ?></td>
                                    <td>$<?php echo $sale['total_revenue']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <script>
        // Nhận dữ liệu từ PHP
        var labels = <?php echo $labelsJson; ?>;
        var totalOrders = <?php echo $totalOrdersJson; ?>;
        var totalSales = <?php echo $totalSalesJson; ?>;

        // Tạo biểu đồ
        var ctx = document.getElementById('myChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Orders',
                    data: totalOrders,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Total Sales',
                    data: totalSales,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
