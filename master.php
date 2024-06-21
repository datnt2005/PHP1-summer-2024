<?php
    include_once ('./DBUntil.php');
    include_once ('./Message.php');
    $dbHelper = new DBUntil();
    session_start();
    // $username = $_SESSION['username'];
    // $selectRole = $dbHelper->select("SELECT role FROM users WHERE username = ?", [$username])[0];
    // if(!isset($_SESSION['username'])) {
    //     header("Location:  http://localhost/AsignmentPHP/login.php");
    //     exit();
    // }
    // if ($selectRole['role'] != 'admin') {
    //     header("Location:  http://localhost/AsignmentPHP/index.php");
    //     exit();
    // }
    // $users = $dbHelper->select("SELECT * FROM users");
?>
<?php
    // include "./haf/header.php";
?>




    <body class="sb-nav-fixed">
       
        <div id="layoutSidenav">
            <?php 
            // include "./includes/nav.php";
             ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="row">
                        <?php
                        // include_once('../DBUtil.php');
                        include_once('./Message.php');
                        $view = isset($_GET['view']) ? $_GET['view'] : 'index';
                        var_dump($view);
                        switch ($view) {
                            // case 'user_list':
                            //     include_once('./User/list.php');
                            //     break;
                            // case 'user_delete':
                            //     include_once('./User/delete.php');
                            //     break;
                            // case 'user_update':
                            //     include_once('./User/edit.php');
                            //     break;
                            // case 'user_created':
                            //     include_once('./User/created.php');
                            //     break;                           
                            // case 'category_list':
                            //     include_once('./Categories/list.php');
                            //     break;
                            // case 'category_delete':
                            //     include_once('./Categories/delete.php');
                            //     break;
                            // case 'category_update':
                            //     include_once('./Categories/edit.php');
                            //     break;
                            // case 'category_created':
                            //     include_once('./Categories/createdCat.php');
                            //     break;
                            // case 'product_list':
                            //     include_once('./products/list.php');
                            //     break;
                            // case 'product_delete':
                            //     include_once('./products/delete.php');
                            //     break;
                            // case 'product_update':
                            //     include_once('./products/edit.php');
                            //     break;
                            // case 'product_created':
                            //     include_once('./products/created-Prd.php');
                            //     break;
                            // case 'order_list':
                            //     include_once('./order/order-admin.php');
                            //     break;
                            case 'update_order':
                                include_once('./order/update-order.php');
                                break;
                            case 'Order_confirmation':
                                include_once('./order/Order_confirmation.php');
                                break;
                            case 'refuse_order':
                                include_once('./order/refuse.php');
                                break;
                            case 'general_list':
                                include_once('./order/general.php');
                                break;
                        }


                        ?>
                    </div>
                    </div>
                </main>
                <?php
                    // include('./haf/footer.php');
                ?>
                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
