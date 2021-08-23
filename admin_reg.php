


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

  <!--Registration/join code begins here-->
   <div class="container-fluid p-0" >
     <article class="mx-auto" style="max-width: 400px;">
          
          <h1 class="mt-3 text-center">Reset password</h1>
          <p class="text-center">Please enter your valid email id</p>
  
         <form>     <!--important code-->
       
     

       <div class=" form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-envelope"></i>
             </span>
           </div>
           
           <input  type="email" name="email"  id="email" class="form-control" placeholder="Enter Email ID or Mobile" autocomplete="off">
         </div>
         <!--email form group-->
         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input type="password"  name="password" id="pass" placeholder="New Password" class="form-control" value="" required autocomplete="off">  
         </div><!--password form group-->

         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input type="password"  name="cpassword" id="cpass" placeholder="Confirm Password" class="form-control" value="" required autocomplete="off">  
         </div>
         <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;<label>Show Password</label>
           
         <div class="form-group">
           <button type="button" onclick="updatepass()" class="btn btn-success btn-block" >Update Password</button> 
         </div>

         <!--submit form group-->

         <p class="text-center">Click here to <a href="admin.php">sign in.</a> </p>
       </form>
    


</div>
</article>
</div>


<script>
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
    function updatepass(){
        var email = $("#email").val();
        var pass = $("#pass").val();
        var cpass = $("#cpass").val();

        if(email==''){
            swal({
                        title: "Blank fields!",
                        text: "All fields are required!",
                        icon: "warning",
                        button: "OK!",
                    });
        }
        else{
            if(cpass==pass){
            $.ajax({
                url:  'api/login.php',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    call: 2,
                    id: email,
                    pass: pass,
                }),
                success: function(data){
                      if(data==0){
                    swal({
                            title: "Invalid Credentials!",
                            text: "ID or Password is invalid!",
                            icon: "error",
                            button: "OK!",
                    });
                }
                  else{
                              swal({
                                            title: "Success!",
                                            text: "Successfully password updated!",
                                            icon: "success",
                                            button: "OK!",
                                    });
                              //window.location = 'admin_fp.php';
                                   $("#email").val('');
                                   $("#pass").val('');
                                   $("#cpass").val('');
                                }
                }


            });
        }
        else{
          swal({
                                            title: "Error!",
                                            text: "Passwords not matching !",
                                            icon: "error",
                                            button: "OK!",
                                    });
        }
        }
}

</script>
</body>
</html>