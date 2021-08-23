<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/styles.css">
    <script src="resources/Jquery/jquery-3.5.1.js"></script>
    <script src="resources/Bootstrap/js/bootstrap.min.js"></script>
    <script src="resources/js/sweetalert.min.js"></script>
    


    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">
</head>

<body>

  <div class="container-fluid">
    <hr>
         <div class="row align-items-center">
             <div class="col-md-12 p-0">

             <!---------------NAVBAR------------>
               <nav class="navbar fixed-top navbar-expand-lg bg-white navbar-light">
                      <a class="navbar-brand" href="#">
                      <img src="images/logo.png" class="img-fluid">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mr-auto text-center">
                         <li class="nav-item active">
                             <a class="nav-link" href="index.php">Home</a>
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
                              <a class="nav-link" href="routes/about_us.php">About Us</a>
                         </li>
                         
                     </ul>
                     <div id="rightNav">
                         
                     </div>
                 </div>
            </nav>

             </div>
         </div>

         <br><br>
        

        <!-------CAROUSAL-------->
        <div class="row">
            <div class="col-md-12 p-0">
                <?php include('routes/carousal.php')?>
            </div>
        </div>


        <!------DISPLAY THE SEARCHED RECIPES HERE-->
        <div id="searchSection"></div>

        <!------CATEGORIES--------->
        <div class="row pt-5 pb-3">
            <div class="col-md-12 text-center">
                <hr><h2>Top 4 Recipe Categories</h2><hr>
            </div>
        </div>

    
        <div class="row py-3">
            <div class="col-md-6 py-2 text-center">
                <h3 class="py-2">Vegetarian</h3>
                <img style="border-radius:15px" src="images/vegetarian-tikka-masala.jpg" height="400" width="450"><br><br>
                <a href="routes/vege.php" style="border-radius:15px; width:200px" type="button" class="btn btn-lg btn-primary form-control"><h5> View Recipes</h5></a>
            </div>

            <div class="col-md-6 py-2 text-center">
                <h3 class="py-2">Vegan</h3>
                <img style="border-radius:15px" src="images/vegan-chocolate-cheescake.jpg" height="400" width="450"><br><br>
                <a href="routes/veg.php" style="border-radius:15px; width:200px" type="button" class="btn btn-lg btn-primary form-control"><h5> View Recipes</h5></a>
            </div>
        </div>
    
        <hr>

        <div class="row py-2">
            <div class="col-md-6 py-2 text-center">
                <h3 class="py-2">Lacto Veg</h3>
                <img style="border-radius:15px" src="images/Asian-Stir-Fry-Noodles-3.jpg" height="400" width="450"><br><br>
                <a href="routes/lacto.php" style="border-radius:15px; width:200px" type="button" class="btn btn-lg btn-primary form-control"><h5> View Recipes</h5></a>
            </div>
            <div class="col-md-6 py-2 text-center">
                <h3 class="py-2">Ovo Veg</h3>
                <img style="border-radius:15px" src="images/vegetable-pulav-recipe.jpg" height="400" width="450"><br><br>
                <a href="routes/ovo.php" style="border-radius:15px; width:200px" type="button" class="btn btn-lg btn-primary form-control"><h5> View Recipes</h5></a>
            </div>
        </div>
        <hr>
        

         <section class="ftco-section">
            <div class="container">
                <div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                    <span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Delicious</h3>
                <span>Search Various Options</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                    <span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Free</h3>
                <span>Login Or Register</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                    <span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Super Easy</h3>
                 <span>Anyone can Make</span>

              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                    <span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">30 Mins</h3>
                <span>Fast Prep</span>
              </div>
            </div>      
          </div>
        </div>
            </div>
        </section>

        <section class="ftco-section ftco-category ftco-no-pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-6 order-md-last align-items-stretch d-flex">
                                <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
                                    <div class="text text-center">
                                        <h2>Categories</h2>
                                        <p> Get healthy and easy recipes updates for free</p>
                                        
                                        <p><a href="#subscribenews" class="btn btn-primary">Subscribe</a></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-1.jpg);">
                                    <div class="text px-3 py-1">
                                        <h2 class="mb-0"><a href="routes/vege.php">Vegtarian</a></h2>
                                    </div>
                                </div>
                                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/vegan.jpg);">
                                    <div class="text px-3 py-1">
                                        <h2 class="mb-0"><a href="routes/veg.php">Vegan</a></h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/lacto-veg.png);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="routes/lacto.php">Lacto Veg</a></h2>
                            </div>      
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/ovo-vegan.jpeg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="routes/ovo.php">Ovo Vegan</a></h2>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <hr>
        <hr>

    <section class="ftco-section">
        <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading">Featured Recipes</span>
            <h2 class="mb-4">Our Recipes</h2>
            <p>Very Easy, Lucious and quickly prepared within no time </p>
          </div>
        </div>          
        </div>



        <div class="container">
            <div class="row">

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/vege.php" class="img-prod">
                          
                          <img class="img-fluid" src="images/product-1.jpg" alt="Colorlib Template">
                            <span class="status">Veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/vege.php">Veg Friedrice</a></h3>
                        
                            <div class="bottom-area d-flex px-3">
                              <!--   <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/veg.php" class="img-prod"><img class="img-fluid" src="images/product-2.jpg" alt="Colorlib Template">
                             <span class="status">Vegan</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/veg.php">Strawberry</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/ovo.php" class="img-prod"><img class="img-fluid" src="images/product-3.jpg" alt="Colorlib Template">
                             <span class="status">Ovo veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/ovo.php">Green Beans</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/lacto.php" class="img-prod"><img class="img-fluid" src="images/product-4.jpg" alt="Colorlib Template">
                             <span class="status">Lacto Veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/lacto.php">Purple Cabbage</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="images/product-5.jpg" alt="Colorlib Template">
                            <span class="status">Ovo Veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/ovo.php">Tomatoe</a></h3>
                           
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/vege.php" class="img-prod"><img class="img-fluid" src="images/product-6.jpg" alt="Colorlib Template">
                             <span class="status">Veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/vege.php">Brocolli</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/veg.php" class="img-prod"><img class="img-fluid" src="images/product-7.jpg" alt="Colorlib Template">
                             <span class="status">Vegan</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/veg.php">Carrots</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="routes/lacto.php" class="img-prod"><img class="img-fluid" src="images/product-8.jpg" alt="Colorlib Template">
                             <span class="status">Lacto Veg</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="routes/lacto.php">Fruit Juice</a></h3>
                          
                           <!--  <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section>


        <!-----------SUBSCRIPTIONS--------->
        <div class="row py-2" id="subscribenews">
            <div class="col-md-12">
                <?php include('routes/newsletter.php')?>
            </div>
        </div>
        <hr>



        <!-----FOOTER------->
        <?php include('routes/footer.php') ?>
        
    </div>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <!----BUTTON SCROLL UP-------->
  <script>
      const btnscroll = document.querySelector("#btnscroll");
      btnscroll.addEventListener("click",function(){
        $("html, body").animate({scrollTop:0}, "slow");
      });
   </script>
    

    <!--passing JSON data to server side usig JQuery AJAX-->
