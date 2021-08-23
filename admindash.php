<?php
 session_start();

 if(!isset($_SESSION['admin_id'])){     //A session named 'session_id' is created and checked
     header('location:../');
 }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <title>Sign In - 30MinRecipes</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    
 <style>
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
 </style>
</head>

<body>




  <div id="headerSection">
     <div class="container-fluid p-0" >
        <div class="row align-items-center">

            <nav class="navbar fixed-top navbar-expand-lg bg-light">
                      <a class="navbar-brand" href="#">
                      <img src="../images/logo.png" class="img-fluid">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mr-auto text-center">

                         <li class="nav-item active" >
                             <a class="nav-link" href="categories.php"  style=" font: bolder;">
                             </a>
                          </li>
                      </ul>
                  
                     <div id="rightNav">

                         <h5> <i><i class="fa fa-user-circle"></i>
                          <?php echo $_SESSION['name']; ?>
                          </i></h5>
                     </div>


         
        </div>
    </div> 
</div>
<!--sie bar-->
<div class="container-fluid" style="margin-top:70px;">
  <div class="row"> 

    <nav class="col-sm-12 bg-light sidebar py-5">

      <div class="sidebar">
  <a class="active" href="admindash.php"><i class="fa fa-fw fa-home"></i> Home</a>
  <a class="nav-link" href="allrecipes.php"><i class="fa fa-fw fa-wrench"></i> All Recipes</a>
   <a class="nav-link" href="insertrecipes.php"><i class="fa fa-fw fa-pencil-square-o "></i> Insert Recipe</a>
  <a class="nav-link" href="../routes/logout.php"><i class="fa fa-fw fa-user"></i>Logout</a>
</div>

    <!--   <div class="sidebar">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="admindash.php"><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="allrecipes.php"><i class="fa fa-fw fa-wrench"></i> All Recipes</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="insertrecipes.php"><i class="fa fa-fw fa-pencil-square-o "></i> Insert Recipe</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="../routes/logout.php"><i class="fa fa-fw fa-user"></i>Logout</a>
        </li>
      </ul>
    </div> -->
    </nav>
</div>
</div>




<!-- 
 <div id="demo" class="carousel slide" data-ride="carousel">
  
      <div class="carousel-caption d-none d-md-block">
        <h3 class="container-fluid" style="color: white; font-weight: 50; font-size: 50px;"><p>WELCOME ADMIN</p>
          </h3>
      </div>  
     <ul class="carousel-indicators">
        
   </ul>

     <div class="carousel-inner" >
       <div class="carousel-item active">
          <img src="../images/slide1.jpg" alt="_parent" width="100%"/>
       </div>
       <div class="carousel-item">
          <img src="../images/slide2.jpg" alt="_parent" width="100%">  
       </div>
        <div class="carousel-item">
          <img src="../images/slide3.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide4.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide5.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide6.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide7.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide8.jpg" alt="_parent" width="100%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide9.jpg" alt="_parent" width="100%">  
       </div>
        <div class="carousel-item">
          <img src="../images/slide10.jpg" alt="_parent" width="100%">  
       </div>
     </div>
 
   </div>  -->
   <!--carousal ends here-->

<hr class="container" color="black" > 
<p  style="font-size:3vw;" class="text-center"> OPERATIONS</p><hr class="container" color="black"> 



<div class="container">
   <div class="row px-5 p-2" style="margin-left: 150px; ">

      <div class="card" style="width:800px">
  <img class="card-img-top" src="../images/ovo-vegan.jpeg" alt="Card image">
  <div class="card-img-overlay">
    <h4 class="card-title" style=" color:white;">INSERT RECIPES</h4>
   <p class="card-text" style=" color:white;">Vegetarian, Vegan, Lacto and Ovo</p>
    <a href="insertrecipes.php" class="btn btn-primary">Click Here</a>
  </div>
</div>
       <div class="px-5"></div>
<div class="card" style="width:800px">
  <img class="card-img-top" src="../images/category-2.jpg" alt="Card image">
  <div class="card-img-overlay">
    <h4 class="card-title" style=" color:white;">VIEW ALL RECIPES</h4>
   <p class="card-text" style=" color:white;">Vegetarian, Vegan, Lacto and Ovo</p>
    <a href="allrecipes.php" class="btn btn-primary">Click Here</a>
  </div>
</div>

   
     
 </div>
<!-- 
<div class="container-fluid">
   <div class="row" style="margin-left: 150px; ">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Order Status</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>
                              <div class="form-check form-check-muted m-0">
                               
                              </div>
                            </th>
                            <th> Client Name </th>
                            <th> Order No </th>
                            <th> Product Cost </th>
                            <th> Project </th>
                            <th> Payment Mode </th>
                            <th> Start Date </th>
                            <th> Payment Status </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face1.jpg" alt="image" />
                              <span class="pl-2">Henry Klein</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Dashboard </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face2.jpg" alt="image" />
                              <span class="pl-2">Estella Bryan</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Cash on delivered </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-warning">Pending</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face5.jpg" alt="image" />
                              <span class="pl-2">Lucy Abbott</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> App design </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-danger">Rejected</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face3.jpg" alt="image" />
                              <span class="pl-2">Peter Gill</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Development </td>
                            <td> Online Payment </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check form-check-muted m-0">
                                <label class="form-check-label">
                                  <input type="checkbox" class="form-check-input">
                                </label>
                              </div>
                            </td>
                            <td>
                              <img src="assets/images/faces/face4.jpg" alt="image" />
                              <span class="pl-2">Sallie Reyes</span>
                            </td>
                            <td> 02312 </td>
                            <td> $14,500 </td>
                            <td> Website </td>
                            <td> Credit card </td>
                            <td> 04 Dec 2019 </td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
</div>
</div> -->


<!-- <div class="container-fluid">
<div class="row" style="margin-left: 150px; ">
  <div id="records"></div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Recipe Name</th>
      <th scope="col">Category</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
    <td><?php //mysqli_query("select * from recipe where title='$title'") ?></td>
      <td>'.$row['category'].'</td>
      <td>
  </tbody>
</table>

</div>
</div>
<script>
  

//var title =<?php //echo $_GET['title'];  ?>;

</script>
 -->


<script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>


    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
  </body>
</html>