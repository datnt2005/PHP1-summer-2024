<?php
session_start();
include_once('./DBUntil.php');

ini_set('display_errors', '1');
$dbHelper = new DBUntil();

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
  exit();
}
?>


<?php

include_once('./DBUntil.php');
include_once('./products/addproduct.php');
$dbHelper = new DBUntil();
$produsts = $dbHelper->select("select * from tiendat_products");

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/index.css">
  <script src="https://kit.fontawesome.com/1d3d4a43fd.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <link
            href="https://fonts.googleapis.com/css2?family=Chilanka&amp;family=Montserrat:wght@300;400;500&...lay=swap"
            rel="stylesheet">
            <script src="index.js"></script>
  <title>waggy</title>
</head>

<body>
  <header>
    <div class="container py-2">
      <div class="row py-4 pb-0 pb-sm-4 align-items-center ">

        <div class="col-sm-4 col-lg-3 text-center text-sm-start">
          <div class="main-logo">
            <a href="index.html">
              <img src="pic/logo.png" alt="logo" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
          <div class="search-bar border rounded-2 px-3 border-dark-subtle">
            <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
              <input type="text" class="form-control border-0 bg-transparent" placeholder="Search for more than 10,000 products">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z"></path>
              </svg>
            </form>
          </div>
        </div>

        <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 secondary-font text-muted">Phone</span>
            <h5 class="mb-0">+980-34984089</h5>
          </div>
          <div class="support-box text-end d-none d-xl-block">
            <span class="fs-6 secondary-font text-muted">Email</span>
            <h5 class="mb-0">waggy@gmail.com</h5>
          </div>



        </div>
      </div>
    </div>

    <div class="container-fluid">
      <hr class="m-0">
    </div>

    <div class="container">
      <nav class="main-menu d-flex navbar navbar-expand-lg ">

        <div class="d-flex d-lg-none align-items-end mt-3">
          <ul class="d-flex justify-content-end list-unstyled m-0">
            <li>
              <a href="account.html" class="mx-3">
                <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
              </a>
            </li>
            <li>
              <a href="wishlist.html" class="mx-3">
                <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
              </a>
            </li>

            <li>
              <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                  03
                </span>
              </a>
            </li>

            <li>
              <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                
              </a>
            </li>
          </ul>

        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

          <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <div class="offcanvas-body justify-content-between">
            <select class="filter-categories border-0 mb-0 me-5">
              <option>Shop by Category</option>
              <option>Clothes</option>
              <option>Food</option>
              <option>Food</option>
              <option>Toy</option>
            </select>

            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
              <li class="nav-item">
                <a href="index.html" class="nav-link active" style="color: var(--color);">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu" aria-labelledby="pages">
                  <li><a href="about.html" class="dropdown-item">About Us<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="products.html" class="dropdown-item">Shop<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="single-product.html" class="dropdown-item">Single Product<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="cart.html" class="dropdown-item">Cart<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="wishlist.html" class="dropdown-item">Wishlist<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="checkout.html" class="dropdown-item">Checkout<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="blog.html" class="dropdown-item">Blog<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="single-post.html" class="dropdown-item">Single Post<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="contact.html" class="dropdown-item">Contact<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="faqs.html" class="dropdown-item">FAQs<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="account.html" class="dropdown-item">Account<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="thank-you.html" class="dropdown-item">Thankyou<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="error.html" class="dropdown-item">Error 404<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                  <li><a href="styles.html" class="dropdown-item">Styles<span class="badge bg-success text-dark ms-2">PRO</span></a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="shop.php" class="nav-link">Shop</a>
              </li>
              <li class="nav-item">
                <a href="blog.html" class="nav-link">Blog</a>
              </li>
              <li class="nav-item">
                <a href="contact.html" class="nav-link">Contact</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">Others</a>
              </li>
              <li class="nav-item">
                <a href="https://templatesjungle.gumroad.com/l/waggy-pet-shop-ecommerce-html-website-template" class="nav-link fw-bold text-dark" target="_blank">GET PRO</a>
              </li>
            </ul>

            <div class="d-none d-lg-flex align-items-end">
            <div class="item-end nav-flex-center">
                        <ul class="nav">
                            <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                 role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user" style="color: #000;"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" >
                                    <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item" href="products/index.php">Products</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/order/order-admin.php">Order management</a></li>
                                    <li><a class="dropdown-item" href="list_user.php">User</a></li>
                                    <li><a class="dropdown-item" href="http://localhost/FPT%20PHP/PHP_1/TIENDAT/order/general.php">Revenue</a></li>
                                    <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wishlish.html"><i class="fa-solid fa-heart" style="color: #000;"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="carts/cart.php"><i class="fa-solid fa-cart-shopping" style="color: #000;"></i></a>
                            </li>
                        
                
                </li>
              </ul>
              

            </div>

          </div>

        </div>

      </nav>



    </div>
  </header>



  <section id="banner" style="background: #F9F3EC;">
    <div class="container">
      <div class="swiper main-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
        <div class="swiper-wrapper" id="swiper-wrapper-f64851d6788c3ede" aria-live="polite">

          <div class="swiper-slide py-5 swiper-slide-active" role="group" aria-label="1 / 3" style="width: 1296px;">
            <div class="row banner-content align-items-center">
              <div class="img-wrapper col-md-5">
                <img src="pic/banner.png" class="img-fluid">
              </div>
              <div class="content-wrapper col-md-7 p-5 mb-5">
                <div class="secondary-font text-primary text-uppercase mb-4" ><p style="color: var(--color); font-family: 'Times New Roman', Times, serif;">Save 10 - 20 % off</p></div>
                <h2 class="banner-title display-1 fw-normal">Best destination for <span class="text-primary" ><h2 style="color: var(--color); font-size: 5rem;">your pets</h2>
                    </span>
                </h2>
                <a href="shop.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                  shop now
                  <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                    <use xlink:href="#arrow-right"></use>
                  </svg></a>
              </div>

            </div>
          </div>
     

        <div class="swiper-pagination mb-5 swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>

      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
    </div>
  </section>



  <section id="categories">
    <div class="container my-3 py-5">
      <div class="row my-5">
        <div class="col text-center">
          <a href="#" class="categories-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 256 256"><path fill="currentColor" d="M224 104h-8.37a88 88 0 0 0-175.26 0H32a8 8 0 0 0-8 8a104.35 104.35 0 0 0 56 92.28V208a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-3.72A104.35 104.35 0 0 0 232 112a8 8 0 0 0-8-8m-24.46 0h-51.42a71.84 71.84 0 0 1 41.27-29.57A71.45 71.45 0 0 1 199.54 104m-26.06-47.77q2.75 2.25 5.27 4.75a87.92 87.92 0 0 0-49.15 43h-29.5A72.26 72.26 0 0 1 168 56c1.83 0 3.66.09 5.48.23M128 40a72 72 0 0 1 19 2.57A88.36 88.36 0 0 0 83.33 104H56.46A72.08 72.08 0 0 1 128 40m36.66 152a8 8 0 0 0-4.66 7.3v8.7H96v-8.7a8 8 0 0 0-4.66-7.3a88.29 88.29 0 0 1-51-72h175.29a88.29 88.29 0 0 1-50.97 72"></path></svg>
            <iconify-icon class="category-icon" icon="ph:bowl-food"></iconify-icon>
            <h5>Foodies</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 256 256"><path fill="currentColor" d="M176 68a12 12 0 1 1-12-12a12 12 0 0 1 12 12m64 12a8 8 0 0 1-3.56 6.66L216 100.28V120a104.11 104.11 0 0 1-104 104H24a16 16 0 0 1-12.49-26l.1-.12L96 96.63V76.89c0-33.42 26.79-60.73 59.71-60.89h.29a60 60 0 0 1 57.21 41.86l23.23 15.48A8 8 0 0 1 240 80m-22.42 0L201.9 69.54a8 8 0 0 1-3.31-4.64A44 44 0 0 0 156 32h-.22C131.64 32.12 112 52.25 112 76.89v22.63a8 8 0 0 1-1.85 5.13L24 208h26.9l70.94-85.12a8 8 0 1 1 12.29 10.24L71.75 208H112a88.1 88.1 0 0 0 88-88V96a8 8 0 0 1 3.56-6.66Z"></path></svg>
            <iconify-icon class="category-icon" icon="ph:bird"></iconify-icon>
            <h5>Bird Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 256 256"><path fill="currentColor" d="m239.71 125l-16.42-88a16 16 0 0 0-19.61-12.58l-.31.09L150.85 40h-45.7L52.63 24.56l-.31-.09a16 16 0 0 0-19.61 12.58L16.29 125a15.77 15.77 0 0 0 9.12 17.52a16.3 16.3 0 0 0 6.71 1.48a15.5 15.5 0 0 0 7.88-2.16V184a40 40 0 0 0 40 40h96a40 40 0 0 0 40-40v-42.15a15.5 15.5 0 0 0 7.87 2.16a16.3 16.3 0 0 0 6.72-1.47a15.77 15.77 0 0 0 9.12-17.54M32 128l16.43-88L90.5 52.37Zm144 80h-40v-12.69l13.66-13.65a8 8 0 0 0-11.32-11.32L128 180.69l-10.34-10.35a8 8 0 0 0-11.32 11.32L120 195.31V208H80a24 24 0 0 1-24-24v-60.89L107.92 56h40.15L200 123.11V184a24 24 0 0 1-24 24m48-80l-58.5-75.63L207.57 40zm-120 12a12 12 0 1 1-12-12a12 12 0 0 1 12 12m72 0a12 12 0 1 1-12-12a12 12 0 0 1 12 12"></path></svg>
            <iconify-icon class="category-icon" icon="ph:dog"></iconify-icon>
            <h5>Dog Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em" viewBox="0 0 256 256"><path fill="currentColor" d="M168 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12m48.72 67.64c-19.37 34.9-55.44 53.76-107.24 56.1l-22 51.41A8 8 0 0 1 80.1 256h-.51a8 8 0 0 1-7.19-5.78l-14.8-51.83l-51.8-14.83a8 8 0 0 1-1-15.05l51.41-22c2.35-51.78 21.21-87.84 56.09-107.22c24.75-13.74 52.74-15.84 71.88-15.18c18.64.64 36 4.27 38.86 6a8 8 0 0 1 2.83 2.83c1.69 2.85 5.33 20.21 6 38.85c.68 19.1-1.41 47.1-15.15 71.85m-55.18 29a52.11 52.11 0 0 1-33.4-44.78a52.09 52.09 0 0 1-44.77-33.39q-10.45 23.79-11.3 57.59a8 8 0 0 1-4.85 7.17l-35.39 15.14l34.45 9.86a8 8 0 0 1 5.49 5.5l9.84 34.44l15.16-35.4a8 8 0 0 1 7.17-4.84q33.77-.81 57.6-11.29m50.88-129.07c-14.15-3-64.1-11-100.3 14.75a81.2 81.2 0 0 0-16 15.07a36 36 0 0 0 39.35 38.44a8 8 0 0 1 8.73 8.73a36 36 0 0 0 38.47 39.34a80.8 80.8 0 0 0 15-16c25.75-36.17 17.75-86.16 14.75-100.33"></path></svg>
            <iconify-icon class="category-icon" icon="ph:fish"></iconify-icon>
            <h5>Fish Shop</h5>
          </a>
        </div>
        <div class="col text-center">
          <a href="#" class="categories-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="10rem" height="10em" viewBox="0 0 256 256"><path fill="currentColor" d="M96 140a12 12 0 1 1-12-12a12 12 0 0 1 12 12m76-12a12 12 0 1 0 12 12a12 12 0 0 0-12-12m60-80v88c0 52.93-46.65 96-104 96S24 188.93 24 136V48a16 16 0 0 1 27.31-11.31c.14.14.26.27.38.41L69 57a111.22 111.22 0 0 1 118.1 0l17.21-19.9c.12-.14.24-.27.38-.41A16 16 0 0 1 232 48m-16 0l-21.56 24.8a8 8 0 0 1-10.81 1.2A89 89 0 0 0 168 64.75V88a8 8 0 1 1-16 0V59.05a97.4 97.4 0 0 0-16-2.72V88a8 8 0 1 1-16 0V56.33a97.4 97.4 0 0 0-16 2.72V88a8 8 0 1 1-16 0V64.75A89 89 0 0 0 72.37 74a8 8 0 0 1-10.81-1.17L40 48v88c0 41.66 35.21 76 80 79.67v-20.36l-13.66-13.66a8 8 0 0 1 11.32-11.31L128 180.68l10.34-10.34a8 8 0 0 1 11.32 11.31L136 195.31v20.36c44.79-3.69 80-38 80-79.67Z"></path></svg>
            <iconify-icon class="category-icon" icon="ph:cat"></iconify-icon>
            <h5>Cat Shop</h5>
          </a>
        </div>
        
        
      </div>
    </div>
  </section>

 <section id="clothing">
  <div class="container ">
    <div class="row">
    <div class="col-md-6">
      <h2 class="display-3 fw-normal">Pet Clothing</h2>
    </div>
    <div class="col-md-6 button">
      <a href="shop.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 ">
        shop now</a>
        
    </div>
    </div>
  
    <div class="row shoppet">
      <div class="col-sm-3">
        <img src="pic/item1.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item2.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item3.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span> 
      </div>
      <div class="col-sm-3">
        <img src="pic/item4.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
          <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
       </div>
       <?php
      
      //   foreach($products as $products){
      // echo '<div class="col-sm-3">';
      // echo "  <img src='products/uploads/$products[img]' class='img-fluid rounded-4' alt='image'> ";    
      // echo "  <span class='shoppet01'>";
      // echo "<a style='color: #000 ; text-decoration: none;' href='detail.php?id=" . $products['id'] . "'><h3>" . $products['name'] . "</h3></a>";
      // echo "    <i class='fa-solid fa-star'></i>";
      // echo "  <i class='fa-solid fa-star'></i>";
      // echo "  <i class='fa-solid fa-star'></i>";
      // echo "  <i class='fa-solid fa-star'></i>";
      // echo "  <i class='fa-solid fa-star'></i>";
      // echo "  0.5";
      // echo "  <h4>$$products[price]</h4>";
      // echo "  <a href='#'>";
      // // echo "   <a class='btn btn-primary' href='carts/cart-handle.php?id= $product['id]&action=add'>";
      // echo"                     <i class='bi bi-cart'></i> Thêm vào giỏ hàng";
      // echo "                </a>";
      // echo "  </button>";
      // echo "</a>";
      //  echo " <a href='#'>";
      // echo "    <button class='heart'>";
      // echo "      <i class='fa-solid fa-heart'></i>";
      // echo "  </button>";
      // echo "</a>";
      // echo "  </span>";
      // echo " </div>";
      //  }
      ?>
   </div>
   <section id="products">
  



