<?php

include_once('./DBUntil.php');
include_once('./products/addproduct.php');

$dbHelper = new DBUntil();
$products = $dbHelper->select("SELECT * FROM tiendat_products");
if (isset($_GET['search_products'])) {
    $searchQuery = htmlspecialchars($_GET['search_products']);
    echo "Search Query: " . $searchQuery;
    // You can now handle the search query as needed, e.g., querying a database
    $products = $dbHelper->select("SELECT * FROM tiendat_products WHERE name LIKE '%$searchQuery%' ");
}

$dbHelper = new DBUntil();
$produsts = $dbHelper->select("select * from tiendat_products");
ini_set('display_errors', '1');
$dbHelper = new DBUntil();

?>

<?php
            include ('./haf/header.php');
        ?>
    <section class="banner-contact">
        <div class="container banner-items">
            <h2>Shop</h2>
            <nav class="breadcrumb">
                <a href="index.html" class="breadcrumb-item nav-link">Home</a>
                <a href="#" class="breadcrumb-item nav-link">Pages</a>
                <span class="breadcrumb-item active">Shop</span>
            </nav>
        </div>
    </section>
    <!-- main -->
    <div class="container mt-5">
        <div class="row">
            <aside class="col-lg-3">
                <form action="" method="get">
                <div class="sidebar">
                    <div class="search d-md-flex justify-content-evenly align-items-center mt-3">
                        <input type="text" name="search_products" class="inp-search" placeholder="Search For Products">
                        <button class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 
                                    1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
                        </svg>
                    </button>
                </form>
                    </div>
                    <div class="sidebar-product-categories pt-5">
                        <h4>Categories</h4>
                        <ul>
                            <li class="category-item"><a href="shop.php?view=all" class="">All</a></li>
                            <li class="category-item"><a href="shop.php?view=Dogs" class="">Dogs</a></li>
                            <li class="category-item"><a href="shop.php?view=Foods" class="">Food</a></li>
                            <li class="category-item"><a href="shop.php?view=Cats" class="">Cats</a></li>
                            <li class="category-item"><a href="shop.php?view=Birds" class="">Birds</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-product-tags pt-3">
                        <h4>Tags</h4>
                        <ul>
                            <li class="category-item"><a href="#" class="">Pets</a></li>
                            <li class="category-item"><a href="#" class="">Clothes</a></li>
                            <li class="category-item"><a href="#" class="">Foods</a></li>
                            <li class="category-item"><a href="#" class="">Toys</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-product-brands pt-3">
                        <h4>Brands</h4>
                        <ul>
                            <li class="category-item"><a href="#" class="">Denim</a></li>
                            <li class="category-item"><a href="#" class="">Puma</a></li>
                            <li class="category-item"><a href="#" class="">Klaws</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-product-filters pt-3">
                        <h4>Filter By Price</h4>
                        <ul>
                            <li class="category-item"><a href="shop.php?view=less-than10" class="">Less than $10</a></li>
                            <li class="category-item"><a href="shop.php?view=10-20" class="">$10- $20</a></li>
                            <li class="category-item"><a href="shop.php?view=20-30" class="">$20- $30</a></li>
                            <li class="category-item"><a href="shop.php?view=30-40" class="">$30- $40</a></li>
                            <li class="category-item"><a href="shop.php?view=40-50" class="">$40- $50</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <main class="col-md-9">
                <div class="filter-shop d-md-flex justify-content-between align-items-center">
                    <div class="showing-product mt-3">
                        <p>Showing 1–9 of 55 results</p>
                    </div>
                    <div class="sort-by">
                        <select name="" id="">
                            <option value="">Default sorting</option>
                            <option value="">Name (A - Z)</option>
                            <option value="">Name (Z - A)</option>
                            <option value="">Price (Low-High)</option>
                            <option value="">Price (High-Low)</option>
                            <option value="">Rating (Highest)</option>
                            <option value="">Rating (Lowest)</option>
                            <option value="">Model (A - Z)</option>
                            <option value="">Model (Z - A)</option>
                        </select>
                    </div>
                </div>
                <div class="product-items row">
                <?php
                        include_once('./Message.php');
                        $view = isset($_GET['view']) ? $_GET['view'] : 'index'; 
                        switch ($view) {
                            case 'all':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products');
                                break;
                            case 'Dogs':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE idCategories = 3');
                                break;
                            case 'Foods':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE idCategories = 2');
                                break;
                            case 'Cats':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE idCategories = 5');
                                break;
                            case 'Birds':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE idCategories = 4');
                                break;
                            case 'less-than10':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE price < 10');
                                break;
                            case '10-20':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE price >= 10 and price < 20' );
                                break;
                            case '20-30':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE price >= 20 and price < 30');
                                break;
                            case '30-40':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE price >= 30 and price < 40');
                                break;
                            case '40-50':
                                $products = $dbHelper->select('SELECT * FROM tiendat_products WHERE price >= 40 and price < 50');
                                break;
                        }
                    
                    
      
                        foreach ($products as $product) {
                            echo 
                            '
                            <div class="col-md-4">
                                <div class="card_image">
                                    <a href="detail.php?id='. htmlspecialchars($product['idProduct']) .'">
                                        <img style="width: 300px; height: 250px;"
                                            src="http://localhost/FPT%20PHP/PHP_1/TIENDAT/products/uploads/'. htmlspecialchars($product['img']) . '"
                                            alt>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <a class="text-decoration-none" href="detail.php?id='. htmlspecialchars($product['idProduct']) .'">
                                        <h3 class="text-dark fw-bold ">' . htmlspecialchars($product['name']) . '</h3>
                                    </a>
                                    <div class="card_content--text">
                                        <span>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            5.0
                                        </span>
                                        <h3>$' . htmlspecialchars($product['price']) . '</h3>
                                        <div class="d-flex">
                                            <form method="POST" action="http://localhost/FPT%20PHP/PHP_1/TIENDAT/carts/add-to-cart.php">
                                                <input type="hidden" name="idProduct" value="'.htmlspecialchars($product["idProduct"]).'" >
                                                <button type="submit" name="add-to-cart" class="add-tocart">ADD TO CART</button>
                                            </form>
                                            <button class="add-favourites">
                                                <i class="fa-solid fa-heart "></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    ?>
 </div>
 <section id="products">




</section>
                </div>
            </main>
        </div>
    </div>


    <section class="service">
        <div class="container">
            <div class="row">
                <div class="col-md-3 cards-dad">
                    <div class="cards">
                        <div class="card-border-icon">
                            <i data-lucide="shopping-cart"></i>
                        </div>
                        <h3>Free Delivery</h3>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 cards-dad">
                    <div class="cards">
                        <div class="card-border-icon">
                            <i data-lucide="user-round-check"></i>
                        </div>
                        <h3>100% Secure Payment</h3>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipi elit.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 cards-dad">
                    <div class="cards">
                        <div class="card-border-icon">
                            <i data-lucide="tag"></i>
                        </div>
                        <h3>Daily Offer</h3>
                        <div class="card-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi
                                elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 cards-dad">
                    <div class="cards">
                        <div class="card-border-icon">
                            <i data-lucide="award"></i>
                        </div>
                        <h3>Quality Guarantee</h3>
                        <div class="card-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi
                                elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer  -->

    <section class="insta">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta1.jpg" alt>
                    </a>
                </div>
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta2.jpg" alt>
                    </a>
                </div>
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta3.jpg" alt>
                    </a>
                </div>
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta4.jpg" alt>
                    </a>
                </div>
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta5.jpg" alt>
                    </a>
                </div>
                <div class="col-md-2 instagram-item">
                    <div class="icon-hover">
                        <i data-lucide="instagram"></i>
                    </div>
                    <a href="#">
                        <img src="https://demo.templatesjungle.com/waggy/images/insta6.jpg" alt>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php
            include ('./haf/footer.php');
        ?>
    <script src="https://kit.fontawesome.com/121f50087c.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validateForm.js"></script>
