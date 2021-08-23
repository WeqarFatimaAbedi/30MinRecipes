
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
      <h1 class="mt-3 text-center">Recover Account</h1>
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

       <div class="form-group">
         <button type="button" onclick="changepass()" class="btn btn-success btn-block" >Send Email</button> 
       </div>

       <p class="text-center">Click here to <a href="login.php">sign in.</a> </p>
     </form>
   </article>
 </div>


<script>
  function changepass(){
    var id = $("#email").val();
    

    if(id==''){
      swal({
                        title: "Blank field!",
                        text: "Your Email is required!",
                        icon: "warning",
                        button: "OK!",
                    });
    }
    else{
      $.ajax({
        url:  '../resources/api/user1.php',
        type: 'POST',
        dataType: 'json',
        contentType: 'application/json',
        data: JSON.stringify({
          call: 1,
          id: id,
          
        }),
        success: function(data){
            if(data==0){
                    swal({
                            title: "Invalid Credentials!",
                            text: "Email ID is invalid!",
                            icon: "error",
                            button: "OK!",
                    });
                }
                  else{
                         swal({
                            title: "Check Email!",
                            text: "Please check your Email ID!",
                            icon: "success",
                            button: "OK!",
                    });
                           window.location = 'login.php';
                                  
                      }
        }
      });
    }
    }

</script>
</body>
</html>