</section>
</div>
 </section>






 <section id="Foodies">
  <div class="container ">
    <div class="row">
    <div class="col-md-6">
      <h2 class="display-3 fw-normal">Pet Foodies</h2>
    </div>
    <div class="col-md-6 button">
      <a href="shop.php" class="btn btn-outline-dark btn-lg text-uppercase fs-6 ">
        shop now</a>
        
    </div>
    </div>
  
    <div class="row shoppet">
      <div class="col-sm-3">
        <img src="pic/item5.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item6.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item7.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span> 
      </div>
      <div class="col-sm-3">
        <img src="pic/item8.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
          <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
       </div>
   </div>



    <div class="row shoppet">
      <div class="col-sm-3">
        <img src="pic/item9.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item10.jpg" class="img-fluid rounded-4" alt="image">
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
      </div>
      <div class="col-sm-3">
        <img src="pic/item11.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span> 
      </div>
      <div class="col-sm-3">
        <img src="pic/item12.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
          <h3>Grey hoodie</h3>
          <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        <i class="fa-solid fa-star"></i>
        0.5
        <h4>$18.00</h4>
        <a href="#">
          <button class="addcart">
            <h5>Add to Cart</h5>
        </button>
      </a>
        <a href="#">
          <button class="heart">
            <i class="fa-solid fa-heart"></i>
        </button>
      </a>
        </span>
       </div>
   </div>
