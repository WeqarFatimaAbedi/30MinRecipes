<?php
    session_start();
    include('../resources/api/connect.php');

    $query = mysqli_query($con,"select * from aboutus");
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
      <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
    

 <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css1/animate.css">
    
    <link rel="stylesheet" href="../css1/owl.carousel.min.css">
    <link rel="stylesheet" href="../css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="../css1/aos.css">

    <link rel="stylesheet" href="../css1/ionicons.min.css">

    <link rel="stylesheet" href="../css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css1/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css1/flaticon.css">
    <link rel="stylesheet" href="../css1/icomoon.css">
    <link rel="stylesheet" href="../css1/style.css">
</head>

<body class="goto-here">
       
 <div class="container-fluid">
    <hr>
         <div class="row align-items-center">
             <div class="col-md-12 p-0">
                 <nav class="navbar fixed-top navbar-expand-lg bg-white navbar-light">
                      <a class="navbar-brand" href="#">
                      <img src="../images/logo.png" class="img-fluid">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mr-auto text-center">
                         <li class="nav-item active">
                             <a class="nav-link" href="../index.php">Home</a>
                          </li>
                          <li class="nav-item dropdown active">
                             <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
                             <div class="dropdown-menu">
                                 <a class="dropdown-item" href=vege.php>Vegetarian</a>
                                 <a class="dropdown-item" href="veg.php">Vegan</a>
                                 <a class="dropdown-item" href="lacto.php">Lacto Veg</a>
                                 <a class="dropdown-item" href="ovo.php">Ovo Veg</a>
                             </div>
                         </li>
                         <li class="nav-item active">
                              <a class="nav-link" href="menu.php">Menu</a>
                         </li>
                         <li class="nav-item active">
                              <a class="nav-link" href="#">About Us</a>
                         </li>
                         
                     </ul>
                     
                 </div>
            </nav>

             </div>
         </div>


         <br><br>
    
        <div class="row">
             <div id="demo" class="carousel slide" data-ride="carousel">
      <div class="carousel-caption d-none d-md-block">
        <h1>ABOUT US</h1>
        <h1 style="color: white;">What would you like to eat?</h1><br>
          <h3 style="color: white;"><p>Search by recipe names</p>
          </h3>
          <br>
      
      </div>  
     <ul class="carousel-indicators">
        <input type="text" id="searchItem"  class="form-control" placeholder="Search" aria-label="Search recipe..." aria-describedby="button-addon2">
        <button class="btn btn-success"  onclick="searchRecipe()" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
   </ul>

     <div class="carousel-inner">
       <div class="carousel-item active">
          <img src="../images/slide10.jpg" alt="_parent" width="120%"/>
       </div>
       <div class="carousel-item">
          <img src="../images/slide9.jpg" alt="_parent" width="120%">  
       </div>
        <div class="carousel-item">
          <img src="../images/slide8.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide7.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide6.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide5.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide4.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide3.jpg" alt="_parent" width="120%" >  
       </div>
        <div class="carousel-item">
          <img src="../images/slide2.jpg" alt="_parent" width="120%">  
       </div>
        <div class="carousel-item">
          <img src="../images/slide1.jpg" alt="_parent" width="120%">  
       </div>
     </div>

     <a class="carousel-control-prev" href="#demo" data-slide="prev">
       <span class="carousel-control-prev-icon"></span>
     </a>

     <a class="carousel-control-next" href="#demo" data-slide="next">
       <span class="carousel-control-next-icon"></span>
     </a>

   </div>
        </div>
     </div>

    
             
                 
    <!-- END nav --><br><hr><br>

