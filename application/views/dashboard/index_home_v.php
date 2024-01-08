<?php
  require_once("global_var.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TB ADMIN | <?=$title;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?=base_url();?>assets/img/Logo_TB.png" rel="icon">
  <link href="<?=base_url();?>assets/img/Logo_TB.png" rel="apple-touch-icon">

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
  <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>

  <!-- =======================================================
  ======================================================== -->
  <style type="text/css">
  .img-table{
    height: 55px;
    object-fit: cover;
  }

  .img-thumbnail{
    height: 250px;
    object-fit: cover;
  }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=base_url();?>dashboard/home_dashboard" class="logo d-flex align-items-center">
        <img src="<?=base_url();?>assets/img/logo.png" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url();?>assets/dashboard/img/user/admin1.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$fullname;?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$fullname;?></h6>
              <span><?=$level;?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url();?>dashboard/login/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?=($menu == 'home') ? '' : 'collapsed'; ?>" href="<?=base_url();?>dashboard/home_dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?=($menu == 'post') ? '' : 'collapsed'; ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" <?=($menu == 'post') ? "aria-expanded='true'" : ''; ?>>
          <i class="bi bi-menu-button-wide"></i><span>Post</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse <?=($menu == 'post') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url();?>dashboard/category" <?=($submenu == 'category') ? "class='active'" : ''; ?>>
              <i class="bi bi-circle"></i><span>Kategori</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>dashboard/news" <?=($submenu == 'article') ? "class='active'" : ''; ?>>
              <i class="bi bi-circle"></i><span>Artikel</span>
            </a>
          </li>
          
        </ul>
      </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle d-flex flex-row">
      <h1><?php if(!empty($title_breadcumb)) echo $title_breadcumb; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url();?>dashboard/home_dashboard">Home</a></li>
          <li class="breadcrumb-item active"><?=$breadcumb;?></li>
        </ol>
      </nav>
      <?php if(!empty($url_add)){ ?>
      <a class="btn btn-primary ms-auto" href="<?=$url_add;?>">
        <i class="bi bi-plus"></i> Tambah Data
      </a>
      <?php } ?>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">

    <!-- ========== CONTENT ========== -->
    <?php $this->load->view($page); ?>
    <!-- ======== END CONTENT ======== -->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span><?=date('Y');?></span></strong>. All Rights Reserved
    </div>
    </div>
  </footer><!-- End Footer -->

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
  <script src="<?=base_url();?>assets/js/number_parse.js"></script>

  <script type="text/javascript">
  $(document).ready(function(){
    // NUM ONLY
    $(".num_only").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
  });
  </script>

</body>

</html>