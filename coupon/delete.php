
<?php
// include_once('./DBUntil.php');
// // $idCoupons = $_GET['idCoupons'];



// $dbHelper = new DBUntil();
// $databaseId = $dbHelper->select("SELECT idCoupons FROM xuong_products_coupon");

// $productId = $dbHelper->delete(" DELETE * FROM xuong_products_coupon WHERE  idCoupons = $databaseId");
// var_dump($productId);
// header("Location: index.php");



include_once('./DBUntil.php');

// Retrieve idCoupons from the URL
$idCoupons = isset($_GET['idCoupons']) ? intval($_GET['idCoupons']) : 0;
var_dump($idCoupons);

if ($idCoupons > 0) {
    // Initialize DB helper
    $dbHelper = new DBUntil();

    // Check if the coupon exists
    $databaseId = $dbHelper->select("SELECT idCoupons FROM xuong_products_coupon WHERE idCoupx`ons = :idCoupons", array('idCoupons' => $idCoupons));

    if (!empty($databaseId)) {
        // Perform the deletion
        $deleteSuccess = $dbHelper->delete("DELETE FROM xuong_products_coupon WHERE idCoupons = :idCoupons", array('idCoupons' => $idCoupons));

        if ($deleteSuccess) {
            // Redirect after successful deletion
            header("Location: http://localhost/FPT%20PHP/PHP_1/xuongthuchanh/tranning/ca1/products/coupon/index.php");
            exit;
        } else {
            // Handle deletion error
            echo "Error deleting the coupon. Please try again.";
        }
    } else {
        // Handle case where the coupon does not exist
        echo "Coupon with id $idCoupons does not exist.";
    }
} else {
    // Handle invalid or missing idCoupons parameter
    echo "Invalid coupon ID.";
}
?>
