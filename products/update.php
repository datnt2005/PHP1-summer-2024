<?php
include_once('./DBUntil.php');

$dbHelper = new DBUntil();
$errors = [];
$idProduct  = $_GET['id'] ?? null;

// Kiểm tra nếu idProduct có tồn tại và hợp lệ
if ($idProduct && filter_var($idProduct, FILTER_VALIDATE_INT)) {
    // Lấy dữ liệu sản phẩm dựa trên ID
    $product = $dbHelper->select("SELECT * FROM tiendat_products WHERE idProduct = ?", array($idProduct))[0];

    // Lấy danh mục sản phẩm
    $categories = $dbHelper->select("SELECT * FROM tiendat_categories");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_POST["idProduct"]) || empty($_POST["idProduct"])) {
            $errors['idProduct'] = "idProduct không được để trống";
        } 
        if (!isset($_POST["name"]) || empty($_POST["name"])) {
            $errors['name'] = "Tên sản phẩm không được để trống";
        } 
        if (!isset($_POST["price"]) || empty($_POST["price"])) {
            $errors['price'] = "Giá sản phẩm không được để trống";
        }
        if (!isset($_FILES["img"]) || $_FILES["img"]["error"] != UPLOAD_ERR_OK) {
            $errors['img'] = "Hình ảnh sản phẩm không được để trống";
        } 
        if (!isset($_POST["idCategories"]) || empty($_POST["idCategories"])) {
            $errors['idCategories'] = "Danh mục không được để trống";
        } 

        if (empty($errors)) {
            $data = [
                'idProduct' => $_POST['idProduct'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'img' => $_POST['img'],
                'idCategories' => $_POST['idCategories'],
            ];
            // Cập nhật sản phẩm
            $isUpdate = $dbHelper->update('tiendat_products', $data, "idProduct = ?", [$idProduct]);
            if ($isUpdate) {
                // Chuyển hướng sau khi cập nhật thành công
                echo "<script>alert('Cập nhật thành công');</script>";
                header("Location: index.php");
                exit();
            } else {
                $errors['database'] = "Không thể cập nhật sản phẩm";
            }
        }
    }
} else {
    // Xử lý nếu idProduct không hợp lệ
    $errors['idProduct'] = "ID sản phẩm không hợp lệ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <h2>Edit Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="idProduct">ID Product</label>
                <input type="text" name="idProduct" class="form-control" value="<?php echo htmlspecialchars($product['idProduct']); ?>" placeholder="ID Product">
                <?php if (isset($errors['idProduct'])) { echo "<span class='text-danger'>{$errors['idProduct']}</span>"; } ?>
            </div>
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" placeholder="Product Name">
                <?php if (isset($errors['name'])) { echo "<span class='text-danger'>{$errors['name']}</span>"; } ?>
            </div>
            <div class="mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" placeholder="Price">
                <?php if (isset($errors['price'])) { echo "<span class='text-danger'>{$errors['price']}</span>"; } ?>
            </div>
            <div class="mb-3">
                <label for="img">Image</label>
                <input type="file" name="img" class="form-control" value="<?php echo htmlspecialchars($product['img']); ?>" placeholder="Image">
                <?php if (isset($errors['img'])) { echo "<span class='text-danger'>{$errors['img']}</span>"; } ?>
            </div>
            <div class="mb-3">
                <label for="idCategories">Category</label>
                <select name="idCategories" id="idCategories" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    foreach ($categories as $cat) {
                        echo '<option value="'.htmlspecialchars($cat['idCategories']).'"'.($cat['idCategories'] == $product['idCategories'] ? ' selected' : '').'>'.htmlspecialchars($cat['name']).'</option>';
                    }
                    ?>
                </select>
                <?php if (isset($errors['idCategories'])) { echo "<span class='text-danger'>{$errors['idCategories']}</span>"; } ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-warning" value="Cập nhật">
            </div>
        </form>
    </div>
</body>
</html>
