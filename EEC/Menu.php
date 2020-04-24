<?php
session_start();
?>

<?php
error_reporting(1);
extract($_POST);
extract($_GET);
extract($_SESSION);

if(!isset($_SESSION[login]) || $_SESSION[stu]!='student')
{
	header("location: index.php");
}
?>

 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Student</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="style/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="style/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="style/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="style/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="style/images/favicon.png" />
</head>   
 
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
   <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo $_SESSION[login]?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <!--<a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              --><a class="dropdown-item" href="signout.php">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-circle-outline menu-icon"></i>
              <span class="menu-title">Marks</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="result.php">Marks History</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic1">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Message</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
            <!--      <li class="nav-item"> <a class="nav-link" href="Message.php">View Message</a></li>
                -->  <li class="nav-item"> <a class="nav-link" href="Message.php">Send Message</a></li>
              </ul>
            </div>
          </li>
       <!-- <li class="nav-item">
            <a class="nav-link" href="signout.php">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">LogOut</span>
            </a>
          </li>
           --> 
           <li class="nav-item">
               <a class="nav-link" href="topic.php">
              <i class="mdi mdi-emoticon menu-icon"></i>
              <span class="menu-title">View Topic</span>
            </a>
          </li>
        </ul>
      </nav>


  <div class="main-panel">
      <div class="content-wrapper" style="background: #D0D0D0">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                  </div>
                  <div class="d-flex">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;EEC&nbsp;/&nbsp;</p>
                    <p class="text-primary mb-0 hover-cursor"><?php echo $_SESSION[login]; ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
           </div>
              </div>
            </div>
          </div>
      
  
<?php
  
require 'database.php';
//$sql = "SELECT * FROM category";
//$rs=$dbhandler->query($sql);

/*$statement = $dbhandler->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
*/?>
  
            <form>
            <div class="template-demo mt-2">
             
                   
           <a class='btn btn-outline-dark btn-icon-text' href='Module.php?id=1'>
                            <br><br><br><br>
                          <i class='mdi mdi-brush  btn-icon-prepend mdi-36px'></i>
                          <span class='d-inline-block text-left'>
                            <small class='font-weight-light d-block'>Test</small>
                            <font size='50px'>  Listening  </font>                     
                           </span>
                          <br><br><br><br>
           </a>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                
           <a class='btn btn-outline-dark btn-icon-text' href='Module.php?id=2'>
                            <br><br><br><br>
                          <i class='mdi mdi-brush  btn-icon-prepend mdi-36px'></i>
                          <span class='d-inline-block text-left'>
                            <small class='font-weight-light d-block'>Test</small>
                            <font size='50px'>  Reading  </font>                     
                           </span>
                          <br><br><br><br>
           </a>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <a class='btn btn-outline-dark btn-icon-text' href='Module.php?id=3'>
                            <br><br><br><br>
                          <i class='mdi mdi-brush  btn-icon-prepend mdi-36px'></i>
                          <span class='d-inline-block text-left'>
                            <small class='font-weight-light d-block'>Test</small>
                            <font size='50px'>  Writing  </font>                     
                           </span>
                          <br><br><br><br>
           </a>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                
        
                
            </div>
            </form>
  
  
  
      <!-- partial -->
  <!-- plugins:js -->
  <script src="style/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="style/vendors/chart.js/Chart.min.js"></script>
  <script src="style/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="style/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="style/js/off-canvas.js"></script>
  <script src="style/js/hoverable-collapse.js"></script>
  <script src="style/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="style/js/dashboard.js"></script>
  <script src="style/js/data-table.js"></script>
  <script src="style/js/jquery.dataTables.js"></script>
  <script src="style/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  
</body>
</html>
