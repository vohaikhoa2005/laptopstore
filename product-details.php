<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $pid = intval($_POST['product_id'] ?? 0);
    if ($pid > 0) {
        if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid] += 1;
        } else {
            $_SESSION['cart'][$pid] = 1;
        }
        header('Location: product-details.php?id=' . $pid);
        exit;
    }
}
include 'header.php';
?>

<div class="page-content">

    <div class="py-4 border-bottom">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Page Details</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

<?php
    require_once 'config/database.php';
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $product = null;
    $product_images = [];
    if ($product_id) {
        $stmt = $conn->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        $img_stmt = $conn->prepare('SELECT * FROM product_images WHERE product_id = :product_id');
        $img_stmt->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $img_stmt->execute();
        $product_images = $img_stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-xl-7">
                    <div class="product-images">
                        <div class="product-zoom-images">
                            <?php if (!empty($product['thumbnail'])): ?>
                                <div class="mb-3 text-center">
                                    <img src="<?= htmlspecialchars($product['thumbnail']) ?>" class="img-fluid" alt="<?= htmlspecialchars($product['name']) ?>" style="max-height:350px;object-fit:contain;">
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($product_images)): ?>
                                <div class="row row-cols-auto g-2 justify-content-center">
                                    <?php foreach ($product_images as $img): ?>
                                        <div class="col">
                                            <div class="img-thumb-container overflow-hidden position-relative" data-fancybox="gallery" data-src="<?= htmlspecialchars($img['image_url']) ?>">
                                                <img src="<?= htmlspecialchars($img['image_url']) ?>" class="img-fluid border" alt="<?= htmlspecialchars($product['name']) ?>" style="max-width:80px;max-height:80px;object-fit:cover;">
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xl-5">
                    <div class="product-info">
                        <h4 class="product-title fw-bold mb-1"><?= htmlspecialchars($product['name'] ?? '') ?></h4>
                        <p class="mb-0"><?= htmlspecialchars($product['descriptions'] ?? '') ?></p>
                        <div class="product-rating">
                            <div class="hstack gap-2 border p-1 mt-3 width-content">
                                <div><span class="rating-number">4.7</span><i class="bi bi-star-fill ms-1 text-warning"></i></div>
                                <div class="vr"></div>
                                <div>1,245 Reviews</div>
                            </div>
                        </div>
                        <hr>
                        <div class="product-price d-flex align-items-center gap-3">
                            <div class="h4 fw-bold">$<?= htmlspecialchars($product['price'] ?? '') ?></div>
                            <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): ?>
                                <div class="h5 fw-light text-muted text-decoration-line-through">$<?= htmlspecialchars($product['old_price']) ?></div>
                                <div class="h4 fw-bold text-danger">(Save <?= round(100 * ($product['old_price'] - $product['price']) / $product['old_price']) ?>%)</div>
                            <?php endif; ?>
                        </div>
                        <p class="fw-bold mb-0 mt-1 text-success">Price includes VAT</p>

                        <form method="post" class="mt-4">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button type="submit" name="add_to_cart" class="btn btn-lg btn-dark btn-ecomm px-5 py-3"><i class="bi bi-basket2 me-2"></i>Add to Cart</button>
                        </form>
                    </div>
                </div>
                <hr class="my-3">
            </div><!--end row-->
                <div class="row justify-content-center align-items-start mb-4">
                    <div class="col-12 d-flex flex-column align-items-center">
                        <!-- Product Information Table -->
                        <div class="product-info text-center d-flex flex-column align-items-center mb-4 w-100" style="max-width: 500px;">
                            <h6 class="fw-bold mb-3" style="font-size: 1.5rem;">Product Information</h6>
                            <div class="table-responsive w-100">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th class="text-start" style="width: 40%;">Display</th>
                                            <td class="text-start">15.6" FHD (1920x1080), anti-glare</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">CPU</th>
                                            <td class="text-start">Intel Core i5-1235U (up to 4.4GHz, 10 cores 12 threads)</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">RAM</th>
                                            <td class="text-start">8GB DDR4 3200MHz</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Storage</th>
                                            <td class="text-start">512GB SSD M.2 PCIe</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Graphics</th>
                                            <td class="text-start">Intel Iris Xe Graphics</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Battery</th>
                                            <td class="text-start">3 cell 41Wh</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Operating System</th>
                                            <td class="text-start">Windows 11 Home SL</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Weight</th>
                                            <td class="text-start">1.65kg</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Warranty</th>
                                            <td class="text-start">12 months official</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Customer Ratings -->
                        <div class="customer-ratings text-center d-flex flex-column align-items-center p-4 rounded-4 shadow-sm bg-white w-100" style="max-width: 900px; font-size: 1.15rem;">
                            <h5 class="fw-bold mb-4" style="font-size: 1.5rem;">Customer Ratings</h5>
                            <div class="d-flex align-items-center gap-5 flex-wrap flex-lg-nowrap justify-content-center w-100">
                                <div class="flex-shrink-0">
                                    <h1 class="mb-2 fw-bold display-3" style="font-size: 3.5rem;">4.7
                                        <span class="fs-2 ms-2 text-warning"><i class="bi bi-star-fill"></i></span>
                                    </h1>
                                    <p class="mb-0 text-muted" style="font-size: 1.1rem;">1,245 verified buyers</p>
                                </div>
                                <div class="vr d-none d-lg-block" style="height: 110px;"></div>
                                <div class="w-100 ps-lg-4">
                                    <div class="rating-wrrap hstack gap-3 align-items-center mb-2" style="font-size: 1.1rem;">
                                        <span class="fw-bold" style="width: 28px;">5</span>
                                        <i class="bi bi-star text-warning"></i>
                                        <div class="progress flex-grow-1 mb-0 rounded-pill" style="height: 14px; background: #f1f1f1;">
                                            <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: 75%"></div>
                                        </div>
                                        <span class="fw-bold" style="width: 40px;">900</span>
                                    </div>
                                    <div class="rating-wrrap hstack gap-3 align-items-center mb-2" style="font-size: 1.1rem;">
                                        <span class="fw-bold" style="width: 28px;">4</span>
                                        <i class="bi bi-star text-success"></i>
                                        <div class="progress flex-grow-1 mb-0 rounded-pill" style="height: 14px; background: #f1f1f1;">
                                            <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: 65%"></div>
                                        </div>
                                        <span class="fw-bold" style="width: 40px;">200</span>
                                    </div>
                                    <div class="rating-wrrap hstack gap-3 align-items-center mb-2" style="font-size: 1.1rem;">
                                        <span class="fw-bold" style="width: 28px;">3</span>
                                        <i class="bi bi-star text-info"></i>
                                        <div class="progress flex-grow-1 mb-0 rounded-pill" style="height: 14px; background: #f1f1f1;">
                                            <div class="progress-bar bg-info rounded-pill" role="progressbar" style="width: 45%"></div>
                                        </div>
                                        <span class="fw-bold" style="width: 40px;">90</span>
                                    </div>
                                    <div class="rating-wrrap hstack gap-3 align-items-center mb-2" style="font-size: 1.1rem;">
                                        <span class="fw-bold" style="width: 28px;">2</span>
                                        <i class="bi bi-star text-warning"></i>
                                        <div class="progress flex-grow-1 mb-0 rounded-pill" style="height: 14px; background: #f1f1f1;">
                                            <div class="progress-bar bg-warning rounded-pill" role="progressbar" style="width: 35%"></div>
                                        </div>
                                        <span class="fw-bold" style="width: 40px;">40</span>
                                    </div>
                                    <div class="rating-wrrap hstack gap-3 align-items-center" style="font-size: 1.1rem;">
                                        <span class="fw-bold" style="width: 28px;">1</span>
                                        <i class="bi bi-star text-danger"></i>
                                        <div class="progress flex-grow-1 mb-0 rounded-pill" style="height: 14px; background: #f1f1f1;">
                                            <div class="progress-bar bg-danger rounded-pill" role="progressbar" style="width: 25%"></div>
                                        </div>
                                        <span class="fw-bold" style="width: 40px;">15</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <hr class="my-3">
            <div class="customer-reviews">
                <h6 class="fw-bold mb-3">Customer Reviews (320)</h6>
                <div class="reviews-wrapper">
                    <div class="d-flex flex-column flex-lg-row gap-3">
                        <div class=""><span class="badge bg-green rounded-0">5<i class="bi bi-star-fill ms-1"></i></span></div>
                        <div class="flex-grow-1">
                            <p class="mb-2">The laptop runs very smoothly, beautiful design, good battery. Fast delivery, careful packaging.</p>
                            <div class="review-img">
                                <img src="assets/images/Gaming_Laptops/gaming1.avif" alt="" width="70">
                            </div>
                            <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                                <div class="hstack flex-grow-1 gap-3">
                                    <p class="mb-0">Nguyen Van A</p>
                                    <div class="vr"></div>
                                    <div class="date-posted">07/10/2025</div>
                                </div>
                                <div class="hstack">
                                    <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>120</div>
                                    <div class="mx-3"></div>
                                    <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column flex-lg-row gap-3">
                        <div class=""><span class="badge bg-green rounded-0">4<i class="bi bi-star-fill ms-1"></i></span></div>
                        <div class="flex-grow-1">
                            <p class="mb-2">Product as described, strong configuration, suitable for office work and study.</p>
                            <div class="review-img">
                                <img src="assets/images/Gaming_Laptops/gaming2.jpg" alt="" width="70">
                            </div>
                            <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                                <div class="hstack flex-grow-1 gap-3">
                                    <p class="mb-0">Tran Thi B</p>
                                    <div class="vr"></div>
                                    <div class="date-posted">07/12/2025</div>
                                </div>
                                <div class="hstack">
                                    <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>80</div>
                                    <div class="mx-3"></div>
                                    <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column flex-lg-row gap-3">
                        <div class=""><span class="badge bg-warning rounded-0 text-dark">3<i class="bi bi-star-fill ms-1"></i></span></div>
                        <div class="flex-grow-1">
                            <p class="mb-2">Good value for money, nice screen, speakers are a bit small.</p>
                            <div class="review-img">
                                <img src="assets/images/Gaming_Laptops/gaming3.avif" alt="" width="70">
                            </div>
                            <div class="d-flex flex-column flex-sm-row gap-3 mt-3">
                                <div class="hstack flex-grow-1 gap-3">
                                    <p class="mb-0">Le Van C</p>
                                    <div class="vr"></div>
                                    <div class="date-posted">07/15/2025</div>
                                </div>
                                <div class="hstack">
                                    <div class=""><i class="bi bi-hand-thumbs-up me-2"></i>30</div>
                                    <div class="mx-3"></div>
                                    <div class=""><i class="bi bi-hand-thumbs-down me-2"></i>10</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="javascript:;" class="btn btn-ecomm btn-outline-dark">View All Reviews<i class="bi bi-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--start product details-->


    <!--start product details-->
    <section class="section-padding">
        <div class="container">
            <div class="separator pb-3">
                <div class="line"></div>
                <h3 class="mb-0 h3 fw-bold">Similar Products</h3>
                <div class="line"></div>
            </div>
            <div class="similar-products">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 g-4">
                    <!-- Similar Product 1 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="product-details.php">
                                <img src="assets/images/Gaming_Laptops/gaming2.jpg" class="card-img-top" alt="HP Pavilion 14">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-2 fw-bold">HP Pavilion 14</h6>
                                <p class="mb-1 text-muted small">Intel Core i5, 8GB RAM, 512GB SSD</p>
                                <div class="mb-2">
                                    <span class="fw-bold text-success">549$</span>
                                    <span class="text-muted text-decoration-line-through small">599$</span>
                                </div>
                                <a href="product-details.php" class="btn btn-sm btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Product 2 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="product-details.php">
                                <img src="assets/images/Gaming_Laptops/gaming3.avif" class="card-img-top" alt="Acer Aspire 5">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-2 fw-bold">Acer Aspire 5</h6>
                                <p class="mb-1 text-muted small">Intel Core i7, 16GB RAM, 1TB SSD</p>
                                <div class="mb-2">
                                    <span class="fw-bold text-success">799$</span>
                                    <span class="text-muted text-decoration-line-through small">899$</span>
                                </div>
                                <a href="product-details.php" class="btn btn-sm btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Product 3 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="product-details.php">
                                <img src="assets/images/Gaming_Laptops/gaming4.avif" class="card-img-top" alt="Lenovo IdeaPad 3">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-2 fw-bold">Lenovo IdeaPad 3</h6>
                                <p class="mb-1 text-muted small">AMD Ryzen 5, 8GB RAM, 512GB SSD</p>
                                <div class="mb-2">
                                    <span class="fw-bold text-success">499$</span>
                                    <span class="text-muted text-decoration-line-through small">579$</span>
                                </div>
                                <a href="product-details.php" class="btn btn-sm btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Product 4 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="product-details.php">
                                <img src="assets/images/Gaming_Laptops/gaming5.jpg" class="card-img-top" alt="Asus VivoBook 15">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-2 fw-bold">Asus VivoBook 15</h6>
                                <p class="mb-1 text-muted small">Intel Core i3, 4GB RAM, 256GB SSD</p>
                                <div class="mb-2">
                                    <span class="fw-bold text-success">399$</span>
                                    <span class="text-muted text-decoration-line-through small">449$</span>
                                </div>
                                <a href="product-details.php" class="btn btn-sm btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Similar Product 5 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <a href="product-details.php">
                                <img src="assets/images/Gaming_Laptops/gaming6.jpg" class="card-img-top" alt="MSI Modern 14">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title mb-2 fw-bold">MSI Modern 14</h6>
                                <p class="mb-1 text-muted small">Intel Core i5, 8GB RAM, 512GB SSD</p>
                                <div class="mb-2">
                                    <span class="fw-bold text-success">579$</span>
                                    <span class="text-muted text-decoration-line-through small">629$</span>
                                </div>
                                <a href="product-details.php" class="btn btn-sm btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </section>
    <!--end product details-->


</div>
<!--end page content-->


<?php include 'footer.php'; ?>