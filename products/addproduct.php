<?php
include_once('./DBUntil.php');

$dbHelper = new DBUntil();

$products = $dbHelper->select("SELECT * FROM tiendat_products");
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $errors['name'] = "Name is required";
    }

    if (!empty($_POST['price'])) {
        $price = $_POST['price'];
    } else {
        $errors['price'] = "Price is required";
    }

    if (!empty($_POST['idCategories'])) {
        $idCategories = $_POST['idCategories'];
    } else {
        $errors['idCategories'] = "Category is required";
    }

    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $IMAGE_TYPES = array('jpg', 'jpeg', 'png');

        if (file_exists($target_file)) {
            $errors['img'] = "Sorry, file already exists.";
        }

        if (!in_array($imageFileType, $IMAGE_TYPES)) {
            $errors['img'] = "Image type must be JPG, JPEG, or PNG.";
        }

        if ($_FILES['img']["size"] > 1000000) {
            $errors['img'] = "Image file size is too large.";
        }

        // If no errors, proceed with file upload
        if (empty($errors)) {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $img = htmlspecialchars(basename($_FILES["img"]["name"]));
            } else {
                $errors['img'] = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $errors['img'] = "No file uploaded.";
    }

    if (empty($errors)) {
        // Insert data into database
        $data = array(
            "name" => $name,
            "price" => $price,
            "img" => $img,
            "idCategories" => $idCategories,
        );
        $isCreate = $dbHelper->insert('tiendat_products', $data);

        if ($isCreate) {
            echo "Product added successfully!";
            // Clear form data if needed
            $name = $price = $idCategories = '';
        } else {
            echo "Error adding product. Please try again.";
        }
    }
}
?>