<script>


  
    $(document).ready(function(){
        getNavLinks();                    //function for the navlinks
    });


    //SUBSCRIPTION
    function subscribe(){                   //from newsletter.php "onclick"
        var email = $("#subEmail").val();
        if(email==''){
            alert('blank field!');
        }
        else{
            $.ajax({
            url : 'resources/api/subscribe.php',
            type : 'POST',                        //passing data through POST request
            dataType : 'json',                    //json data is passed, but it has to be converted in a string 
            contentType : 'application/json',     //format before going to the surver side
            data : JSON.stringify({               //converting json data in a string frmat
                call : 1,                         //json data objects, passed to the server side with post request
                email : email
            }),
            success : function(data){
                if(data==0){
                    swal({
                            title: "Already subscribed!",
                            text: "You are already member!",
                            icon: "info",
                            button: "OK!",
                        });
                        $("#subEmail").val('');
                }
                else{
                    swal({
                            title: "Thank you!",
                            text: "Thank you for subscription!",
                            icon: "success",
                            button: "OK!",
                        });
                        $("#subEmail").val('');
                }
            }
        }); 
        }
    }

    //navlinks.php
    function getNavLinks(){
        $.ajax({
            url : 'resources/api/navlink.php',        //using the post request to call this file.
            type : 'POST',                           //using a POST request to a PHP file
            dataType : 'json',                      //telling the server that to gonna receive json.
            contentType : 'application/json',       //set the request header to say that this will be json payload.
            data : JSON.stringify({               //convert the object into a json string. 
                call : 1,                         //passing obect into a json string.
            }),
            success : function(data){
                if(data==0){                 
                    $("#rightNav").html(                //Login button on navlink is here.
                        '<ul class="navbar-nav">'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="routes/login.php"><i class="fa fa-user-circle"></i> Log In</a>'+
                            '</li>'+
                        '</ul>'
                    );
                }
                else{
                    var cart = data[0]>0 ? data[0] : '';
                    var saved = data[1]>0 ? data[1] : '';
                    $("#rightNav").html(
                        '<ul class="navbar-nav">'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="routes/save.php"><i class="fa fa-star"></i> Saved <span class="badge badge-pill badge-success">'+saved+'</span></a>'+
                            '</li>'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="routes/cart.php"><i class="fa fa-shopping-cart"></i> Pantry <span class="badge badge-pill badge-danger">'+cart+'</span></a>'+
                            '</li>'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="routes/logout.php"><i class="fa fa-user-circle"></i> Log out</a>'+
                            '</li>'+
                        '</ul>'
                    );
                }
            }
        });
    }

    //recipe.php
    function openRecipe(id){
        var id = id;
        $.ajax({
            url : 'resources/api/recipe.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 2,
                id : id
            }),
            success : function(data){
                if(data==1){
                    window.location = 'routes/recipe.php';
                }
            }
            
        });
    }

    //recipe.php   SEARCHING THE RECIPE
    function searchRecipe(){
        var search = $("#searchItem").val();      //ID OF INPUT TAG
        if(search==''){
          swal({
            title: 'Search Recipe',
            text:'Please write a recipe name!',
            icon: 'info',
            button:'OK',
          });
            //alert('blank field!');
        }
        else{
            $.ajax({
                url : 'resources/api/recipe.php',
                type : 'POST',
                dataType : 'json',
                contentType : 'application/json',
                data : JSON.stringify({
                    call : 7,
                    item : search
                }),
                success : function(data){
                    if(data==0){

                      //SEARCHSECTION IS THE ID OF THE DIV TAG DECLARED ABOVE
                        $("#searchSection").html(
                          '<div class="p-3 mt-3" style="border-radius:20px; border: 1px solid lightgrey">'+
                            '<div class="row py-2">'+
                              '<div class="col-md-12 text-center">'+
                                '<h5>No results found!</h5>'+
                              '</div>'+
                            '</div>'+
                          '</div>');
                    }
                    else{
                        var list = '';
                        $.each(data, function(i, d){
                            i++;
                            list+= 
                             '<div class="row align-items-center">'+

                                //I=THE NUMBERS 
                                '<div class="col-md-2 text-center"><h5>'+i+'</h5></div>'+

                                    //RECIPE TITLE
                                   '<div class="col-md-7">'+
                                      '<h5>'+d.title+'</h5>'+
                                    '</div>'+

                                    //OPEN BUTTON
                                    '<div class="col-md-2">'+
                                       '<button type="button" onclick="openRecipe('+d.r_id+')" class="form-control btn btn-sm btn-uccess btn-outline-primary">Open</button>'+
                                    '</div>'+

                                  '<div class="col-md-1"></div>'+
                            '</div><hr>';
                        });

                        $("#searchSection").html(
                          '<div class="p-3 mt-3" style="border-radius:20px; border: 1px solid lighgrey">'+
                            '<div class="row pt-2 pb-4">'+
                              '<div class="col-md-12 text-center">'+
                                 '<h5 style="color:green">Search results - '+data.length+' items found!</h5>'+
                              '</div>'+
                            '</div>'+
                            list+
                          '</div>'
                          );
                    }
                    
            }
            });
        }
        
    }





</script>
   
   

    <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
</body>
</html>