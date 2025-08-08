<?php include 'header.php'; ?>


<!--start page content-->
<div class="page-content">

  <!--start breadcrumb-->
  <div class="py-4 border-bottom">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:;">Account</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->

  <!--start product details-->
  <section class="section-padding">
    <div class="container">
      <div class="d-flex align-items-center px-3 py-2 border mb-4 bg-light rounded">
        <div class="text-start w-100">
          <h4 class="mb-0 h4 fw-bold"><i class="bi bi-person-circle me-2"></i>Account Information</h4>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card rounded-0 shadow-sm">
        <div class="card-body p-3">
          <div class="d-flex flex-column align-items-center mb-3">
            <i class="bi bi-person-circle mb-2" style="font-size:2.5rem;"></i>
            <h6 class="mb-1 fw-bold text-center">John Smith</h6>
            <span class="text-muted text-center" style="font-size:0.95rem;">Member Customer</span>
          </div>
          <div class="row g-2">
            <div class="col-12">
          <div class="border p-2 rounded bg-white mb-0">
            <label class="form-label fw-bold mb-1" style="font-size:0.95rem;">Phone Number</label>
            <div class="form-control-plaintext" style="font-size:0.95rem;">+84 912 345 678</div>
          </div>
            </div>
            <div class="col-12">
          <div class="border p-2 rounded bg-white mb-0">
            <label class="form-label fw-bold mb-1" style="font-size:0.95rem;">Email</label>
            <div class="form-control-plaintext" style="font-size:0.95rem;">johnsmith@example.com</div>
          </div>
            </div>
            <div class="col-12">
          <div class="border p-2 rounded bg-white mb-0">
            <label class="form-label fw-bold mb-1" style="font-size:0.95rem;">Gender</label>
            <div class="form-control-plaintext" style="font-size:0.95rem;">Male</div>
          </div>
            </div>
            <div class="col-12">
          <div class="border p-2 rounded bg-white mb-0">
            <label class="form-label fw-bold mb-1" style="font-size:0.95rem;">Date of Birth</label>
            <div class="form-control-plaintext" style="font-size:0.95rem;">01/01/1990</div>
          </div>
            </div>
            <div class="col-12">
          <div class="border p-2 rounded bg-white mb-0">
            <label class="form-label fw-bold mb-1" style="font-size:0.95rem;">Address</label>
            <div class="form-control-plaintext" style="font-size:0.95rem;">District 1, Ho Chi Minh City</div>
          </div>
            </div>
          </div>
          <div class="text-end mt-3">
            <a href="account-edit-profile.php" class="btn btn-dark btn-ecomm px-3 py-1" style="font-size:0.95rem;"><i class="bi bi-pencil me-2"></i>Edit Profile</a>
          </div>
        </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--start product details-->


  <!-- ...existing code... -->


</div>
<!--end page content-->

<?php include 'footer.php'; ?>