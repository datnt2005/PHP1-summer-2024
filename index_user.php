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
        <?php
            include ('./haf/header.php');
        ?>



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
          <a style='color: #000 ; text-decoration: none;' href="detail.php"><h3 class="text-decoration-underline">Grey hoodie</h3></a>
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
        <a style='color: #000 ; text-decoration: none;' href="detail.php"><h3>Grey hoodie</h3></a>
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
        <a style='color: #000 ; text-decoration: none;' href="detail.php"><h3>Grey hoodie</h3></a>
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
        <img style='color: #000 ; text-decoration: none;' src="pic/item4.jpg" class="img-fluid rounded-4" alt="image">     
        <span class="shoppet01">
        <a style='color: #000 ; text-decoration: none;' href="detail.php"><h3>Grey hoodie</h3></a>
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
      // echo "    <button class='addcart'>";
      // echo "      <h5>Add to Cart</h5>";
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
      <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 ">
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









<?php
            include ('./haf/footer.php');
        ?>
</body>

</html>