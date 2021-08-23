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
  
         <form> 
          
           <!--Re-password form group-->
 <div class="form-group">
           <button type="button" onclick="resetpass()" class="btn btn-success btn-block" >Update Password</button> 
         </div>

         <!--submit form group-->

         <p class="text-center">Click here to <a href="admin.php">sign in.</a> </p>
       </form>
    


</div>
</article>
</div>
<script>
    function resetpass(){
        //var email = $("#email").val();
        
        var email = document.getElementById("email").value();
        alert(email)
        var pass = $("#pass").val();
        var cpass = $("#cpass").val();

        if(pass=='' || cpass==''){
            swal({
                        title: "Blank fields!",
                        text: "All fields are required!",
                        icon: "warning",
                        button: "OK!",
                    });
        }
        else{
            if(pass==cpass){
            $.ajax({
                url:  'api/login.php',
                type: 'POST',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                    call: 3,
                    //id: email,
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
                                            title: "Welcome!",
                                            text: "Successfully password updated!",
                                            icon: "success",
                                            button: "OK!",
                                    });
                                   $("#email").val('');
                                   $("#pass").val('');
                                   $("#cpass").val('');
                                }
                }


            });
        }
        }




    }

</script>
</body>
</html>













//this is extra 
    /*function getProducts(){
        $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1
            }),
            success : function(data){
                var sr = 1;
                var getProducts = '';
                if(data==0){
                   $("#productList").html('<p>No products are available right now.</p>');
                }
                else{
                    $.each(data, function(i, d){
                        getProducts+=   
                            '<tr>'+
                                '<th scope="row">'+sr+'</th>'+
                                '<td colspan="2">'+d.name+'</td>'+
                                '<td scope="col">'+d.category+'/-</td>'+
                                '<td scope="col"><button class="btn btn-danger" onclick="conFirm('+d.id+')">Remove</button></td>'+
                            '</tr>';
                            sr++;
                    });

                    $("#productList").html(  
                       '<div class="table-responsive-md" style="background-color:white">'+
                       '<table class="table table-hover">'+
                            '<thead>'+
                                '<tr>'+
                                '<th scope="col">Sr.no.</th>'+
                                '<th colspan="2">Name</th>'+
                                '<th scope="col">Category</th>'+
                                '<th scope="col">Action</th>'+
                                '</tr>'+
                            '</thead>'+
                            '<tbody>'+
                            getProducts+
                            '</tbody>'+
                        '</table></div>'
                        );
                }
            }
            
        });
    }


    // Confirm 
   function conFirm(id){
        var id = id;
        swal({
            title: 'Are you sure?',
            text: "Confirm if you want to delete any product!",
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
                        title: 'Product Removed!',
                        text: "Product successfully removed!",
                        icon: "success",
                        }); 
                }

            }
        });
    }

*/
 /*function addRecipe(){
     var title = $("#tit").val();
     var category = $("#cat").val();

    $.ajax({
      url : '../api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 0,
                title : title,
                category:category,
            }),
            success : function(data){
                if(data==1){
                    //readrecords();
                    window.location = 'admindash.php';
                   // $('#records').html(data);
                     
                }
                else{
                    swal({                  //pop up 
                            title: "Invalid Credentials!",
                            text: "ID or Password is invalid!",
                            icon: "error",
                            button: "OK!",
                    });
                }
            }
            });
            }*/