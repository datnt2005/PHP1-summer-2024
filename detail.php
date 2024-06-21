<?php
    include_once('./DBUntil.php');
    // include_once('./index_admin.php');
        include_once('./products/addproduct.php');

    $dbHelper = new DBUntil();
    $idProduct = $_GET['id'];
    $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE idProduct= ?', [$idProduct])[0];
    // var_dump($products);
    // echo $id;

?>

<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.product-page {
    display: flex;
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    overflow: hidden;
}

.product-image {
    padding: 20px;
    border-right: 1px solid #ddd;
}

.product-image img {
    width: 300px;
    border-radius: 10px;
}

.thumbnail-images {
    display: flex;
    margin-top: 10px;
}

.thumbnail-images img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.product-details {
    padding: 20px;
    max-width: 300px;
}

.product-details h1 {
    margin: 0;
    font-size: 24px;
}

.rating {
    margin: 10px 0;
    color: #f5a623;
}

.rating span {
    color: #333;
    margin-left: 5px;
}

.price {
    margin: 10px 0;
}

.current-price {
    font-size: 24px;
    color: #e74c3c;
}

.original-price {
    text-decoration: line-through;
    color: #999;
    margin-left: 10px;
}

.description {
    color: #555;
    margin: 20px 0;
}

.options {
    margin: 20px 0;
}

.colors, .sizes {
    margin-bottom: 10px;
}

.colors label, .sizes label {
    margin-right: 10px;
}

.color, .size {
    border: 1px solid #ddd;
    padding: 5px 10px;
    margin-right: 5px;
    cursor: pointer;
}

.color.gray { background: gray; }
.color.black { background: black; }
.color.blue { background: blue; }
.color.red { background: red; }

.stock {
    color: #e74c3c;
    margin: 10px 0;
}

.quantity {
    display: flex;
    align-items: center;
}

.quantity button {
    border: 1px solid #ddd;
    background: white;
    padding: 5px 10px;
    cursor: pointer;
}

.quantity input {
    width: 40px;
    text-align: center;
    border: 1px solid #ddd;
    margin: 0 5px;
}
</style>
<body>
<?php
  
        ?>
    <div class="product-page">
        <div class="product-image">
        <img src="<?php echo 'http://localhost/FPT%20PHP/PHP_1/TIENDAT/products/uploads/' . htmlspecialchars($products['img']); ?>" 
        alt="Dog in Jumpsuit">
            
        </div>
        <div class="product-details">
            <h1><?php echo htmlspecialchars($products['name']) ?></h1>
            <div class="rating">★★★★★ <span>5.0</span></div>
            <div class="price">
                <span class="current-price text-warning-emphasis">$<?php echo htmlspecialchars($products['price']) ?></span>
            </div>
            <div class="options">
                <div class="colors">
                    <label>Color:</label>
                    <button class="color gray"></button>
                    <button class="color black"></button>
                    <button class="color blue"></button>
                    <button class="color red"></button>
                </div>
                <div class="sizes">
                    <label>Size:</label>
                    <button class="size">XL</button>
                    <button class="size">L</button>
                    <button class="size">M</button>
                    <button class="size">S</button>
                </div>
            </div>
            <div class="stock">
             in stock
            </div>
            <div class="quantity">
                <button class="minus">-</button>
                <input type="text" value="1">
                <button class="plus">+</button>
            </div>
        </div>
    </div>
</body>
</html>