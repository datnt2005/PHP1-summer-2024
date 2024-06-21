
<?php
include_once('./addproduct.php.');
$category = $dbHelper->select("SELECT * FROM tiendat_categories");
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
    <a href="/FPT%20PHP/PHP_1/TIENDAT/index_admin.php"><button class="btn btn-secondary">back</button></a>
    <a style="margin: 50px 0px 0px 1500px; " href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/coupon/index.php"><button class="btn btn-secondary">Coupon</button></a>
    <div class="container mt-3">
        <h2>Products Table</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- <input type="text" name="search" placeholder="search">
            <input type="submit" value="search"><br> -->

            <!-- <input type="text" id="id" name="id" placeholder="id"><br> -->
            <?php
                // if(isset($errors['id'])) {
                //     echo "<span style ='color :red;'>$errors[id] </span><br>";
                // }
                ?>
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
            <input type="file" id="img" name="img" placeholder="img"><br>
            <?php
                if(isset($errors['img'])) {
                    echo "<span style ='color :red;'>$errors[img] </span><br>";
                }
                ?>
          <div class="mt-3">
                <select name="idCategories" id="idCategories" class="form-select">
                    <option value="">Danh muc</option>
                    <?php
                        foreach ($category as $cat) {
                            echo 
                            '
                                <option value="'.htmlspecialchars($cat['id']).'">'.htmlspecialchars($cat['name']).'</option>
                            ';
                        }
                    ?>
                </select>
                <?php
                    if(isset($errors['idCategories'])) {
                        echo "<span  class='text-danger'>$errors[idCategories] </span>";
                    }
                ?>
            </div>
       
            <input type="submit" value="MORE">

            
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>idProduct</th>
                    <th>name</th>
                    <th>price</th>
                    <th>img</th>
                    <th>categories</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php
            foreach ($products as $products) {
                echo "<tr>";
                echo "<td>$products[idProduct]</td>";
                echo "<td>$products[name]</td>";
                echo "<td>$products[price]</td>";
                echo "<td><img style='width: 200px; height: 100px;' src= 'uploads/$products[img]'></td>";
                echo "<td>$products[idCategories]</td>";
                echo "<td> <a class = 'btn btn-into' style = 'background-color :red;' href='delete.php?id=$products[idProduct]'>delete</a>
                <a class = 'btn btn-into' style = 'background-color :orange;' href='update.php?id=$products[idProduct]'>update</a>
                </td>";
          
                echo "</tr>";
            }
            ?>
          
            </tr>
        </table>
    </div>

</body>

</html>
