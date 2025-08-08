<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!doctype html>
<html lang="en" class="light-theme">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/Logo_laptopStore.png" type="images/Logo_laptopStore" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="assets/plugins/slick/slick-theme.css" />
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/dark-theme.css" rel="stylesheet">
  <title>Shopingo - eCommerce HTML Template</title>
</head>

<body>
 
  <header class="top-header">
    <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
      <a class="navbar-brand d-none d-xl-inline" href="index.php"><img src="assets/images/Logo_laptopStore.png" class="logo-img" alt=""></a>
      <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <i class="bi bi-list"></i>
      </a>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
          <div class="offcanvas-logo"><img src="assets/images/Logo_laptopStore.png" class="logo-img" alt="">
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body primary-menu">
          <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
              <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                <?php
                require_once __DIR__ . '/config/database.php';
                $stmt = $conn->query('SELECT id, name FROM categories ORDER BY name ASC');
                while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo '<li><a class="dropdown-item" href="products.php?category=' . $cat['id'] . '">' . htmlspecialchars($cat['name']) . '</a></li>';
                }
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#aboutshop">About shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php#contactshop">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <ul class="navbar-nav secondary-menu flex-row">
        
        <li class="nav-item d-flex align-items-center justify-content-center">
          <a class="nav-link position-relative d-flex flex-column align-items-center justify-content-center" href="cart.php" style="min-width:48px;">
            <?php
            $cart_count = 0;
            if (session_status() === PHP_SESSION_NONE) session_start();
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                $cart_count = array_sum($_SESSION['cart']);
            }
            ?>
            <div class="cart-badge" style="position:absolute;top:3px;right:0;transform:translate(50%,-50%);">
              <?= $cart_count ?>
            </div>
            <i class="bi bi-basket2" style="font-size: 1.5rem;"></i>
          </a>
        </li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link d-flex flex-column align-items-center" href="account-profile.php" style="gap:2px;">
              <i class="bi bi-person-circle" style="font-size:1.5rem;"></i>
              <span style="font-size: 0.9rem;"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
            </a>
            <form method="post" action="logout.php" style="display:inline; margin-left:10px;">
              <button type="submit" class="btn btn-link nav-link" style="display:inline; padding:0; color:#dc3545;">Logout</button>
            </form>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
</header>
<script>
  function scrollToSection(id) {
    var section = document.getElementById(id);
    if (section) {
      section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      window.scrollTo({ top: section.offsetTop, behavior: 'smooth' });
    }
  }
  document.documentElement.style.scrollBehavior = 'smooth';
</script>