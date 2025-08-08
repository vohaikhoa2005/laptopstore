<?php include 'header.php'; ?>
<?php
session_start();
if (isset($_SESSION['login_success'])) {
  echo '<div style="position:relative;z-index:1000;margin-top:80px;" class="container"><div class="alert alert-success text-center" style="margin-bottom:0;">' . $_SESSION['login_success'] . '</div></div>';
  unset($_SESSION['login_success']);
}
?>

<!--page loader-->
<div class="loader-wrapper">
  <div class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
    <div class="spinner-border text-dark" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</div>
<!--end loader-->

<!--end top header-->


<div class="page-content">

  <!--start carousel-->
  <section class="slider-section">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" style="background-color: #1a2238;">
          <div class="row d-flex align-items-center">
            <div class="col d-none d-lg-flex justify-content-center">
              <div>
                <h3 class="h3 fw-light text-white fw-bold">Latest Laptops</h3>
                <h1 class="h1 text-white fw-bold">Super Sale</h1>
                <p class="text-white fw-bold"><i>Discounts up to 20%</i></p>
                <div><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a></div>
              </div>
            </div>
            <div class="col">
              <img src="assets/images/banner/banner1.jpg" class="img-fluid d-block mx-auto" alt="Laptop 1" style="width: 600px; height: 350px; object-fit: cover;">
            </div>
          </div>
        </div>
        <div class="carousel-item" style="background-color: #23272f;">
          <div class="row d-flex align-items-center">
            <div class="col d-none d-lg-flex justify-content-center">
              <div>
                <h3 class="h3 fw-light text-white fw-bold">Gaming Laptops</h3>
                <h1 class="h1 text-white fw-bold">Top Performance</h1>
                <p class="text-white fw-bold"><i>Special offer 15% off</i></p>
                <div><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Discover</a></div>
              </div>
            </div>
            <div class="col">
              <img src="assets/images/banner/banner2.jpg" class="img-fluid d-block mx-auto" alt="Laptop 2" style="width: 600px; height: 350px; object-fit: cover;">
            </div>
          </div>
        </div>
        <div class="carousel-item" style="background-color: #f5f6fa;">
          <div class="row d-flex align-items-center">
            <div class="col d-none d-lg-flex justify-content-center">
              <div>
                <h3 class="h3 fw-light text-dark fw-bold">Office Laptops</h3>
                <h1 class="h1 text-dark fw-bold">Lightweight & Convenient</h1>
                <p class="text-dark fw-bold"><i>Extra 10% off for students</i></p>
                <div><a class="btn btn-dark btn-ecomm" href="shop-grid.html">See Now</a></div>
              </div>
            </div>
            <div class="col">
              <img src="assets/images/banner/banner3.jpg" class="img-fluid d-block mx-auto" alt="Laptop 3" style="width: 600px; height: 350px; object-fit: cover;">
            </div>
          </div>
        </div>
        <div class="carousel-item" style="background-color: #ffe082;">
          <div class="row d-flex align-items-center">
            <div class="col d-none d-lg-flex justify-content-center">
              <div>
                <h3 class="h3 fw-light text-dark fw-bold">Graphic Design Laptops</h3>
                <h1 class="h1 text-dark fw-bold">Unlimited Creativity</h1>
                <p class="text-dark fw-bold"><i>Discounts up to 25%</i></p>
                <div><a class="btn btn-dark btn-ecomm" href="shop-grid.html">Shop Now</a></div>
              </div>
            </div>
            <div class="col">
              <img src="assets/images/banner/banner4.jpg" class="img-fluid d-block mx-auto" alt="Laptop 4" style="width: 600px; height: 350px; object-fit: cover;">
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!--end carousel-->


  <!--start Discounted products slider-->
  <section class="section-padding">
    <div class="container">
      <div class="text-center pb-3">
        <h3 class="mb-0 h3 fw-bold">Discounted Products</h3>
        <p class="mb-0 text-capitalize">Best deals on top laptops, limited time offers!</p>
      </div>
      <?php
      // Lấy 5 sản phẩm mới nhất có giảm giá (giả sử có trường price và old_price)
      require_once 'config/database.php';
      $stmt = $conn->query('SELECT * FROM products ORDER BY id DESC LIMIT 5');
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
      <div class="row g-4 product-thumbs">
        <?php foreach ($products as $product): ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
            <div class="card flex-fill h-100">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="product-details.php?id=<?= $product['id'] ?>"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php?id=<?= $product['id'] ?>">
                  <img src="<?php echo !empty($product['thumbnail']) ? htmlspecialchars($product['thumbnail']) : 'assets/images/no-image.png'; ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>" style="height:180px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name"><?= htmlspecialchars($product['name']) ?></h6>
                  <p class="mb-1 small"><?= htmlspecialchars($product['descriptions']) ?></p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): ?>
                      <span class="text-decoration-line-through text-muted me-2">$<?= htmlspecialchars($product['old_price']) ?></span>
                    <?php endif; ?>
                    $<?= htmlspecialchars($product['price']) ?>
                  </p>
                  
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!--end Discounted products slider-->

  <!--start Suggested products-->
  <section class="section-padding bg-light">
    <div class="container">
      <div class="text-center pb-3">
        <h3 class="mb-0 h3 fw-bold">Suggested Products</h3>
        <p class="mb-0 text-capitalize">Recommended laptops just for you</p>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <!-- Product 1 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale1.jpg" class="card-img-top" alt="Dell Inspiron 15" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Dell Inspiron 15</h6>
                <p class="mb-1 small">15.6" FHD, Intel i5, 8GB RAM, 512GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$699</span>
                  $599
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 2 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale2.jpg" class="card-img-top" alt="HP Pavilion 14" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">HP Pavilion 14</h6>
                <p class="mb-1 small">14" HD, Intel i3, 8GB RAM, 256GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$599</span>
                  $499
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 3 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale3.jpg" class="card-img-top" alt="Acer Aspire 5" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Acer Aspire 5</h6>
                <p class="mb-1 small">15.6" FHD, Ryzen 5, 16GB RAM, 512GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$749</span>
                  $629
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 4 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale4.jpg" class="card-img-top" alt="Lenovo IdeaPad 3" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Lenovo IdeaPad 3</h6>
                <p class="mb-1 small">15.6" FHD, Intel i5, 8GB RAM, 256GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$649</span>
                  $549
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 5 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale5.jpg" class="card-img-top" alt="Asus VivoBook S14" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Asus VivoBook S14</h6>
                <p class="mb-1 small">14" FHD, Intel i7, 16GB RAM, 512GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$899</span>
                  $749
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 6 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale6.jpg" class="card-img-top" alt="MSI GF63 Thin" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">MSI GF63 Thin</h6>
                <p class="mb-1 small">15.6" FHD, i5, GTX 1650, 8GB RAM, 512GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$999</span>
                  $849
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 7 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale7.jpg" class="card-img-top" alt="Apple MacBook Air M1" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Apple MacBook Air M1</h6>
                <p class="mb-1 small">13.3" Retina, 8GB RAM, 256GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$1099</span>
                  $949
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- Product 8 -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
          <div class="card flex-fill h-100" style="min-height: 420px;">
            <div class="position-relative overflow-hidden">
              <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                <a href="javascript:;"><i class="bi bi-heart"></i></a>
                <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
              </div>
              <a href="product-details.php">
                <img src="assets/images/product_sale/sale8.jpg" class="card-img-top" alt="Gigabyte G5 Gaming" style="height:240px;object-fit:contain;background:#fff;">
              </a>
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
              <div class="product-info text-center">
                <h6 class="mb-1 fw-bold product-name">Gigabyte G5 Gaming</h6>
                <p class="mb-1 small">15.6" FHD, i7, RTX 3050, 16GB RAM, 512GB SSD</p>
                <div class="ratings mb-1 h6">
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                  <i class="bi bi-star-fill text-warning"></i>
                </div>
                <p class="mb-0 h6 fw-bold product-price">
                  <span class="text-decoration-line-through text-muted me-2">$1199</span>
                  $999
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="products.php" class="btn btn-dark btn-ecomm px-4 py-2">Show more products</a>
      </div>
    </div>
  </section>
  <!--end Suggested products-->


  <!--start features-->
  <section class="product-thumb-slider section-padding">
    <div class="container">
      <div class="text-center pb-3">
        <h3 class="mb-0 h3 fw-bold">What We Offer!</h3>
        <p class="mb-0 text-capitalize">The purpose of lorem ipsum</p>
      </div>
      <div class="row row-cols-1 row-cols-lg-4 g-4">
        <div class="col d-flex">
          <div class="card depth border-0 rounded-0 border-bottom border-primary border-3 w-100">
            <div class="card-body text-center">
              <div class="h1 fw-bold my-2 text-primary">
                <i class="bi bi-truck"></i>
              </div>
              <h5 class="fw-bold">Free Delivery</h5>
              <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex">
          <div class="card depth border-0 rounded-0 border-bottom border-danger border-3 w-100">
            <div class="card-body text-center">
              <div class="h1 fw-bold my-2 text-danger">
                <i class="bi bi-credit-card"></i>
              </div>
              <h5 class="fw-bold">Secure Payment</h5>
              <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex">
          <div class="card depth border-0 rounded-0 border-bottom border-success border-3 w-100">
            <div class="card-body text-center">
              <div class="h1 fw-bold my-2 text-success">
                <i class="bi bi-minecart-loaded"></i>
              </div>
              <h5 class="fw-bold">Free Returns</h5>
              <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
            </div>
          </div>
        </div>
        <div class="col d-flex">
          <div class="card depth border-0 rounded-0 border-bottom border-warning border-3 w-100">
            <div class="card-body text-center">
              <div class="h1 fw-bold my-2 text-warning">
                <i class="bi bi-headset"></i>
              </div>
              <h5 class="fw-bold">24/7 Support</h5>
              <p class="mb-0">Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </section>
  <!--end features-->


  <!--start Store Introduction-->
  <div id="aboutshop">
    <section class="section-padding">
      <div class="container">
        <div class="text-center pb-3">
          <h3 class="fw-bold mb-3">About Laptop Store</h3>
        </div>
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="assets/images/banner/banner5.png" class="img-fluid rounded shadow" alt="Laptop Store" style="width:100%;max-width:500px;">
          </div>
          <div class="col-lg-6">
            <p class="mb-3">Laptop Store is a trusted address specializing in genuine laptops from famous brands such as Dell, HP, Asus, Lenovo, MSI, Apple... We are committed to providing customers with high-quality products, competitive prices, and professional after-sales service.</p>
            <ul class="list-unstyled mb-3">
              <li><i class="bi bi-check-circle-fill text-success me-2"></i> Diverse products, continuously updated</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i> Official warranty, dedicated technical support</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i> Fast nationwide delivery</li>
              <li><i class="bi bi-check-circle-fill text-success me-2"></i> Professional and enthusiastic consulting team</li>
            </ul>
            <a href="products.php" class="btn btn-dark btn-ecomm px-4 py-2">Explore products</a>
          </div>
        </div>
      </div>
    </section>
  </div>



  <!--end Store Introduction-->

  <!--start Contact Section-->
  <div id="contactshop">
    <section class="section-padding bg-light">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="p-4 bg-white rounded shadow-sm h-100">
              <h3 class="fw-bold mb-3">Contact Information</h3>
              <ul class="list-unstyled mb-3">
                <li class="mb-2"><i class="bi bi-geo-alt-fill text-primary me-2"></i> 123 Nguyen Hue Street, District 1, Ho Chi Minh City</li>
                <li class="mb-2"><i class="bi bi-telephone-fill text-primary me-2"></i> Hotline: <a href="tel:+84912345678">+84 912 345 678</a></li>
                <li class="mb-2"><i class="bi bi-envelope-fill text-primary me-2"></i> Email: <a href="mailto:info@laptopstore.com">info@laptopstore.com</a></li>
              </ul>
              <div><i class="bi bi-clock-fill text-primary me-2"></i> Working hours: 8:00 - 21:00 (Mon - Sun)</div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="p-4 bg-white rounded shadow-sm h-100">
              <h3 class="fw-bold mb-3">Contact Form</h3>
              <form action="#" method="post">
                <div class="mb-3">
                  <label for="contactName" class="form-label">Your Name</label>
                  <input type="text" class="form-control" id="contactName" name="contactName" required>
                </div>
                <div class="mb-3">
                  <label for="contactEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
                </div>
                <div class="mb-3">
                  <label for="contactPhone" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="contactPhone" name="contactPhone">
                </div>
                <div class="mb-3">
                  <label for="contactMessage" class="form-label">Message</label>
                  <textarea class="form-control" id="contactMessage" name="contactMessage" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark btn-ecomm px-4">Send Message</button>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="rounded shadow overflow-hidden">
              <img src="assets/images/map.jpg" class="img-fluid w-100" alt="Store Map" style="max-height:400px;object-fit:cover;">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!--end Contact Section-->











  <?php include 'footer.php'; ?>



  <!--Start Back To Top Button-->
  <a href="javaScript:;" class="back-to-top"><i class="bi bi-arrow-up"></i></a>
  <!--End Back To Top Button-->


  <!-- JavaScript files -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/slick/slick.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/index.js"></script>
  <script src="assets/js/loader.js"></script>

  </body>

  </html>