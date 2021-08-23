<?php
 session_start();     //admin session starts
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <title>Admin - 30MinRecipes</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<div id="headerSection" class="sticky-top">
    <div class="container" >
        <div class="row">
            <div class="col-md-12 text-center py-2">
                <!-- <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" id="brand" href="#">My Store</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-danger" id="count" style="padding:8px; font-size:15px; border-radius:15px"></span></a>
                            </li>
                           
                        </ul>
                    </div>
                </nav> -->
                <a class="navbar-brand" size="100" id="brand"><b>30 MIN RECIPES</a></b>
            </div>
        </div>
    </div>
</div>

<div id="bodySection">
    <div class="container">
        <div class="row py-4">
            <!-- <div class="col-md-7 text-center">
                <h3 id="groups">Groups</h3><br>
                <div id="groupsList"></div>
            </div> -->
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h3 id="groups">Admin Login</h3><br>
                <div id="adminSection" class="text-center p-5">
                    <form>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12 px-4">
                           <input type="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Admin email " autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-row py-1">
                            <div class="form-group col-md-12 px-4">
                            <input id="pass" type="password" class="form-control" autocomplete="off" placeholder="Password">
                            </div>
                        </div>

                         <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;<label>Show Password</label>
              
                        <div class="form-row py-1">
                            <div class="form-group col-md-12 px-4">
                            <input type="button" onclick="loginFun()" id="loginbtn" class="form-control btn btn-success" value="Login">    
                            </div>
                        </div>
                        <p class="text-center">Forgot your password? <a href="admin_reg.php">Click Here.</a> </p>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row py-1" id="pArea">
        </div>
    </div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("pass");

  if (x.type === "password") {
    x.type = "text";
   
  } else {
    x.type = "password";
   
  }
}

    function loginFun(){
        var id = $("#email").val();      //id is id the of the field
        var pass = $("#pass").val();   //pass is password of the field admin

        if(id=='' || pass==''){
            alert('Fields cannot be blank!');
        }
        else{
            $.ajax({
            url : 'api/login.php',   //goes to login.php and json code is run 
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1,             //if call==1 :-it is for the login of admin
                id : id,               //id is passed with the name id
                pass : pass,           //password is passed with the name pass
            }),
            success : function(data){    //if the loginfun() is successfull
                if(data==0){              //the given info is incorrect
                    swal({                  //pop up 
                            title: "Invalid Credentials!",
                            text: "ID or Password is invalid!",
                            icon: "error",
                            button: "OK!",
                    });
                }
                else{
                   window.location = 'admindash.php';   //if credentials correct it goes to dashboard.php
                }
            }
            
        });
        }

    }

 
</script>

</body>

</html>