</div>
 </section>




 <section id="banner-2" class="my-3" style="background: #F9F3EC;">
  <div class="container">
    <div class="row flex-row-reverse banner-content align-items-center">
      <div class="img-wrapper col-12 col-md-6">
        <img src="pic/banner2.png" class="img-fluid">
      </div>
      <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
        <div class="secondary-font text-primary text-uppercase mb-3 fs-4"><h3 style="color: var(--color); font-family: 'Times New Roman', Times, serif;">Upto 40% off</h3></div>
        <h2 class="banner-title display-1 fw-normal">Clearance sale !!!
        </h2>
        <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
          shop now
          <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
            <use xlink:href="#arrow-right"></use>
          </svg></a>
      </div>

    </div>
  </div>
</section>

<section id="text">
  <div class="container">
    <div class="row">
      <div class="col-ms-6">
       <svg xmlns="http://www.w3.org/2000/svg" width="10em" height="10em"  viewBox="0 0 24 24"><path fill="currentColor" d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.871 3.871 0 0 1-2.748-1.179m10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621c.537-.278 1.24-.375 1.929-.311c1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5a3.871 3.871 0 0 1-2.748-1.179"></path></svg>
      </div>
      <div class="col-ms-6">
      <p class="price">At the core of our practice is the idea that cities are the
        incubators of our
        greatest achievements, and the best hope for a sustainable future.</p>
        <p style="font-size: 1rem;">- Joshima Lin</p></div>
    </div>
  </div>
</section>









<footer>
  <div id="footer-bottom">
    <div class="container">
      <hr class="m-0">
      <div class="row mt-3">
        <div class="col-md-6 copyright">
          <p class="secondary-font">© 2023 Waggy. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <p class="secondary-font">Free HTML Template by <a href="https://templatesjungle.com/" target="_blank" class="text-decoration-underline fw-bold text-black-50"> TemplatesJungle</a> </p>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>

</html>