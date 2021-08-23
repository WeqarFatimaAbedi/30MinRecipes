<?php
 session_start();
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
</head>

<body>

<div id="loginSection">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 p-0">
                <?php include('navbar.php') ?>
            </div>
        </div>
        <br><br><br>
        
        <div class="row pt-4">
            <div class="col-md-12 text-center">
                <h1>Login</h1>
            </div>
        </div>

        <div class="container col-md-6">
            <hr>
            
       </div>

        <div class="row py-4">
            <div class="col-md-3 p-0 m-0"></div>
            <div class="col-md-6">
                <form>     
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <input type="email" autocomplete="off" id="id" class="form-control"  placeholder="Email ID or Mobile ">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="password" id="pass" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="button" onclick="loginFun()" class="btn btn-success btn-block" >Login</button> 
                    </div>
                     <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;<label>Show Password</label>

              <div class="form-group">
                  <!--<input type="checkbox" name="Rememberme" >&nbsp;&nbsp;Remember me
                  <a class="reset" href="Changepassword.php">Change password?</a>

               </div>-->

                
                <p class="text-center">Dont have an account? Click here to <a href="register.php">Register.</a>
                    <br>
                    <a href="Forgotpassword.php" class="text-center">Forgot your password?</a>
                </p>

                </form>
            </div>
            <div class="col-md-3 p-0 m-0"></div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
    getNavLinks();
}); 

 function myFunction() {
  var x = document.getElementById("pass");

  if (x.type === "password") {
    x.type = "text";
   
  } else {
    x.type = "password";
   
  }
}
function getNavLinks(){
        $.ajax({
            url : '../resources/api/navlink.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1,
            }),
            success : function(data){
                if(data==0){
                    $("#rightNav").html(
                        '<ul class="navbar-nav">'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="login.php"><i class="fa fa-user-circle"></i> Log In</a>'+
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
                                '<a class="nav-link" href="save.php"><i class="fa fa-star"></i> Saved <span class="badge badge-pill badge-success">'+saved+'</span></a>'+
                            '</li>'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-pill badge-danger">'+cart+'</span></a>'+
                            '</li>'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="logout.php"><i class="fa fa-user-circle"></i> Log out</a>'+
                            '</li>'+
                        '</ul>'
                    );
                }
            }
        });
    }

    function loginFun(){
        var id = $("#id").val();
        var pass = $("#pass").val();

        if(id=='' || pass==''){
            swal({
                        title: "Blank fields!",
                        text: "All fields are required!",
                        icon: "warning",
                        button: "OK!",
                    });
        }
        else{
            $.ajax({
            url : '../resources/api/user.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 2,
                id : id,
                pass : pass,
            }),
            success : function(data){
                if(data==0){
                    swal({
                            title: "Invalid Credentials!",
                            text: "Email ID or Password is wrong!",
                            icon: "error",
                            button: "OK!",
                    });
                }
                else{
                    window.location = '../';
                }
            }
            
        });
        }

    }

    

 
</script>

</body>

</html>