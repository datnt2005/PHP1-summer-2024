<?php
include_once('./DBUntil.php');

$dbHelper = new DBUntil();
$errors = [];
$id = $_GET['id'];

// Fetch the user data based on ID
$product = $dbHelper->select("SELECT * FROM xuong_products WHERE id = ?", array($id))[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["id"]) || empty($_POST["id"])) {
        $errors['id'] = "id danh mục không được để trống";
    } 
    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $errors['name'] = "Tên danh mục không được để trống";
    } 
    if (!isset($_POST["price"]) || empty($_POST["price"])) {
        $errors['price'] = "price danh mục không được để trống";
    } 
    if (!isset($_POST["description"]) || empty($_POST["description"])) {
        $errors['description'] = "description danh mục không được để trống";
    } 
    if (!isset($_POST["img"]) || empty($_POST["img"])) {
        $errors['img'] = "img danh mục không được để trống";
    } 
    if (!isset($_POST["stock"]) || empty($_POST["stock"])) {
        $errors['stock'] = "stock danh mục không được để trống";
    } else {
        $data = [
            'id' => $_POST['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'description' => $_POST['description'],
            'img' => $_POST['img'],
            'stock' => $_POST['stock'],
          ];
        $isUpdate = $dbHelper->update('xuong_products',$data, "id = $id");
        if ($isUpdate) {
            // Redirect to the index page after successful update
            echo "<script> alert 'update thanh cong'</script>";
            header("Location: index.php");

            exit();
            
        } 
        else {
            $errors['database'] = "Failed to update user";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Edit User</h2>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="id" class="form-control" value="<?php echo htmlspecialchars($product['id']); ?>" placeholder=" ID">
                <?php
                    if (isset($errors['id'])) {
                        echo "<span class='text-danger'>{$errors['id']}</span>";
                    }   
                ?>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" placeholder="Tên danh mục">
                <?php
                    if (isset($errors['name'])) {
                        echo "<span class='text-danger'>{$errors['name']}</span>";
                    }   
                ?>
                <input type="text" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" placeholder="price">
                <?php
                    if (isset($errors['price'])) {
                        echo "<span class='text-danger'>{$errors['price']}</span>";
                    }   
                ?>
                <input type="text" name="description" class="form-control" value="<?php echo htmlspecialchars($product['description']); ?>" placeholder="description">
                <?php
                    if (isset($errors['description'])) {
                        echo "<span class='text-danger'>{$errors['description']}</span>";
                    }   
                ?>
                <input type="text" name="img" class="form-control" value="<?php echo htmlspecialchars($product['img']); ?>" placeholder="img">
                <?php
                    if (isset($errors['img'])) {
                        echo "<span class='text-danger'>{$errors['img']}</span>";
                    }   
                ?>
                <input type="text" name="stock" class="form-control" value="<?php echo htmlspecialchars($product['stock']); ?>" placeholder="stock">
                <?php
                    if (isset($errors['stock'])) {
                        echo "<span class='text-danger'>{$errors['stock']}</span>";
                    }   
                ?>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-warning" value="Cập nhật">
            </div>
        </form>
    </div>

</body>

</html>