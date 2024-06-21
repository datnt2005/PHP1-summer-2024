<?php
include_once('./DBUntil.php');
include_once('./add-to-cart.php');
$dbHelper = new DBUntil();

$categories = $dbHelper->select("SELECT * FROM tiendat_products");



$carts = new Cart();


$errors = [];
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
    if(!isset($_POST['name']) || empty($_POST['name'])){
        
            $errors['name'] = " nhap name";
       

    }
    if(!isset($_POST['price']) || empty($_POST['price'])){
        
            $errors['price'] = " nhap price";
       

    }
    if(!isset($_POST['description']) || empty($_POST['description'])){
        
            $errors['description'] = " nhap description";
       

    }
    if(!isset($_POST['img']) || empty($_POST['img'])){
        
            $errors['img'] = " nhap img";
       

    }
    if(!isset($_POST['stock']) || empty($_POST['stock'])){
        
            $errors['stock'] = " nhap stock";
       

    }
    

    if (empty($errors)) { // If no errors
        $data = [
         
          'name' => $_POST['name'],
          'price' => $_POST['price'],
          'description' => $_POST['description'],
          'img' => $_POST['img'],
          'stock' => $_POST['stock'],
        ];
        
        $isCreate = $dbHelper->insert('tiendat_products', $data);
        var_dump($isCreate);
        
        if ($isCreate) {
          // Redirect to the same page to see the new record in the table
          header("Location: " . $_SERVER['PHP_SELF']);
          exit();
        } else {
          $errors['database'] = "Failed to create new products";
        }
      }
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    form input{
        margin-top : 30px;
        width: 500px;
        height: 40px;
    }
</style>
<body>

    <div class="container mt-3">
        <h2>Products Table</h2>
        <form action="" method="post" >
            <!-- <input type="text" name="search" placeholder="search">
            <input type="submit" value="search"><br> -->

            <input type="text" id="name" name="name" placeholder="name"><br>
            <?php
                if(isset($errors['name'])) {
                    echo "<span style ='color :red;'>$errors[name] </span><br>";
                }
                ?>
            <input type="text" id="price" name="price" placeholder="price"><br>
            <?php
                if(isset($errors['price'])) {
                    echo "<span style ='color :red;'>$errors[price] </span><br>";
                }
                ?>
            <input type="text" id="description" name="description" placeholder="description"><br>
            <?php
                if(isset($errors['description'])) {
                    echo "<span style ='color :red;'>$errors[description] </span><br>";
                }
                ?>
                <input type="text" id="stock" name="stock" placeholder="stock"><br>
            <?php
                if(isset($errors['stock'])) {
                    echo "<span style ='color :red;'>$errors[stock] </span><br>";
                }
                ?>
            <input type="text" id="img" name="img" placeholder="img"><br>
            <?php
                if(isset($errors['img'])) {
                    echo "<span style ='color :red;'>$errors[img] </span><br>";
                }
                ?>
            
            <input type="submit" value="MORE">

            
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>idProducts</th>
                    <th>name</th>
                    <th>price</th>
                    <th>description</th>
                    <th>stock</th>
                     <th>img</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($categories as $item) {
                echo "<tr>";
                echo "<td>$item[idProducts]</td>";
                echo "<td>$item[name]</td>";
                echo "<td>$$item[price]</td>";
                echo "<td>$item[description]</td>";
                echo "<td>$item[stock]</td>";
                echo "<td><img src= '$item[img]' width='100px'></td>";
                
                echo "<td> <a class = 'btn btn-into' style = 'background-color :red;' href='delete.php?id=$item[idProducts]'>delete</a>
                <a class = 'btn btn-into' style = 'background-color :orange;' href='update.php?id=$item[idProducts]'>update</a>
                <a class='btn btn-primary' href='cart-handle.php?id=$item[idProducts]&action=add'><i class='bi bi-cart'></i>  Thêm vào giỏ hàng</a>
                </td>";
          
                echo "</tr>";
            }
            ?>
          
            </tr>
        </table>
        <hr>
        <!-- <h2>List Cart</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>tên sản phẩm</th>
                    <th>giá bán </th>
                    <th>số lượng</th>
                    <th>Tổng tièn</th>
                    <th>action</th>
                </tr>
            </thead> -->

            <?php
            // foreach ($carts->getCart() as $item) {
            //     $subTotal = $item['quantity'] * $item['price'];
            //     echo "<tr>";
            //     echo "<td>$item[id]</td>";
            //     echo "<td>$item[name]</td>";
            //     echo "<td>$item[price]</td>";
            //     echo "<td>$item[quantity]</td>";
            //     echo "<td>  $subTotal</td>";
            //     echo "<td> <a class='btn btn-danger' href='cart-handle.php?id=$item[id]&action=remove'><i class='bi bi-x'> X</i></a>
            //     </td>";
            //     echo "</tr>";
            // }

            ?>

            </tr>
        <!-- </table>
        <h2>Tổng đơn hàng: <?= $carts->getTotal() ?></h2> -->
    </div>

    

</body>

</html>
