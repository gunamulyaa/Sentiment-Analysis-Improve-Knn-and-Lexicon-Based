<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Analisis Sentimen</title>

  <!-- Custom fonts for this template-->
  <link href="assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Plugin Sweet Alert -->
  <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="assets/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    
    <!-- Bootstrap core JavaScript-->
  <script src="assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/sbadmin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/sbadmin/js/demo/datatables-demo.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-admin"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Analisis Sentimen</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Menu
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Klasifikasi:</h6>
            <a class="collapse-item" href="index.php?halaman=data_latih">Data Latih</a>
            <a class="collapse-item" href="index.php?halaman=data_uji">Data Uji</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Tables -->

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=hasil_filtering">
          <i class="fas fa-fw fa-table"></i>
          <span>Hasil Filtering</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=klasifikasi">
          <i class="fas fa-fw fa-cog"></i>
          <span>Klasifikasi</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=kamus">
          <i class="fas fa-fw fa-book"></i>
          <span>Kamus Lexicon</span></a>
      </li>

       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTree" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Hasil Analisis</span>
        </a>
        <div id="collapseTree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Hasil Analisis</h6>
            <a class="collapse-item" href="index.php?halaman=analisis">Hasil Klasifikasi</a>
            <a class="collapse-item" href="index.php?halaman=hasil_tfidf">Hasil TF-IDF</a>
            <a class="collapse-item" href="index.php?halaman=wordCloud">Word Count</a>
          </div>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=analisis">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Hasil Analisis</span></a>
      </li> -->


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <!-- <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div> -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Klasifikasi Improved K-NN</span>
                <img class="img-profile rounded-circle" src="assets/img/admin_icon.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
