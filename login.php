<?php 
session_start();

if (isset($_SESSION['username'])){
 echo "<script> document.location.href='index.php'; </script>";
  } 

  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Event</title>

  <!-- Custom fonts for this template-->
  <link href="assets/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/sweetalert/sweetalert.css" rel="stylesheet">
  
<br>
<br>
<br>
</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Account Login</h1>
                  </div>
                  <form class="user" method="post" action="action_login.php">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                      </form>
                    </script>
                </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<br>
<br>
<br>
  <script src="assets/sweetalert/sweetalert.min.js"></script>
  <script src="assets/sweetalert/sweetalert.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/sbadmin/vendor/jquery/jquery.min.js"></script>
  <script src="assets/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/sbadmin/js/sb-admin-2.min.js"></script>

</body>

<footer class="sticky-footer">
        <div class="container my-auto text-white ">
          <div class="copyright text-center my-auto">
          <span>SISTEM ANALISIS SENTIMEN</span><BR></BR>
          <span>20101001 | Kadek Gunamulya Sudarma Yasa</span>
          </div>
        </div>
      </footer>

</html>
