<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <title>Sign Up - 30MinRecipes</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
</head>
 <body>

   <!--Registration/join code begins here-->
   <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
            <img src="../images/logo.png" class="img-fluid">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto text-center">
        <li class="nav-item active">
            <a class="nav-link" href="../">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Recipes</a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Recipe 1</a>
            <a class="dropdown-item" href="#">Recipe 2</a>
            <a class="dropdown-item" href="#">Recipe 3</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Special</a>
            </div>
            </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Aboutus</a>
        </li>
        </ul>
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="routes/login.php"><i class="fa fa-user-circle"></i> Log In</a>
        </li>
        </ul>
    </div>
    </nav>


     <article class="mx-auto" style="max-width: 400px;">
      <h1 class="mt-3 text-center">Create Account</h1>
      <p class="text-center"> Get started with your free account</p>
      <form id="form" spellcheck="false">
          <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text regis-text" id="namespan" >
               <i class="fa fa-user"></i>
             </span>
           </div>
           <input type="text" id="name" class="form-control" placeholder="Enter full name" autocomplete="off" required>
         </div>  <!--username form group ends here-->

         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text regis-text" id="emailspan">
               <i class="fa fa-envelope"></i>
             </span>
           </div>
           <input type="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter email " autocomplete="off" required>
         </div><!--email form group-->

            <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text regis-text" id="mobilespan">
               <i class="fa fa-phone"></i>
             </span>
           </div>
           <input type="text" id="mobile"  class="form-control" placeholder="Enter mobile " pattern="^\d{10}$" autocomplete="off" required>
         </div><!--email form group-->

         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text regis-text" id="passspan">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input type="password" id="pass" placeholder="Enter password" class="form-control" autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  <!--<i class="fa fa-eye"></i>
           <i class="fa fa-eye-slash"></i>-->
         </div><!--password form group-->
        

         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text regis-text" id="cpassspan">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input id="cpass" type="password" required placeholder="Re-enter password" class="form-control" autocomplete="off">
         </div><!--Re-password form group-->

          <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;<label>Show Password</label>


         <div class="form-group">
           <input type="submit" onclick="regFun()" class="btn btn-success btn-block" >
         </div><!--submit form group-->

         <p class="text-center">Already a member? Click here to <a href="login.php">Sign in.</a> </p>
       </form>
     </article>
   </div>

    <script>
  

        function regFun(){
            var name = $("#name").val();
            var email = $("#email").val();
            var mobile = $("#mobile").val();
            var pass = $("#pass").val();
            var cpass = $("#cpass").val();

                if(name=='' || pass=='' || email=='' || cpass=='' || mobile==''){
                  /* swal({
                        title: "Blank fields!",
                        text: "All fields are required!",
                        icon: "warning",
                        button: "OK!",
                    });*/
                }
                else{
                    if(pass==cpass){
                        $.ajax({
                            url : '../resources/api/user.php',
                            type : 'POST',
                            dataType : 'json',
                            contentType : 'application/json',
                            data : JSON.stringify({
                                call : 1,
                                name : name,
                                pass : pass,
                                email : email,
                                mobile : mobile
                            }),
                            success : function(data){
                                if(data==0){
                                    swal({
                                            title: "Some error occured!",
                                            text: "There is some error occured!",
                                            icon: "error",
                                            button: "OK!",
                                    });
                                }
                                else if(data==2){
                                    swal({
                                            title: "User already exists!",
                                            text: "Email / Mobile is already taken!",
                                            icon: "info",
                                            button: "OK!",
                                    });
                                }
                                else{
                                    swal({
                                            title: "Welcome "+name+"!",
                                            text: "You're registered on 30minrecipes!",
                                            icon: "success",
                                            button: "OK!",
                                    }).then((ok)=>{
                            if(ok){
                                //location.reload();
                                window.location ='login.php';
                            }
                        }); 
                                    //window.location='login.php';
                                }
                               
                            }
                            
                        });
                    }
                    else{
                        alert('Password and confirm password does not match!');
                    }
                }
          }
        
           function myFunction() {
  var x = document.getElementById("pass");
  var y = document.getElementById("cpass");
  if (x.type === "password" && y.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}
    
    </script>
    
      </body>
</html>