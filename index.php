<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>The Alpine Marmot Project</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon_mountain.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- DataTable -->

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">



  <!-- =======================================================
  Using this model as a basis
  * Template Name: Amoeba - v2.0.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
<?php
    include("model/model.php"); // Model for the website
    include("array.php"); // Array that get all the display page with his control
    include("header.php"); // Header of the website
    if (empty($_GET)){ // If there isn't page mention, it chooses the default page to display
        $index="main_page";// Default setting
    }
    else {
        $index=$_GET['page'];// Get the page name to it with the good display and control
    }
    if ($index=="formAddHandlerYear" OR $index=="formAddStudySite" OR $index=="formColor"){// Check if the formChoose is needed before interact with the following form
        if (empty($_GET['year'])){// If there isn't page mention, it displays the chooseYear form
            $index="formChooseYear";
        }
    }
    include($tab[$index][1]);// Get the good control
    if (isset($alert)){
        print($alert);// Print an alert message if there is one
    }
    if ($_GET['multiform']=='end'){
        print("<div class='alert alert-success alert-dismissible fade show' role='alert'>Success ! Multiform finish</div>"); // Print the end multiform message at the end of the multiform
    }
    if ($_GET['multiform']=='true'){// If we use the form in multiform mode, it add the right display
        include("multiform.php");
    }
    include($tab[$index][0]);// Display the good page
    include("footer_backtop.php");// Footer of the website
    ?>
</body>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- Script for dataTables -->
  <script>
    $(document).ready(function() {
                  $('#table_id').DataTable();
                  } );
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</html>
