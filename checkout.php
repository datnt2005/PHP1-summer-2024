<?php

  session_start();
  include_once('./DBUntil.php');
  $dbHelper = new DBUntil();

  use MailService\MailService as MailService;                                    
  require_once('./MailService.php');


  $errors = [];
  echo $_SESSION['id'];
   $currentDateTime = getdate();


// Định dạng ngày giờ cho MySQL
   $mysqlDateTime = date("Y-m-d H:i:s", mktime(
       $currentDateTime['hours'] + 5,
       $currentDateTime['minutes'],
       $currentDateTime['seconds'],
       $currentDateTime['mon'],
       $currentDateTime['mday'],
       $currentDateTime['year']
   ));
//    echo $mysqlDateTime;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate form inputs
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address = $_POST['address'] ?? '';
    $paymentMethod = $_POST['payment_method'] ?? '';
    $orderNote = $_POST['orderNote'] ?? '';

    // Validate inputs and collect errors
    if (empty($username)) $errors['username'] = "Username is required";
    if (empty($email)) $errors['email'] = "Email is required";
    if (empty($phone)) $errors['phone'] = "Phone is required";
    if (empty($address)) $errors['address'] = "Address is required";
    if (empty($paymentMethod)) $errors['message'] = "Please select a payment method";

    // Proceed if no errors
    if (count($errors) == 0) {
        $data = [
            'allPrice' => $_SESSION['totalPrice'],
            'iduser' => $_SESSION['id'],
            'address' => $address,
            'phone' => $phone,
            'email' => $email,
            'username' => $username,
            'orderDate' => $mysqlDateTime,
            'orderNote' => $orderNote,
            'statusOrder' => 1,
        ];
        $cartItems = $dbHelper->select("SELECT * FROM tiendat_cart WHERE iduser = ?", [$_SESSION['id']]);
        
        if ($cartItems) {
            $orders = $dbHelper->insert('tiendat_orders', $data);
            $idOrder = $dbHelper->lastInsertId();
            
            if ($orders) {
                foreach ($cartItems as $cart) {
                    $detailData = [
                        'idOrder' => $idOrder,
                        'idProduct' => $cart['idProduct'],
                        'quantity' => $cart['quantityCart'],
                    ];
                    $orderDetail = $dbHelper->insert('tiendat_detailorder', $detailData);
                }
                
                $removeCart = $dbHelper->delete('tiendat_cart', "iduser = $_SESSION[id]");
                 unset($_SESSION['totalCart']);
                //  var_dump($removeCart);



                $users = $dbHelper->select("SELECT * FROM tiendat_users WHERE iduser = ?", [$_SESSION['id']]);
                
                $usernameuser = $users[0]["username"];
            
                // var_dump($emailuser);
                try {
                    $result = MailService::send(
                    // send email
'ntdad2005@gmail.com',
                        $email,
                        "Order Success",
                        "Hi<b> $usernameuser! </b>
                       <p>Thank you for your order. Please <a href='http://localhost/FPT%20PHP/PHP_1/TIENDAT/list_order.php'>Order details</a> to view your order.</p>",
                    );
                    
                    // var_dump($result);
                } catch (Exception $e) {
                    echo "Có lỗi xảy ra khi gửi email: " . $e->getMessage();
                }

    
                
                // Display a thank you message
                echo "<script>alert('Thank you for your order! Your order has been placed.');</script>";
                
                // Redirect to the cart page or any other page
                echo "<script>window.location.href='http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/cart.php';</script>";
                
                // Exit to ensure no further code execution
                exit();
            } 
        }
            
    }
    $sql = $dbHelper-> select("SELECT * FROM tiendat_orders WHERE iduser =?", [$_SESSION['id']]);
$idOrder = $sql[0]["idOrder"];
$_SESSION['idOrder'] = $idOrder;
echo ($_SESSION['idOrder']);
}



?>

  
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

