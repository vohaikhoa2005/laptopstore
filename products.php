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

<!-- Start Choose your perfect laptop -->
<section class="section-padding">
  <div class="container">

    <div class="text-center pb-3">
      <h3 class="mb-0 h3 fw-bold">Laptop Products</h3>
      <p class="mb-0 text-capitalize">Choose your perfect laptop: Gaming, Graphic, Office</p>
    </div>
    <div class="row">
      <div class="col-auto mx-auto">
        <div class="product-tab-menu table-responsive">
          <ul class="nav nav-pills flex-nowrap" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="gaming-tab" data-bs-toggle="pill" data-bs-target="#gaming-laptop" type="button" role="tab" aria-controls="gaming-laptop" aria-selected="true">Gaming Laptop</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="graphic-tab" data-bs-toggle="pill" data-bs-target="#graphic-laptop" type="button" role="tab" aria-controls="graphic-laptop" aria-selected="false">Graphic Laptop</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="office-tab" data-bs-toggle="pill" data-bs-target="#office-laptop" type="button" role="tab" aria-controls="office-laptop" aria-selected="false">Office Laptop</button>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <hr>
    <div class="tab-content tabular-product" id="pills-tabContent">
      <!-- Gaming Laptop Tab -->
      <div class="tab-pane fade show active" id="gaming-laptop" role="tabpanel" aria-labelledby="gaming-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <!-- Gaming Laptop Products -->
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming1.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Predator Helios 300</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1299</span>
                    $999
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming2.jpg" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">ASUS ROG Strix G15</h6>
                  <p class="mb-1 small">15.6" FHD, AMD Ryzen 7, RTX 3050, 16GB RAM, 512GB SSD. Gaming design, excellent cooling.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1199</span>
                    $950
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming3.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MSI Katana GF66</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-11400H, RTX 3050, 8GB RAM, 512GB SSD. Great price for casual gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1099</span>
                    $899
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming4.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Lenovo Legion 5</h6>
                  <p class="mb-1 small">15.6" FHD, AMD Ryzen 5, RTX 3050 Ti, 16GB RAM, 512GB SSD. Stable performance, RGB keyboard.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1150</span>
                    $920
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming1.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Predator Helios 300</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1299</span>
                    $999
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming1.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Predator Helios 300</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1299</span>
                    $999
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming1.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Predator Helios 300</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1299</span>
                    $999
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Gaming_Laptops/gaming1.avif" class="card-img-top" alt="Gaming Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Predator Helios 300</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i7-12700H, RTX 3060, 16GB RAM, 512GB SSD. Powerful performance for gamers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$1299</span>
                    $999
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Graphic Laptop Tab -->
      <div class="tab-pane fade" id="graphic-laptop" role="tabpanel" aria-labelledby="graphic-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <!-- Graphic Laptop Products -->
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic1.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MacBook Pro 16 M2</h6>
                  <p class="mb-1 small">16" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2499</span>
                    $2199
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic2.avif" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Dell XPS 15 OLED</h6>
                  <p class="mb-1 small">15.6" OLED, Intel i7-12700H, RTX 3050 Ti, 32GB RAM, 1TB SSD. Sharp display, ideal for designers.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2299</span>
                    $1999
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic3.jpg" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">HP ZBook Studio G8</h6>
                  <p class="mb-1 small">15.6" 4K, Intel i9, RTX A2000, 32GB RAM, 1TB SSD. Mobile workstation for engineers and architects.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2599</span>
                    $2299
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic4.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">ASUS ProArt StudioBook</h6>
                  <p class="mb-1 small">15.6" FHD, Intel Xeon, Quadro RTX 3000, 32GB RAM, 1TB SSD. Professional for 3D graphics.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2399</span>
                    $2099
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic1.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MacBook Pro 16 M2</h6>
                  <p class="mb-1 small">16" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2499</span>
                    $2199
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic1.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MacBook Pro 16 M2</h6>
                  <p class="mb-1 small">16" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2499</span>
                    $2199
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic1.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MacBook Pro 16 M2</h6>
                  <p class="mb-1 small">16" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2499</span>
                    $2199
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Graphic_Laptops/graphic1.webp" class="card-img-top" alt="Graphic Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">MacBook Pro 16 M2</h6>
                  <p class="mb-1 small">16" Liquid Retina, Apple M2 Pro, 16GB RAM, 1TB SSD. Top choice for graphic design and video editing.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$2499</span>
                    $2199
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Office Laptop Tab -->
      <div class="tab-pane fade" id="office-laptop" role="tabpanel" aria-labelledby="office-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <!-- Office Laptop Products -->
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office1.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Dell Inspiron 15</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-1235U, 8GB RAM, 512GB SSD. Slim, long battery life, suitable for office work.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$799</span>
                    $699
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office2.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">HP Pavilion 14</h6>
                  <p class="mb-1 small">14" FHD, Intel i3-1115G4, 8GB RAM, 256GB SSD. Affordable, suitable for students.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$599</span>
                    $520
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office3.png" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Lenovo ThinkPad E14</h6>
                  <p class="mb-1 small">14" FHD, Intel i5-1135G7, 8GB RAM, 512GB SSD. Durable, good security, suitable for business.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$899</span>
                    $799
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office4.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Acer Aspire 5</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-1235U, 8GB RAM, 512GB SSD. Slim design, stable performance.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$750</span>
                    $670
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office1.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Dell Inspiron 15</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-1235U, 8GB RAM, 512GB SSD. Slim, long battery life, suitable for office work.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$799</span>
                    $699
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office1.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Dell Inspiron 15</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-1235U, 8GB RAM, 512GB SSD. Slim, long battery life, suitable for office work.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$799</span>
                    $699
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card flex-fill h-100" style="min-height: 420px;">
              <div class="position-relative overflow-hidden">
                <div class="product-options d-flex align-items-center justify-content-center gap-2 mx-auto position-absolute bottom-0 start-0 end-0">
                  <a href="javascript:;"><i class="bi bi-heart"></i></a>
                  <a href="javascript:;"><i class="bi bi-basket3"></i></a>
                  <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#QuickViewModal"><i class="bi bi-zoom-in"></i></a>
                </div>
                <a href="product-details.php">
                  <img src="assets/images/Office_Laptops/office1.jpg" class="card-img-top" alt="Office Laptop" style="height:240px;object-fit:contain;background:#fff;">
                </a>
              </div>
              <div class="card-body d-flex flex-column justify-content-between">
                <div class="product-info text-center">
                  <h6 class="mb-1 fw-bold product-name">Dell Inspiron 15</h6>
                  <p class="mb-1 small">15.6" FHD, Intel i5-1235U, 8GB RAM, 512GB SSD. Slim, long battery life, suitable for office work.</p>
                  <div class="ratings mb-1 h6">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </div>
                  <p class="mb-0 h6 fw-bold product-price">
                    <span class="text-decoration-line-through text-muted me-2">$799</span>
                    $699
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Choose your perfect laptop -->



