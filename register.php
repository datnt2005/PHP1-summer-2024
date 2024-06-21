<?php
require_once('./add_user.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
  <script src="https://kit.fontawesome.com/1d3d4a43fd.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <link
            href="https://fonts.googleapis.com/css2?family=Chilanka&amp;family=Montserrat:wght@300;400;500&...lay=swap"
            rel="stylesheet">
    <title>regiter</title>
</head>
<body>
   
      <section id="banner" class="py-3" style="background: #F9F3EC;">
        <div class="container">
            <div class="hero-content py-5 my-3">
                <h2 class="display-1 mt-3 mb-0">Account</h2>
                <nav class="breadcrumb">
                    <a class="breadcrumb-item nav-link" href="#">Home</a>
                    <a class="breadcrumb-item nav-link" href="#">Pages</a>
                    <span class="breadcrumb-item active" aria-current="page">Account</span>
                </nav>
            </div>
        </div>
    </section>
    <section id="register">
    <div class="nav-form" style="text-aline: center; margin-left:740px; margin-top: 30px;">
      <a href="login.php"><button class="nav-login color-in" id="btn-login" style= "width:200px; border:none;  background-color: white; font-size: 2rem;">LOG IN</button></a>
      <button class="nav-login" id="btn-register" style= "width:200px; border:none;  background-color: white; color:var(--color); font-size: 2rem;">SIGN IN</button>
      <style>
        a button#btn-login:hover{
    color: var(--color);
}
      </style>
  </div>
      <hr>
        <p>Sign-up With Social</p><hr class="so2">
    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="#">
                    <button id="google">
                        <i class="fa-brands fa-google"></i>
                        google
                    </button>
                </a>
            </div>
            <div class="col-md-6">
                <a href="#">
                    <button id="facebook">
                        <i class="fa-brands fa-facebook"></i>
                        facebook
                    </button>
                </a>
            </div>
            
        </div>
        
    </div>
        <p>Or Sign-Up With Email</p><hr class="container">

    <form action="" id="form" class="container" method="post">
        <input type="text" name="username" id="username" placeholder="Your full name" ><br>
        <?php   
                if(isset($errors['username'])) {
                    echo "<span style ='color :red; margin-left: 210px;'>$errors[username] </span><br>";
                }
                ?>
        <input type="email" name="email" id="email" placeholder="Your email address" ><br>
        <?php   
                if(isset($errors['email'])) {
                    echo "<span style ='color :red; margin-left: 210px;'>$errors[email] </span><br>";
                }
                ?>
        <input type="number" name="phone" id="phone" placeholder="Your phone" ><br>
        <?php   
                if(isset($errors['phone'])) {
                    echo "<span style ='color :red; margin-left: 210px;'>$errors[phone] </span><br>";
                }
                ?>
        <input type="text" name="password" id="password" placeholder="Set your password" ><br>
        <?php   
                if(isset($errors['password'])) {
                    echo "<span style ='color :red; margin-left: 210px;'>$errors[password] </span><br>";
                }
                ?>
     <?php $role = ""; ?>
       <select name="role" id="role" class="form-select" style="text-aline: center; margin: 20px 0px 0px 200px; border: 1px solid #000; width:500px;" <?php echo $role; ?>>
           <option value="">Select role</option>
           <option value="admin">Admin</option>
           <option value="user">User</option>
       </select>
        <?php   
                if(isset($errors['role'])) {
                    echo "<span style ='color :red; margin-left: 210px;'>$errors[role] </span><br>";
                }
                ?>
       
        <input class="box" type="checkbox" name="" id=""><p style="margin: -70px 0px 0px 230px;">Remember Me</p>
        <a href="forgot-password.php" style=" margin-top:-300px; margin-left: 910px; color: var(--color); text-decoration: none;">Forgot Password?</a>
        <input class="btn btn-dark btn-lg rounded-1" onclick="handleSubmit()" id="submit" type="submit" name="submit" value="register"> 
        
    </form>
    </section> 
<script src="register.js"></script>
</body>

</html>