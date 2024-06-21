<?php
session_start();
include_once('./DBUntil.php');

// Initialize database helper and errors array
$dbHelper = new DBUntil();
$errors = [];

// Fetch cart items and join with product details
$carts = $dbHelper->select("SELECT * FROM tiendat_cart CA INNER JOIN tiendat_products PR ON CA.idProduct = PR.idProduct");

// Function to calculate the total price of items in the cart
function getTotal($carts)
{
    $sum = 0;
    foreach ($carts as $cart) {
        $sum += $cart['price'] * $cart['quantityCart'];
    }
    return $sum;
}

// Calculate initial total
$total = getTotal($carts);
$discount = 0; // Default discount is 0

// Process coupon code if submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['code'])) {
    $code = $_POST['code'];
    $currentDate = date('Y-m-d');
    // Fetch coupon details if valid
    $coupon = $dbHelper->select("SELECT * FROM xuong_products_coupon WHERE code = :code AND endDate >= :currentDate", [
        'code' => $code,
        'currentDate' => $currentDate
    ]);

    if (!empty($coupon)) {
        $discount = $coupon[0]['discount'];
    } else {
        $errors['code'] = "Invalid or expired coupon code.";
    }

    // Calculate the discount amount
   
 
   
} $isDiscount = $total * ($discount / 100);
    $endtotal = $total - $isDiscount;
    $_SESSION['totalPrice'] = $endtotal;
?>

<!-- HTML and PHP Mix for Displaying the Cart -->

<?php include('../haf/header.php'); ?>

<section class="banner-contact" style="background: #F9F3EC; height: 200px; padding-top: 70px;">
    <div class="container banner-items">
        <h2>Cart</h2>
        <nav class="breadcrumb">
            <a href="index.html" class="breadcrumb-item nav-link">Home</a>
            <a href="#" class="breadcrumb-item nav-link">Pages</a>
            <span class="breadcrumb-item active">Cart</span>
        </nav>
    </div>
</section>

<section id="cart">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 custom-padding">
                <table class="table p-3">
                    <thead>
                        <tr>
                            <th class="align-middle">PRODUCT</th>
                            <th class="align-middle">QUANTITY</th>
                            <th class="align-middle">SUBTOTAL</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($carts as $cart): ?>
                        <tr>
                            <td class="py-4 align-middle">
                                <div class="cart-info d-md-flex flex-wrap align-items-center">
                                    <div class="col-lg-3">
                                        <div class="cart-image">
                                            <img src="http://localhost/FPT%20PHP/PHP_1/TIENDAT/products/uploads/<?= htmlspecialchars($cart['img']); ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="cart-detail">
                                            <h5 class="cart-title">
                                                <a href="./detail.php?id=<?= htmlspecialchars($cart['idProduct']); ?>" class="text-decoration-none text-dark fw-bold" style="margin-left: 200px;"><?= htmlspecialchars($cart['name']); ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 align-middle">
                                <div class="cart-quantity d-md-flex align-items-center">
                                    <input type="number" name="quantity" class="cart-quantity" value="<?= htmlspecialchars($cart['quantityCart']); ?>" disabled>
                                </div>
                            </td>
                            <td class="py-4 align-middle replace-font">
                                $<?= number_format($cart['price'] * $cart['quantityCart'], 2); ?>
                            </td>
                            <td class="py-4 align-middle">
                                <a href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/delete-cart.php?id=<?= htmlspecialchars($cart['idCart']); ?>" class="cart-remove text-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 custom-padding">
                <div class="cart-total">
                    <h2 class="pb-4">Cart Total</h2>
                    <div class="total-price pb-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <form class="coupon-form" action="" method="post">
                                            <input name="code" class="form-control form-control-sm" type="text" placeholder="Coupon code" required>
                                            <button class="btn btn-outline-primary btn-sm" name="action" value="checkCode" type="submit">Apply Coupon</button>
                                            <?php if (!empty($errors['code'])): ?>
                                                <div class="error"><?= $errors['code']; ?></div>
                                            <?php endif; ?>
                                            <?php if ($discount): ?>
                                                <div class="discount"><?= $discount . "%"; ?></div>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th>SUBTOTAL</th>
                                    <td><span class="subtotal-price"><?php echo "$" .$total; ?></span></td>
                                </tr>
                                <tr>
                                    <th>DISCOUNT</th>
                                    <td><span class="subtotal-price"><?php global $discount; 
                                                                                global $isDiscount; 
                                                                                echo $isDiscount; ?></span></td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td><span class="total-price"><?php
                                     global $endtotal;
                                    echo "$".$endtotal; 
                                    ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-dark fs-6 p-3 w-100">UPDATE CART</button>
                        </div>
                        <div class="col-md-6">
                            <a href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/shop.php">
                                <button class="btn btn-dark fs-6 p-3 w-100">CONTINUE TO SHOP</button>
                            </a>
                        </div>
                        <a href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/checkout.php">
                            <div class="col-md-12 mt-1">
                                <button class="btn btn-primary check-out text-uppercase p-3 w-100">Proceed to checkout</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="service">
    <div class="container">
        <div class="row">
            <div class="col-md-3 cards-dad">
                <div class="cards">
                    <div class="card-border-icon">
                        <i data-lucide="shopping-cart"></i>
                    </div>
                    <h3>Free Delivery</h3>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 cards-dad">
                <div class="cards">
                    <div class="card-border-icon">
                        <i data-lucide="refresh-cw"></i>
                    </div>
                    <h3>Easy Returns</h3>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 cards-dad">
                <div class="cards">
                    <div class="card-border-icon">
                        <i data-lucide="lock"></i>
                    </div>
                    <h3>Secure Payments</h3>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 cards-dad">
                <div class="cards">
                    <div class="card-border-icon">
                        <i data-lucide="tag"></i>
                    </div>
                    <h3>Best Prices</h3>
                    <div class="card-text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('../haf/footer.php'); ?>

<script src="path/to/bootstrap.bundle.min
