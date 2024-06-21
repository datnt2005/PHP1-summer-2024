<?php
include_once('./DBUntil.php');
ini_set('display_errors', '1');
$dbHelper = new DBUntil();

// Function to validate Vietnamese phone numbers
function isVietnamesePhoneNumber($number)
{
    return preg_match('/^(03|05|07|08|09|01[2689])[0-9]{8}$/', $number) === 1;
}

// Function to check if email already exists in the database
function ischeckmail($email)
{
    $dbHelper = new DBUntil();
    $emailExists = $dbHelper->select("SELECT email FROM tiendat_users WHERE email = ?", [$email]);
    return count($emailExists) > 0;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username
    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $errors['username'] = "Username is required";
    } else {
        $username = $_POST['username'];
    }
    
    // Validate email
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        } else {
            if (ischeckmail($_POST["email"])) {
                $errors['email'] = "Email already exists";
            } else {
                $email = $_POST['email'];
            }
        }
    }
    
    // Validate password
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $errors['password'] = "Password is required";
    } else {
        if (strlen($_POST['password']) < 6) {
            $errors['password'] = "Password must be at least 6 characters long";
        } else {
            $password = $_POST['password'];
        }
    }
    
    // Validate role
    if (!isset($_POST['role']) || empty($_POST['role'])) {
        $errors['role'] = "Role is required";
    } else {
        $role = $_POST['role'];
    }
  
    // Validate phone number
    if (!isset($_POST['phone']) || empty($_POST['phone'])) {
        $errors['phone'] = "Phone number is required";
    } else {
        if (!isVietnamesePhoneNumber($_POST['phone'])) {
            $errors['phone'] = "Phone number is not correctly formatted";
        } else {
            $phone = $_POST['phone'];
        }
    }

    // If no errors, insert data into the database
    if (empty($errors)) {
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'phone' => $phone,
        ];
        
        $isCreate = $dbHelper->insert('tiendat_users', $data);

        if ($isCreate) {
            // Redirect to the same page to see the new record in the table
            header("Location: " . $_SERVER['PHP_SELF']);
            echo "<script>alert('Tạo tài khoản thành công');</script>";
            exit();
        } else {
            $errors['database'] = "Failed to create new user";
        }
    }
}

// Fetch existing users (if needed)
$users = $dbHelper->select("SELECT * FROM tiendat_users");
?>
