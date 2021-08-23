
<?php
   
    include('../resources/api/connect.php');
     $msg="";
    if(isset($_POST['submit'])){
      
      $name= mysqli_escape_string($con, $_POST['name']);
      $email= mysqli_escape_string($con, $_POST['email']);
      $about= mysqli_escape_string($con, $_POST['about']);
      $message= mysqli_escape_string($con, $_POST['message']);

      $query = mysqli_query($con, "insert into contactus (name,email,about,message) values('$name', '$email','$about','$message') ");
      $msg = "Done";

      $html="<table>
      <tr><td>Name    :</td><td>$name</td></tr>
      <tr><td>Email   :</td><td>$email</td></tr>
      <tr><td>Abous   :</td><td>$about</td></tr>
      <tr><td>Message :</td><td>$message</td></tr>
      </table>" ;

      include('../phpGmailSMTP/smtp/PHPMailerAutoload.php');
      $mail = new PHPMailer(true);
      //$mail->isSMTP();
      $mail->HOST="smtp.gmail.com";
      $mail->Port =587;
      $mail->SMTPSecure="tls";
      $mail->SMTPAuth=true;
      $mail->Username="30minrecipesty@gmail.com";
      $mail->Password="aswchickvicky2000";
      $mail->SetFrom($email);
      $mail->addAddress("30MinRecipesty@gmail.com");
      $mail->IsHTML(true);
      $mail->Subject =$about;
      $mail->Body=$html;
      $mail->SMTPOptions=array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
      ));
      if($mail->send()){
      echo "Message sent";
      }else{
       // echo "error";
      }

    }

    $query = mysqli_query($con,"select * from aboutus");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>single-recipe details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <link rel="stylesheet" href="../css/magnific-popup.css">

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
                                 <a class="dropdown-item" href=routes/vege.php>Vegetarian</a>
                                 <a class="dropdown-item" href="routes/veg.php">Vegan</a>
                                 <a class="dropdown-item" href="routes/lacto.php">Lacto Veg</a>
                                 <a class="dropdown-item" href="routes/ovo.php">Ovo Veg</a>
                             </div>
                         </li>
                         <li class="nav-item active">
                              <a class="nav-link" href="routes/menu.php">Menu</a>
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
    
    
     </div>

  <hr>

<?php
        

       if(isset($_GET['ID'])){
      $ID = mysqli_real_escape_string($con, $_GET['ID']);
      $sql = "SELECT * FROM  aboutus where id ='$ID' ";
     

      $result = mysqli_query($con, $sql) or die("Bad query: $sql");


      while($row = mysqli_fetch_array($result)){

        $name= $row['name'];
      $largedesc= $row['largedesc'];


      ?>

      <?php 
      }}
      ?>
   



    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ftco-animate">
						<h2 class="mb-3"><?php echo $name  ?></h2>
            <p><?php   echo $largedesc   ?></p>
            <p>
              <img src="../images/category-1.jpg" alt="" class="img-fluid">
            </p>
            <p><?php   echo $largedesc   ?></p>
            
          
            <hr>

            <div class="pt-3 mt-5">
          
              <div class="comment-form-wrap pt-5">

                <h3 class="mb-5">Send a Mail</h3>

                <form method="post">
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" autocomplete="off" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email" autocomplete="off" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                  </div>
                  <div class="form-group">
                    <label for="about">About</label>
                    <input type="text" class="form-control" id="about" autocomplete="off" name="about" required>
                  </div>

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea  id="message" cols="30" rows="10" autocomplete="off" name="message" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit"  name="submit" class="btn py-3 px-4 btn-primary">Send Mail</button>
                  <span style="color:red;"><?php echo $msg  ?></span>
                  </div>
                  

                </form>
              </div>
            </div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate">


            
            <div class="sidebar-box ftco-animate">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                <li><a href="veg.php">Vegetarian </a></li>
                <li><a href="vege.php">Vegan </a></li>
                <li><a href="lacto.php">Lacto Veg </a></li>
                <li><a href="ovo.php"> Ovo Veg </a></li>
              </ul>
            </div>


    <div class="sidebar-box ftco-animate">
              <h3 class="heading">Recent Recipes Added</h3>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/Ramen-Noodle.jpg);"></a>
                <div class="text">

                  <h3 class="heading-1"><?php  //echo "{$row['title']}" ?><br><?php  //echo "{$row['description']}" ?></a></h3>

                  <div class="meta">
                    <div><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/quino-burger.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><?php  //echo $title ?><br><?php // echo $desc ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/special-manchurian-chili.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><?php  //echo $title ?><br><?php  //echo $desc ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(../images/special-manchurian-chili.jpg);"></a>
                <div class="text">
                  <h3 class="heading-1"><?php  //echo $title ?><br><?php  //echo $desc ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> April 09, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    
                  </div>
                </div>
              </div>
            </div>

          
          </div>

        </div>
      </div>
    </section> <!-- .section -->



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
                <input type="email" id="subEmail" class="form-control" placeholder="Enter email address" aria-label="Recipient's username" aria-describedby="button-addon2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" size="30" autocomplete="off" required>
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
 
   <script>
 
   </script>


















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
    
    
  </body>
</html>