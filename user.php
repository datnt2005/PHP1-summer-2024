<?php
ini_set('display_errors', '1');
require('./DBUntil.php');

use MailService\MailService as MailService;

require_once('./MailService.php');
$dbHelper = new DBUntil();

function forgotPassword()
{
    global $dbHelper;
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
        $users = $dbHelper->select("SELECT * FROM tiendat_users WHERE email = :email", ['email' => $email]);
        var_dump($users);

        if ($users && count($users) > 0) {
            $six_digit_random_number = random_int(100000, 999999);
            // update code database
            $data = [
                'otp' => $six_digit_random_number,
                'otpCreated' => date('Y-m-d H:i:s', strtotime('+1 hour')),
            ];
            $updateUser = $dbHelper->update('tiendat_users', $data  ,"email = '$email'");
            header('Location: reset-password.php');
            // var_dump(is_bool($updateUser));
            
            if ($updateUser) {
                try {
                    $result = MailService::send(
                    // send email
                        'ntdad2005@gmail.com',
                        $email,
                        'Forgot Password',
                        "
                        <a href='http://localhost/FPT%20PHP/PHP_1/TIENDAT/reset-password.php?email=$email'>Reset Password</a>
                        Your token is: <b>$six_digit_random_number</b>"
                    );
                    
                    // var_dump($result);
                } catch (Exception $e) {
                    var_dump($e->getMessage());
                }
            } else {
                echo "Failed to update the user with OTP.";
            }
        } else {
            $errors['email'] = "Email does not exist";
        }
    }
}

function resetPassword()
{
    global $dbHelper;
    if (
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['otp']) && !empty($_POST['otp']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ) {
        $email = $_POST['email'];
        $otp = $_POST['otp'];
        $password = $_POST['password'];

        $isCheck = $dbHelper->select("SELECT * FROM tiendat_users WHERE email = :email AND otp = :otp AND otpCreated >= :current", [
            'email' => $email,
            'otp' => $otp,
            'current' => date('Y-m-d H:i:s')
        ]);
        // var_dump($isCheck);

        if ($isCheck && count($isCheck) > 0) {
            // Perform password reset logic here
            $isReset = $dbHelper->update('tiendat_users', array('password'=>$password), "email = '$email'");
            header('Location: login.php');
        } else {
            $errors['email'] = "Email or OTP is incorrect or expired.";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "forgot":
            forgotPassword();
            break;
        case "reset":
            resetPassword();
            break;
    }
}
?>