h4 {
    margin-bottom: 20px;
}

/* Breadcrumb Section */
.breadcrumb-option {
    background-color: #f8f9fa;
    padding: 20px 0;
}

.breadcrumb__text {
    text-align: center;
}

.breadcrumb__links a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb__links a:hover {
    text-decoration: underline;
}

.breadcrumb__links span {
    color: #6c757d;
}

/* Checkout Section */
.checkout {
    padding: 40px 0;
}

.checkout__form {
    background: #fff;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 5px;
}

.checkout__title {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
}

.checkout__input {
    margin-bottom: 20px;
}

.checkout__input p {
    margin-bottom: 5px;
    font-weight: bold;
}

.checkout__input input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.checkout__input__checkbox {
    margin-bottom: 20px;
}

.checkout__input__checkbox label {
    position: relative;
    padding-left: 25px;
    cursor: pointer;
    user-select: none;
    display: inline-block;
}

.checkout__input__checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

.checkout__input__checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 3px;
}

.checkout__input__checkbox input:checked ~ .checkmark {
    background-color: #007bff;
}
.checkout__input__checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.checkout__input__checkbox input:checked ~ .checkmark:after {
    display: block;
}

.checkout__input__checkbox .checkmark:after {
    left: 7px;
    top: 3px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}

/* Order Summary */
.checkout__order {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.order__title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.checkout__order__products {
    font-weight: bold;
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
    margin-bottom: 20px;
}

.checkout__total__products li,
.checkout__total__all li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.checkout__total__all {
    font-weight: bold;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}

.site-btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
}

.site-btn:hover {
    background-color: #0056b3;
}

    </style>
    <body>
        <?php
            include ('./haf/header.php');
        ?>
    
    <section class="breadcrumb-option" style = "background :#F9F3EC">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="checkout.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/cart.php">Click
                                    here</a> to enter your code</h6>
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
<p>Username<span>*</span></p>
                                            <input type="text" name= "username">
                                            <?php   
                                                if(isset($errors['username'])) {
                                                    echo "<span style ='color :red; '>$errors[username] </span><br>";
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text" name= "phone">
                                            <?php   
                                                if(isset($errors['phone'])) {
                                                    echo "<span style ='color :red; '>$errors[phone] </span><br>";
                                                }
                                                ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="email" name= "email">
                                            <?php   
                                                if(isset($errors['email'])) {
                                                echo "<span style ='color :red; '>$errors[email] </span><br>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Address<span>*</span></p>
                                            <input type="text" name= "address">
                                            <?php   
                                                if(isset($errors['address'])) {
                                                    echo "<span style ='color :red; '>$errors[address] </span><br>";
                                                }
                                                ?>                              
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        
                            <div class="">
                                <label for="diff-acc">
Note about your order, e.g, special noe for delivery
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="orderNote" placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">                          
                                
                                <ul class="checkout__total__all">
                                    <li>Total: <span class = "text-danger fw-bold" name = "totalPrice">
                                    <?php 
                                     echo "$".$_SESSION['totalPrice']; ?></span></li>
                                </ul>                                
                                <div class="checkPay">
                                    <input type="radio" class="form-check-input flex-shrink-0" name="payment_method" id="payment" value="1">
                                    <span name = "paymentDelivery" class="checkmark">Payment on delivery</span><br>
                                    <input type="radio" class="form-check-input flex-shrink-0" name="payment_method" id="paypal" value="2">
                                    <span name = "vnpay" class="checkmark">VNPAY</span>
                                </div>
                                <p name="message"></p>
                                <?php   
                                                if(isset($errors['message'])) {
                                                    echo "<span style ='color :red; '>$errors[message] </span><br>";
                                                }
                                               
                                               ?>
                                <button type="submit" name="submit" value="submit" class="site-btn">PLACE
                                    ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    <?php
            include ('./haf/footer.php');
        ?>
    </body>
    </html>
