<?php
require_once('./user.php');
 
$errors =[];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!isset($_POST['email']) || empty($_POST['email'])) {
    $errors['email'] = "email is required";
} 
  if (!isset($_POST['otp']) || empty($_POST['otp'])) {
    $errors['otp'] = "otp is required";
} 
if (!isset($_POST['password']) || empty($_POST['password'])) {
  $errors['password'] = "password is required";
} else {
  if (strlen($_POST['password']) < 6) {
      $errors['password'] = "password lon hon 6 ki tu";
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Password Reset - SB Admin</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
        form input{
            margin-top: 20px;
        }
        button{
            margin-top: 20px;
            margin-bottom: 30px;
            
        }
        #layoutAuthentication_content{
            background: var(--color);
        }
    </style>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                    <form action="" method="post" class="user">
                                        <div class="form-group">
                                            <input type="email" readonly name="email" class="form-control form-control-user" value="<?php if (isset($_GET['email'])) {
                                                                                                                                        echo $_GET['email'];
                                                                                                                                    } else {
                                                                                                                                        echo "";
                                                                                                                                    }
                                                                                                                                    ?>" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." />
                                                                                                                                    <?php
                                            if (isset($errors['email'])) {
                                                echo "<span class='text-danger'>$errors[email]</span>";
                                            }
                                            ?>
                                            <input type="text" name="otp" class="form-control form-control-user" id="exampleInputEmail mb-3" aria-describedby="emailHelp" placeholder="Enter otp 6 number"  />
                                            <?php
                                            if (isset($errors['otp'])) {
                                                echo "<span class='text-danger'>$errors[otp]</span>";
                                            }
                                            ?>
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Password change"  />
                                            <?php
                                            if (isset($errors['password'])) {
                                                echo "<span class='text-danger'>$errors[password]</span>";
                                            }
                                            ?>

                                        </div>
                                        <button type="submit" name="action" value="reset" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php
                                        ">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
               
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
                                            