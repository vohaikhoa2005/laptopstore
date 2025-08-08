<?php
include 'header.php';
require_once 'config/database.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name     = trim($_POST['name'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $phone    = trim($_POST['phone'] ?? '');
  $password = $_POST['password'] ?? '';
  $address  = trim($_POST['address'] ?? '');
  $role     = 'user';

  // Validate
  if (!$name || !$email || !$phone || !$password) {
    $error = 'Please fill in all required fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email address.';
  } elseif (strlen($password) < 6) {
    $error = 'Password must be at least 6 characters.';
  } elseif (empty($_POST['terms'])) {
    $error = 'You must agree to the Terms of Use.';
  } else {
    // Check email exists (PDO)
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    if ($stmt->fetch()) {
      $error = 'Email already exists.';
    } else {
      // Hash password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $stmt = $conn->prepare('INSERT INTO users (name, email, phone, password, role, address) VALUES (:name, :email, :phone, :password, :role, :address)');
      $result = $stmt->execute([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => $hashed_password,
        'role' => $role,
        'address' => $address
      ]);
      if ($result) {
        $success = 'Registration successful!';
      } else {
        $error = 'Registration failed. Please try again.';
      }
    }
  }
}
?>

<div class="page-content">
  <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Authentication</a></li>
          <li class="breadcrumb-item active" aria-current="page">Register</li>
        </ol>
      </nav>
    </div>
  </div>

  <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 col-xl-5 col-xxl-5 mx-auto">
          <div class="card rounded-0">
            <div class="card-body p-4">
              <h4 class="mb-0 fw-bold text-center">Create an Account</h4>
              <hr>
              <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
              <?php endif; ?>
              <!-- Modal Success -->
              <div class="modal fade" id="registerSuccessModal" tabindex="-1"
                aria-labelledby="registerSuccessModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="registerSuccessModalLabel">Registration
                        Successful
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Congratulations! Your account has been created successfully!
                    </div>
                    <div class="modal-footer">
                      <a href="login.php" class="btn btn-primary">Login Now</a>
                      <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <form method="post" autocomplete="off" id="registerForm">
                <div class="row g-4">
                  <div class="col-12">
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" class="form-control rounded-0" id="name" name="name" required
                      value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                  </div>
                  <div class="col-12">
                    <label for="phone" class="form-label">Phone Number *</label>
                    <input type="text" class="form-control rounded-0" id="phone" name="phone"
                      required value="<?= htmlspecialchars($_POST['phone'] ?? '') ?>">
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control rounded-0" id="email" name="email"
                      required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" class="form-control rounded-0" id="password"
                      name="password" required>
                    <small class="text-muted">Minimum 6 characters</small>
                  </div>
                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control rounded-0" id="address" name="address"
                      value="<?= htmlspecialchars($_POST['address'] ?? '') ?>">
                  </div>
                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms"
                        value="1" required <?= isset($_POST['terms']) ? 'checked' : '' ?>>
                      <label class="form-check-label" for="terms">
                        I agree to the Terms of Use *
                      </label>
                    </div>
                  </div>
                  <div class="col-12">
                    <hr class="my-0">
                  </div>
                  <div class="col-12">
                    <button type="submit" id="btnRegister"
                      class="btn btn-dark rounded-0 btn-ecomm w-100">
                      <span id="btnRegisterText">Register</span>
                      <span id="btnRegisterLoading"
                        class="spinner-border spinner-border-sm d-none" role="status"
                        aria-hidden="true"></span>
                    </button>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0 rounded-0 w-100">Already have an account? <a
                        href="login.php" class="text-danger">Login</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'footer.php'; ?>

<script>
  // Disable button and show loading on submit
  document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('registerForm');
    var btn = document.getElementById('btnRegister');
    var btnText = document.getElementById('btnRegisterText');
    var btnLoading = document.getElementById('btnRegisterLoading');
    if (form) {
      form.addEventListener('submit', function() {
        btn.disabled = true;
        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');
      });
    }
  });

  <?php if ($success): ?>
    document.addEventListener('DOMContentLoaded', function() {
      setTimeout(function() {
        var modal = new bootstrap.Modal(document.getElementById('registerSuccessModal'));
        modal.show();
        // Re-enable button and reset loading (in case user stays on page)
        var btn = document.getElementById('btnRegister');
        var btnText = document.getElementById('btnRegisterText');
        var btnLoading = document.getElementById('btnRegisterLoading');
        if (btn && btnText && btnLoading) {
          btn.disabled = false;
          btnText.classList.remove('d-none');
          btnLoading.classList.add('d-none');
        }
      }, 1500); // 1.5s delay
    });
  <?php endif; ?>
</script>