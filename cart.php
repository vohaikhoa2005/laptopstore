<?php
session_start();
require_once 'config/database.php';

// Xử lý cập nhật/xoá sản phẩm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xoá sản phẩm
    if (isset($_POST['remove_id'])) {
        $remove_id = intval($_POST['remove_id']);
        unset($_SESSION['cart'][$remove_id]);
    }
    // Cập nhật số lượng
    if (isset($_POST['update_qty']) && is_array($_POST['update_qty'])) {
        foreach ($_POST['update_qty'] as $pid => $qty) {
            $pid = intval($pid);
            $qty = max(1, intval($qty));
            if (isset($_SESSION['cart'][$pid])) {
                $_SESSION['cart'][$pid] = $qty;
            }
        }
    }
    // Sau khi xử lý, reload lại trang để tránh lỗi F5
    header('Location: cart.php');
    exit;
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$cart_products = [];
if (!empty($cart)) {
    $ids = array_keys($cart);
    $in = implode(',', array_map('intval', $ids));
    if ($in) {
        $stmt = $conn->query("SELECT * FROM products WHERE id IN ($in)");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $row['quantity'] = $cart[$row['id']];
            $cart_products[] = $row;
        }
    }
}
?>
<?php include 'header.php'; ?>


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

<!--start page content-->
<div class="page-content">
  <div class="py-4 border-bottom mt-0 mb-0">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="products.php">Shop</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cart</li>
        </ol>
      </nav>
    </div>
  </div>


  
  <section class="section-padding">
    <div class="container">
      <div class="d-flex align-items-center px-3 py-2 border mb-4">
        <div class="text-start">
          <h4 class="mb-0 h4 fw-bold">Your Cart (3 items)</h4>
        </div>
        <div class="ms-auto">
          <a href="products.php" class="btn btn-light btn-ecomm">Continue Shopping</a>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-12 col-xl-8">
          <div class="card rounded-0 mb-3">
            <div class="card-body">
              <div class="table-responsive">
                <form method="post" action="cart.php">
                <table class="table align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($cart_products)): ?>
                      <tr><td colspan="6" class="text-center">Your cart is empty.</td></tr>
                    <?php else: ?>
                    <?php foreach ($cart_products as $p): ?>
                        <tr>
                          <td><img src="<?php echo htmlspecialchars($p['thumbnail']); ?>" width="80" alt="<?php echo htmlspecialchars($p['name']); ?>" style="object-fit:contain;background:#fff;border-radius:8px;"></td>
                          <td class="fw-bold"><?php echo htmlspecialchars($p['name']); ?></td>
                          <td>$<?php echo htmlspecialchars($p['price']); ?></td>
                          <td>
                            <input type="number" name="update_qty[<?php echo $p['id']; ?>]" value="<?php echo $p['quantity']; ?>" min="1" class="form-control form-control-sm" style="width:60px;">
                          </td>
                          <td>$<?php echo $p['price'] * $p['quantity']; ?></td>
                          <td>
                            <button type="submit" name="remove_id" value="<?php echo $p['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this product?');"><i class="bi bi-x-lg"></i></button>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
                <?php if (!empty($cart_products)): ?>
                  <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-primary">Update Cart</button>
                  </div>
                <?php endif; ?>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-4">
          <div class="card rounded-0 mb-3">
            <div class="card-body">
              <h5 class="fw-bold mb-4">Order Summary</h5>
              <?php
                $subtotal = 0;
                foreach ($cart_products as $p) {
                    $subtotal += $p['price'] * $p['quantity'];
                }
                $discount = ($subtotal >= 1000) ? 100 : 0; // Giảm giá nếu đủ điều kiện
                $shipping = ($subtotal > 0) ? 29 : 0;
                $total = $subtotal - $discount + $shipping;
              ?>
              <div class="hstack align-items-center justify-content-between">
                <p class="mb-0">Subtotal</p>
                <p class="mb-0">$<?php echo $subtotal; ?></p>
              </div>
              <hr>
              <div class="hstack align-items-center justify-content-between">
                <p class="mb-0">Discount</p>
                <p class="mb-0 text-success">- $<?php echo $discount; ?></p>
              </div>
              <hr>
              <div class="hstack align-items-center justify-content-between">
                <p class="mb-0">Shipping Fee</p>
                <p class="mb-0">$<?php echo $shipping; ?></p>
              </div>
              <hr>
              <div class="hstack align-items-center justify-content-between fw-bold text-content">
                <p class="mb-0">Total</p>
                <p class="mb-0">$<?php echo $total; ?></p>
              </div>
              </div>
              <div class="d-grid mt-4">
                <button type="button" class="btn btn-dark btn-ecomm py-3 px-5">Place Order</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>







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