<!--start Brands-->
<section class="section-padding">
  <div class="container">
    <div class="text-center pb-3">
      <h3 class="mb-0 h3 fw-bold">Laptop Brands</h3>
      <p class="mb-0 text-capitalize">Explore top laptop brands and find your ideal device</p>
    </div>
    <div class="brands">
      <div class="row row-cols-4 row-cols-lg-4 g-4" id="brand-tab" role="tablist">

        <!-- Acer -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link active" id="acer-tab" data-bs-toggle="pill" data-bs-target="#acer" type="button" role="tab" aria-controls="acer" aria-selected="true" style="height: 120px;">
            <img src="assets/images/logolaptop/Acer.png" class="img-fluid" alt="Acer" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- ASUS -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="asus-tab" data-bs-toggle="pill" data-bs-target="#asus" type="button" role="tab" aria-controls="asus" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/ASUS.webp" class="img-fluid" alt="ASUS" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- Dell -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="dell-tab" data-bs-toggle="pill" data-bs-target="#dell" type="button" role="tab" aria-controls="dell" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/Dell.webp" class="img-fluid" alt="Dell" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- HP -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="hp-tab" data-bs-toggle="pill" data-bs-target="#hp" type="button" role="tab" aria-controls="hp" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/HP.webp" class="img-fluid" alt="HP" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- Lenovo -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="lenovo-tab" data-bs-toggle="pill" data-bs-target="#lenovo" type="button" role="tab" aria-controls="lenovo" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/Lenovo.webp" class="img-fluid" alt="Lenovo" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- MSI -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="msi-tab" data-bs-toggle="pill" data-bs-target="#msi" type="button" role="tab" aria-controls="msi" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/MSI.webp" class="img-fluid" alt="MSI" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- Apple -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="apple-tab" data-bs-toggle="pill" data-bs-target="#apple" type="button" role="tab" aria-controls="apple" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/Apple.webp" class="img-fluid" alt="Apple" style="max-height:60px; max-width:100%;">
          </button>
        </div>

        <!-- Microsoft -->
        <div class="col" role="presentation">
          <button class="p-3 border rounded brand-box d-flex align-items-center justify-content-center w-100 h-100 nav-link" id="microsoft-tab" data-bs-toggle="pill" data-bs-target="#microsoft" type="button" role="tab" aria-controls="microsoft" aria-selected="false" style="height: 120px;">
            <img src="assets/images/logolaptop/Microsoft.webp" class="img-fluid" alt="Microsoft" style="max-height:60px; max-width:100%;">
          </button>
        </div>

      </div>
    </div>
    <!--end row-->

    <div class="tab-content tabular-product mt-4" id="brand-tabContent">

      <!-- Acer products -->
      <div class="tab-pane fade show active" id="acer" role="tabpanel" aria-labelledby="acer-tab">

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/acer/acer1.webp" class="card-img-top border-bottom bg-light" alt="Acer Aspire 5" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Acer Aspire 5</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/acer/acer2.webp" class="card-img-top border-bottom bg-light" alt="Acer Swift 3" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Acer Swift 3</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/acer/acer3.jpg" class="card-img-top border-bottom bg-light" alt="Acer Nitro 5" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Acer Nitro 5</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/acer/acer4.jpg" class="card-img-top border-bottom bg-light" alt="Acer Predator Helios" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Acer Predator Helios</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Asus Products -->
      <div class="tab-pane fade " id="asus" role="tabpanel" aria-labelledby="asus-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/asus/asus1.jpg" class="card-img-top border-bottom bg-light" alt="ASUS VivoBook 15" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">ASUS VivoBook 15</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/asus/asus2.jpg" class="card-img-top border-bottom bg-light" alt="ASUS TUF Gaming" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">ASUS TUF Gaming</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/asus/asus3.jpg" class="card-img-top border-bottom bg-light" alt="ASUS ROG Zephyrus" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">ASUS ROG Zephyrus</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/asus/asus4.jpg" class="card-img-top border-bottom bg-light" alt="ASUS ExpertBook" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">ASUS ExpertBook</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- dell Products -->
      <div class="tab-pane fade " id="dell" role="tabpanel" aria-labelledby="dell-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/dell/dell1.webp" class="card-img-top border-bottom bg-light" alt="Dell Inspiron 15" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Dell Inspiron 15</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/dell/dell2.webp" class="card-img-top border-bottom bg-light" alt="Dell XPS 13" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Dell XPS 13</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/dell/dell3.webp" class="card-img-top border-bottom bg-light" alt="Dell Vostro" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Dell Vostro</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/dell/dell4.jpg" class="card-img-top border-bottom bg-light" alt="Dell G15" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Dell G15</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- hp Products -->
      <div class="tab-pane fade " id="hp" role="tabpanel" aria-labelledby="hp-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/hp/hp1.jpg" class="card-img-top border-bottom bg-light" alt="HP Pavilion 15" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">HP Pavilion 15</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/hp/hp2.avif" class="card-img-top border-bottom bg-light" alt="HP Envy x360" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">HP Envy x360</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/hp/hp3.jpg" class="card-img-top border-bottom bg-light" alt="HP Victus" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">HP Victus</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/hp/hp4.webp" class="card-img-top border-bottom bg-light" alt="HP ProBook" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">HP ProBook</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Lenovo Products -->
      <div class="tab-pane fade " id="lenovo" role="tabpanel" aria-labelledby="lenovo-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/lenovo/lenovo1.webp" class="card-img-top border-bottom bg-light" alt="Lenovo IdeaPad 3" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Lenovo IdeaPad 3</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/lenovo/lenovo2.webp" class="card-img-top border-bottom bg-light" alt="Lenovo Legion 5" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Lenovo Legion 5</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/lenovo/lenovo3.avif" class="card-img-top border-bottom bg-light" alt="Lenovo ThinkPad X1" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Lenovo ThinkPad X1</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/lenovo/lenovo4.jpg" class="card-img-top border-bottom bg-light" alt="Lenovo Yoga Slim 7" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Lenovo Yoga Slim 7</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- MSI Products -->
      <div class="tab-pane fade " id="msi" role="tabpanel" aria-labelledby="msi-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/msi/msi1.jpg" class="card-img-top border-bottom bg-light" alt="MSI Modern 14" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MSI Modern 14</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/msi/msi2.jpg" class="card-img-top border-bottom bg-light" alt="MSI GF63" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MSI GF63</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/msi/msi3.jpg" class="card-img-top border-bottom bg-light" alt="MSI Katana GF66" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MSI Katana GF66</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/msi/msi4.jpg" class="card-img-top border-bottom bg-light" alt="MSI Prestige 14" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MSI Prestige 14</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Apple Products -->
      <div class="tab-pane fade " id="apple" role="tabpanel" aria-labelledby="apple-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/apple/apple1.jpg" class="card-img-top border-bottom bg-light" alt="MacBook Air M1" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MacBook Air M1</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/apple/apple2.jpg" class="card-img-top border-bottom bg-light" alt="MacBook Pro 14" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MacBook Pro 14</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/apple/apple3.jpg" class="card-img-top border-bottom bg-light" alt="MacBook Pro 13" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MacBook Pro 13</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/apple/apple4.jpg" class="card-img-top border-bottom bg-light" alt="MacBook Air M2" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">MacBook Air M2</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Microsoft Products -->
      <div class="tab-pane fade " id="microsoft" role="tabpanel" aria-labelledby="microsoft-tab">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/window/window1.jpg" class="card-img-top border-bottom bg-light" alt="Surface Laptop Go" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Surface Laptop Go</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/window/window2.webp" class="card-img-top border-bottom bg-light" alt="Surface Pro 7" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Surface Pro 7</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/window/window3.jpg" class="card-img-top border-bottom bg-light" alt="Surface Laptop 5" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Surface Laptop 5</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col d-flex">
            <div class="card rounded-0 w-100">
              <img src="assets/images/category/window/window4.jpg" class="card-img-top border-bottom bg-light" alt="Surface Book 3" style="object-fit:cover;width:100%;height:220px;">
              <div class="card-body">
                <h6 class="card-title fw-bold text-dark">Surface Book 3</h6>
                <div class="d-flex align-items-center gap-2 my-3">
                  <div class="h6 mb-0 text-danger">599$</div>
                  <div class="h6 mb-0 text-muted text-decoration-line-through">699$</div>
                </div>
                <div class="d-grid">
                  <a href="cart.php" class="btn btn-outline-dark">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
  <hr>




  </div>
</section>
<!--end Brands-->





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