<?php
 if(mysqli_num_rows($query) >0){
  
?>


    <section class="ftco-section">
      <div class="container">
        <div class="row">


          <div class="col-lg-8 ftco-animate">
            <div class="row">
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blogsingle.php" class="block-20" style="background-image: url('../images/category-1.jpg');">
                  </a>
                  <div class="text d-block pl-md-4">
                   
                    <h3 class="heading"><a href="#">Vegetarian</a></h3>
                   <?php
                            
                               while($row = mysqli_fetch_assoc($query)) {

                                 echo "{$row['smalldesc']} <br><br>";
                              
                                 echo "<a href='blogsingle.php?ID={$row['id']}'  
                                 class='btn btn-primary py-2 px-3'>Read more</a></p>";
                            
                            ?>
                
                  </div>
                </div>
              </div>
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blogsingle.php" class="block-20" style="background-image: url('../images/lacto-veg.png');">
                  </a>
                  <div class="text d-block pl-md-4">
                   
                    <h3 class="heading"><a href="#">Vegan</a></h3>
                   <!--  <p><?php //echo $read1 ?></p>
                    <p><a href="blogsingle.php" class="btn btn-primary py-2 px-3">Read more</a></p>
 -->
                     <?php
                            
                               while($row = mysqli_fetch_assoc($query)) {

                                 echo "{$row['smalldesc']} <br><br>";
                              
                                 echo "<a href='blogsingle.php?ID={$row['id']}'  
                                 class='btn btn-primary py-2 px-3'>Read more</a></p>";
                            
                            ?>

                  </div>
                </div>
              </div>
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blogsingle.php" class="block-20" style="background-image: url('../images/vegan.jpg');">
                  </a>
                  <div class="text d-block pl-md-4">
                   
                    <h3 class="heading"><a href="#">Ovo Vegetarian</a></h3>
                    <!-- <p><?php //echo $read1 ?></p>
                    <p><a href="blogsingle.php" class="btn btn-primary py-2 px-3">Read more</a></p>
 -->
                       <?php
                            
                               while($row = mysqli_fetch_assoc($query)) {

                                 echo "{$row['smalldesc']} <br><br>";
                              
                                 echo "<a href='blogsingle.php?ID={$row['id']}'  
                                 class='btn btn-primary py-2 px-3'>Read more</a></p>";
                            
                            ?>
                  </div>
                </div>
              </div>
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex">
                  <a href="blogsingle.php" class="block-20" style="background-image: url('../images/vegan.jpg');">
                  </a>
                  <div class="text d-block pl-md-4">
                   
                    <h3 class="heading"><a href="#">Lacto Vegetarian</a></h3>
                   <!--  <p><?php// echo $read1 ?></p>
                    <p><a href="blogsingle.php" class="btn btn-primary py-2 px-3">Read more</a></p>

 -->

                      <?php
                            
                               while($row = mysqli_fetch_assoc($query)) {

                                 echo "{$row['smalldesc']} <br><br>";
                              
                                 echo "<a href='blogsingle.php?ID={$row['id']}'  
                                 class='btn btn-primary py-2 px-3'>Read more</a></p>";
                               }
                            
                            ?>
                  </div>
                </div>
              </div>

            
            </div>
          </div> <!-- .col-md-8 -->
<?php
}}}
?>



          <div class="col-lg-4 sidebar ftco-animate">
          
            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                <li><a href="#">Vegetarian <span>(12)</span></a></li>
                <li><a href="#">Vegan <span>(22)</span></a></li>
                <li><a href="#">Lacto Veg <span>(37)</span></a></li>
                <li><a href="#"> Ovo Veg <span>(42)</span></a></li>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Recent Blog</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/Ramen-Noodle.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/quino-burger.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/special-manchurian-chili.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/special-manchurian-chili.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>

            
            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Lean More</h3>
              <p><?php 
                 while($row = mysqli_fetch_assoc($query)) {

                                 echo "{$row['Para']}";
                            }
                             ?></p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->
  <?php  }  ?>

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">

        <div class="row d-flex justify-content-center py-5">

          <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
            <span>Get E-mail updates when a new recipe is added! </span>
          </div>

          <div class="col-md-6 d-flex align-items-center">

            <form action="#" class="subscribe-form" >
              <div class="form-group d-flex">
                 <span class="input-group-text regis-text" id="emailid">
               <i class="fa fa-envelope"></i>
             </span>
                <input type="email" id="subEmail" class="form-control" placeholder="Enter email address" aria-label="Recipient's username" aria-describedby="button-addon2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" required>
                <input type="submit" onclick="subscribe()" value="Subscribe" id="button-addon2" class="submit px-3">
              </div>
            </form>

          </div>

        </div>

      </div>
    </section>





  <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row">
         <div class="mouse">
           <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
          </a>
        </div>
      </div>
        
       <div class="row py-2">

       <div class="col-md-4 pb-2">
        <h3>About 30MinRecipes</h3><br>
        <p>This is an open source website which provides healthy, quick and luscious recipes, which can be viewed and made by anyone around the world with much more functionality such as creating a menu, collections, save recipes, rate them join the newsletter group and much more!.</p>
       </div>

       <div class="col-md-4 pb-2">
        <h3>Navigation Links</h3><br>
        <ul style="list-style-type: none;">
            <h5><a href="#">Home</a></h5>
            <h5><a href="#">Meals</a></h5>
            <h5><a href="#">About</a></h5>
            <h5><a href="#">Feedbacks</a></h5>

        </ul>
       </div>

       <div class="col-md-4 pb-2">
        <h3>Contact Us</h3><br>
        <ul style="list-style-type: none;">
            <h5><i class="fa fa-phone"></i> <a href="#">9123456789</a></h5>
            <h5><i class="fa fa-phone"></i> <a href="#">9876543210</a></h5>
            <h5><i class="fa fa-phone"></i> <a href="#">7418529630</a></h5>
        </ul>
      </div>
      </div>
          </div>
        </div>
      </div>
  </footer>
    
 
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>-
  <script src="../js/google-map.js"></script>-->
  <script src="../js/main.js"></script>
    
</body>
</html>