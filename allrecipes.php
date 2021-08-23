<?php
include('api/connect.php');
 session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <title>Dashboard - 30MinRecipes</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>


     <style>
 body {
  font-family: "Lato", sans-serif;}

 .sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 100px;
 }

 .sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
 }

 .sidebar a:hover {
  color: #f1f1f1;
 }

 .main {
   margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
 }

 @media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
 }
 </style>
</head>

<body>



<div id="headerSection">
     <div class="container" >
        <div class="row align-items-center">

            <nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
                      <a class="navbar-brand" href="#">
                      <img src="../images/logo.png" class="img-fluid">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mr-auto text-center">

                        
                      </ul>
                  

                          <div id="rightNav">

                         <h5> <i><i class="fa fa-user-circle"></i>
                          <?php echo $_SESSION['name']; ?>
                          </i></h5>
                     </div>
                 </div>
                 </nav>

         
        </div>
    </div> 
</div>


<div class="container-fluid" style="margin-top:70px;">
  <div class="row"> 
    <nav class="col-sm-12 bg-light sidebar py-5">
      <div class="sidebar">
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
    </div>
    </nav>
</div>
</div>

<br>

<div class="container-fluid">
  <h2 class="text-center text-white bg-dark" style="margin-left: 160px; ">All recipes</h2>
   <div id="productList" style="margin-left: 150px; "></div>      <!--     ID==PRODUCTLIST     -->
</div>



<script>
getProducts();

function getProducts(){
        $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1
            }),
            success : function(data){
                var sr = 1;                       //the serial number 1,2,3....
                var getProducts = '';             //containes html table.
                if(data==0){
                   $("#productList").html('<p>No products are available right now.</p>');
                }
                else{
                    $.each(data, function(i, d){
                        getProducts+=   
                            '<tr>'+


                                '<th scope="row">'+sr+'</th>'+
                                '<td colspan="2">'+d.title+'</td>'+
                                '<td colspan="2">'+d.name+'</td>'+

                                '<td col="2"><button type="button" onclick="openRecipe('+d.r_id+')" class="btn btn-econdary btn-outline-success editbtn">View</button></td>'+
                                

                                '<td col="2"><button class="btn btn-econdary btn-outline-danger" onclick="conFirm('+d.r_id+')">Remove</button></td>'+
                                
                                
                            '</tr>';
                            sr++;
                    });

                    $("#productList").html(  
                       '<div class="table-responsive-md d-flex" style="background-color:white">'+
                       '<table class="table table-hover">'+
                            '<thead>'+
                                '<tr>'+
                                '<th scope="col">Sr.No</th>'+
                                '<th colspan="2">Recipe Name</th>'+
                                '<th colspan="2">Recipe Category</th>'+
                              
                                '<th colspan="2">Select Operation</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            getProducts+
                            '</tbody>'+
                        '</table></div>'
                        );
                }      //else closing tag
            }
            
        });     //success function closing tag
    }


    // Confirm 
    function conFirm(id){
        var id = id;
        swal({
            title: 'Are you sure?',
            text: "Confirm if you want to delete this recipe!",
            icon: "warning",
            buttons: ['Cancel', 'Confirm'],
            dangerMode: true,
            })
            .then((ok) => {
            if (ok) {
                deleteProduct(id);
            } else {
                swal("Think again!");
            }
        });
    }


    // Delete Product
    function deleteProduct(id){
        $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 0,
                id : id
            }),
            success : function(data){
                if(data==1){
                    getProducts();
                    swal({
                        title: 'Recipe Removed!',
                        text: "Recipe successfully removed!",
                        icon: "success",
                        }); 
                }

            }
        });
    }

    function conFirmEdit(id){
      var id=id;

      $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call :2 ,
                id : id,
            }),
            success : function(data){
                if(data==0){
                    swal({
                        title: 'Not found!',
                        text: "Recipe not found!",
                        icon: "danger",
                        }); 
                }
                //else{
                  //window.location='dashboard.php';
                 
                 
               // }

            }
        });

    }

        function openRecipe(id){
        var id = id;
        $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 5,
                id : id
            }),
            success : function(data){
                if(data==1){
                    window.location = '../routes/recipe.php';
                }
            }
            
        });
    }


 /*  function editrecipes(id){
    var id=id;
     $.ajax({

      url:'api/product.php',
      method:'POST',
       dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
            call : 4,
            id : id
            }),
      success: function(data){
        console.log(data);
        $('#title').val(data.name);
          $('#ing').val(data.ing);
          $('#steps').val(data.steps);
          $('#desc').val(data.desc);
          $('#cat').val(data.cat);
          $('#serv').val(data.serv);
          $('#time').val(data.time);
          $('#img').val(data.img);
        $('#editmodal').modal('show');
      }

   });
   }
*/
 




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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js">
  </script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>

</body>
</html>