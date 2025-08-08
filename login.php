<?php include 'header.php'; ?>
<?php
include 'config/database.php'; // $conn là PDO

$login_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['login_success'] = 'Login successful!';
        if ($user['role'] === 'admin') {
            header('Location: admin');
        } else {
            header('Location: index.php');
        }
        exit;
    } else {
        $login_error = 'Email hoặc mật khẩu không đúng!';
    }
}
?>

<div class="page-content">

  <!--start product details-->
  <section class="section-padding">
    <div class="container">

      <div class="row">
        <div class="col-12 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
          <div class="card rounded-0">
            <div class="card-body p-4">
              <?php if (!empty($login_error)): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $login_error; ?>
                </div>
              <?php endif; ?>
              <h4 class="mb-0 fw-bold text-center">User Login</h4>
              <hr>
              <form id="loginForm" method="post" action="">
                <div class="row g-4">
                  <div class="col-12">
                    <label for="exampleEmail" class="form-label">Email</label>
                    <input type="email" class="form-control rounded-0" id="exampleEmail" name="email" required>
                  </div>
                  <div class="col-12">
                    <label for="examplePassword" class="form-label">Password</label>
                    <input type="password" class="form-control rounded-0" id="examplePassword" name="password" required>
                  </div>
                  <div class="col-12">
                    <a href="javascript:;" class="text-content btn bg-light rounded-0 w-100"><i
                        class="bi bi-lock me-2"></i>Forgot Password</a>
                  </div>
                  <div class="col-12">
                    <hr class="my-0">
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-dark rounded-0 btn-ecomm w-100">Login</button>
                  </div>
                  <div class="col-12 text-center">
                    <p class="mb-0 rounded-0 w-100">Don't have an account? <a href="register.php"
                        class="text-danger">Sign Up</a></p>
                  </div>
                </div><!---end row-->
              </form>
            </div>
          </div>
        </div>
      </div><!--end row-->

    </div>
  </section>
  <!--start product details-->


</div>
<!--end page content-->

<?php include 'footer.php'; ?>