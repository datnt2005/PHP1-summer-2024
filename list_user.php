<?php
require_once('./add_user.php');
ini_set('display_errors', '1');
?>

<style>
    form input{
        margin-top : 30px;
        width: 500px;
        height: 40px;
    }
</style>
<body>
<?php
            include ('./haf/header.php');
        ?>
<a href="/FPT%20PHP/PHP_1/TIENDAT/index_admin.php"><button class="btn btn-secondary">back</button></a>
    <div class="container mt-3">
        <h2>Users Table</h2>
        <form action="" id="form" class="container" method="post">
        <input type="text" name="username" id="username" placeholder="Your full name" ><br>
        <?php   
                if(isset($errors['username'])) {
                    echo "<span style ='color :red;'>$errors[username] </span><br>";
                }
                ?>
        <input type="email" name="email" id="email" placeholder="Your email address" ><br>
        <?php   
                if(isset($errors['email'])) {
                    echo "<span style ='color :red;'>$errors[email] </span><br>";
                }
                ?>
        <input type="number" name="phone" id="phone" placeholder="Your phone" ><br>
        <?php   
                if(isset($errors['phone'])) {
                    echo "<span style ='color :red;'>$errors[phone] </span><br>";
                }
                ?>
        <input type="text" name="password" id="password" placeholder="Set your password" ><br>
        <?php   
                if(isset($errors['password'])) {
                    echo "<span style ='color :red;'>$errors[password] </span><br>";
                }
                ?>
        <?php $role = ""; ?>
              <select class=" inp-value" name="role" id="role" style="margin-top: 20px; width: 500px; height: 40px;" <?php echo $role; ?>>
                    <option value="">Select role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select><br>
        <?php   
                if(isset($errors['role'])) {
                    echo "<span style ='color :red;'>$errors[role] </span><br>";
                }
                ?>
        <input class="btn btn-dark btn-lg rounded-1" onclick="handleSubmit()" id="submit" type="submit" name="submit" value="register"> 
    </form>
        <table class="table">
            <thead>
                <tr>
                    <th>iduser</th>
                    <th>username</th>
                    <th>password</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>role</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
             foreach ($users as $user) {
              
                echo "<tr>";
                echo "<td>$user[iduser]</td>";
                echo "<td>$user[username]</td>";
                echo "<td>$user[password]</td>";
                echo "<td>$user[email]</td>";
                echo "<td>$user[phone]</td>";
                echo "<td>$user[role]</td>";
                echo "<td> <a class = 'btn btn-into' style = 'background-color :red;' href='delete.php?id=$user[iduser]'>delete</a>
                <a class = 'btn btn-into' style = 'background-color :orange;' href='update.php?id=$user[iduser]'>update</a>
                </td>";
          
                echo "</tr>";
            }
            ?>
          
            </tr>
        </table>
    </div>
    <?php
            include ('./haf/footer.php');
        ?>
</body>

</html>
