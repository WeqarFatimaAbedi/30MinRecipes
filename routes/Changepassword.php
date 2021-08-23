
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
          
        <h1 class="mt-3 text-center">Change password</h1>
          <p class="text-center">Please enter your valid email id</p>
  
       <form>     <!--important code-->
       


 <div class=" form-group input-group">
         <div class="input-group-prepend">
           <span class="input-group-text">
             <i class="fa fa-envelope"></i>
           </span>
         </div>
         <input  type="email" name="email"  id="email" class="form-control" placeholder="Enter Email ID or Mobile" autocomplete="off" required>
       </div>

<div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input type="password"  name="password" id="pass" placeholder="New Password" class="form-control" value="" required autocomplete="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">  
         </div><!--password form group-->

         <div class="form-group input-group">
           <div class="input-group-prepend">
             <span class="input-group-text">
               <i class="fa fa-lock"></i>
             </span>
           </div>
           <input type="password" name="cpassword" id="cpass" placeholder="Confirm Password" class="form-control" value="" required autocomplete="off">
         </div><!--Re-password form group-->

           <input type="checkbox" id="showpass" onclick="myFunction()">&nbsp;<label>Show Password</label>


          <div class="form-group">
           <button type="button" onclick="changepassword()" class="btn btn-success btn-block" >Update Password</button> 
         </div>

         <!--submit form group-->

         <p class="text-center">Click here to <a href="login.php">sign in.</a> </p>
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
  function changepassword()
  {
    var email = $("#email").val();
     var pass = $("#pass").val();
     var cpass = $("#cpass").val();

    if(email=='' || pass=='' || cpass=='')
    {
      swal({
                        title: "Blank field!",
                        text: "Your Data is required!",
                        icon: "warning",
                        button: "OK!",
          });
    }
    else
    {
       if(pass==cpass)
       {

        $.ajax({
        url:  '../resources/api/user.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
          call: 4,
          email:email,
          pass: pass,
          
                            }),
        success: function(data)
        {
            if(data==0)
            {
                    swal({
                            title: "Invalid Credentials!",
                            text: "Email not found!",
                            icon: "error",
                            button: "OK!",
                       });
            }
            else
            {
                    swal({
                            title: "Done!",
                            text: "Successfully password updated!",
                            icon: "success",
                            button: "OK!",
                        });
                    $("#email").val('');
                    $("#pass").val('');
                    $("#cpass").val('');
                    
                    
              }
              //window.location = 'login.php';
        }


      });
    }
    else
    {
      alert("Passwords are not matching");
    }
  }
}

</script>
</body>
</html>