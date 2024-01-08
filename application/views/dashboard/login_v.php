<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Transisi Bersih | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url();?>assets/img/logo.png" rel="icon">
  <link href="<?=base_url();?>assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url();?>assets/dashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url();?>assets/dashboard/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url();?>assets/dashboard/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <!-- <div class="d-flex justify-content-center py-4">
                <a href="<?=base_url();?>dashboard/login" class="logo d-flex align-items-center w-auto">
                  <img src="<?=base_url();?>assets/img/Logo_TB.png" alt="">
                </a>
              </div> -->
              <!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate action="<?php echo base_url(); ?>dashboard/login/proses_login" method="post">
                    <?php if($this->session->flashdata('gagal')){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Username tidak ditemukan
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    <?php if($this->session->flashdata('wrong_password')){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      Password anda salah, silahkan coba lagi.
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php } ?>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key-fill"></i></span>
                        <input type="password" class="form-control" name="password" id="yourPassword" placeholder="Password" value="" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>

                    <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->

                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url();?>assets/dashboard/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url();?>assets/dashboard/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url();?>assets/dashboard/js/main.js"></script>

</body>

</html>