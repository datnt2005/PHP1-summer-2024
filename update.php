<?php
include_once('./DBUntil.php');
ini_set('display_errors', '1');
$dbHelper = new DBUntil();
$errors = [];
$iduser = $_GET['id'];

// Fetch the user data based on ID
$users = $dbHelper->select("SELECT * FROM tiendat_users WHERE iduser = ?", array($iduser))[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["iduser"]) || empty($_POST["iduser"])) {
        $errors['iduser'] = "iduser danh mục không được để trống";
    } 
  
    if (!isset($_POST["username"]) || empty($_POST["username"])) {
        $errors['username'] = "username danh mục không được để trống";
    } 
  
    
    if (!isset($_POST["password"]) || empty($_POST["password"])) {
        $errors['password'] = "password danh mục không được để trống";
    } 
    if (!isset($_POST["email"]) || empty($_POST["email"])) {
        $errors['email'] = "email danh mục không được để trống";
    } 
    if (!isset($_POST["phone"]) || empty($_POST["phone"])) {
        $errors['phone'] = "phone danh mục không được để trống";
    } 
    if (!isset($_POST["role"]) || empty($_POST["role"])) {
        $errors['role'] = "role danh mục không được để trống";
    } 
    
     else {
        $data = [

            'iduser' => $_POST['iduser'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            
            'email' => $_POST['email'],
            'role' => $_POST['role'],
            'phone' => $_POST['phone'],
          
          ];
        $isUpdate = $dbHelper->update('tiendat_users',$data, "iduser = '$iduser'");
        if ($isUpdate) {
            // Redirect to the index page after successful update
            echo "<script> alert 'update thanh cong'</script>";
            header("Location: list_user.php");

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
                
                <input type="text" name="iduser" class="form-control" value="<?php echo htmlspecialchars($users['iduser']); ?>" placeholder="iduser">
                <?php
                    if (isset($errors['iduser'])) {
                        echo "<span class='text-danger'>{$errors['iduser']}</span>";
                    }   
                ?>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($users['username']); ?>" placeholder="username">
                <?php
                    if (isset($errors['username'])) {
                        echo "<span class='text-danger'>{$errors['username']}</span>";
                    }   
                ?>
                <input type="text" name="password" class="form-control" value="<?php echo htmlspecialchars($users['password']); ?>" placeholder="password">
                <?php
                    if (isset($errors['password'])) {
                        echo "<span class='text-danger'>{$errors['password']}</span>";
                    }   
                ?>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($users['email']); ?>" placeholder="email">
                <?php
                    if (isset($errors['email'])) {
                        echo "<span class='text-danger'>{$errors['email']}</span>";
                    }   
                ?>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($users['phone']); ?>" placeholder="phone">
                <?php
                    if (isset($errors['phone'])) {
                        echo "<span class='text-danger'>{$errors['phone']}</span>";
                    }   
                ?>
                
            </div>
                <input type="text" name="role" class="form-control" value="<?php echo htmlspecialchars($users['role']); ?>" placeholder="role">
                <?php
                    if (isset($errors['role'])) {
                        echo "<span class='text-danger'>{$errors['role']}</span>";
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