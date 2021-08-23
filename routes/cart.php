<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - 30MinRecipes</title>
    <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>
    
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <?php include('navbar.php') ?>
            </div>
        </div>
        <br><br><br><br>

        <div id="getCart"></div>        <!--ID=GETCART-->
        <hr>

        <?php include('../routes/footer.php') ?>
        
    </div>


<script>
    $(document).ready(function(){
        getData();
        getNavLinks();
    });

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
                                '<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Pantry <span class="badge badge-pill badge-danger">'+cart+'</span></a>'+
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

    function deleteItem(id, title){
        var id = id;
        var title = title;
        swal({
            title: 'Do you want to remove '+title+' from cart?',
            icon: "warning",
            buttons: ['Cancel', 'Confirm'],
            dangerMode: true,
            })
            .then((done) => {
            if (done) {
                $.ajax({
                    url : '../resources/api/cart.php',
                    type : 'POST',
                    dataType : 'json',
                    contentType : 'application/json',
                    data : JSON.stringify({
                        call : 2,
                        id : id
                    }),
                    success : function(data){
                        if(data==1){
                            getData();
                            getNavLinks();
                        }
                        else{
                            alert("error!");
                        }
                    }
                });
            } else {
                swal("Think again and decide!");
            }
        });
    }

    function getData(){
        $.ajax({
            url : '../resources/api/cart.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1,
            }),
            success : function(data){
                console.log(data);
                /*var info = data[0][0];
                var image = data[1][0];
                var ingrediants = data[2];
                var method = data[3];
                var user = data[4];
                var badge = data[5]>0 ? data[5] : '';
                var getRecipe = '';
*/
                var itemList = '';
                var rid = '';
                var sr = 1;
                var title = '';

                //NO INGREDINTS IN PANTRY
                if(data==0){
                    itemList += 
                    '<div class="col-md-12 text-center">'+
                      '<p>There are no items in shopping list right now.</p>'+
                    '</div>';
                }


                else{

                    $.each(data, function(i,d)
                    {
                     if(rid=='' || title=='')
                        {
                         itemList+=
                          '<div class="col-md-5" style="border: 1px solid grey; border-radius:20px; padding:30px">'+
                                '<form>'+
                                  '<div class="form-row">'+
                                     '<div class="form-group col-11">'+
                                         '<h4 class="pb-2">'+d.title+'</h4>'+
                                     '</div>'+
                                     '<div class="form-group col-1">'+
                                         '<button type="button" onclick="deleteItem(\''+d.r_id+'\',\''+d.title+'\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>'+
                                         '</button>'+
                                     '</div>'+
                                 '</div>'+
                             '</form>'+
                             '<img src="../uploads/'+d.name+'" style="border-radius:20px" height="200" width="250" class="image-fluid"><br><br>'+
                             //FOR DISPLAYING THE INGREDIENTS
                             '<p><strong>'+sr+'.</strong> '+d.ing_name+'</p>';
                         title = d.title;
                         rid = d.r_id;
                         sr++;
                        }

                    //FOR THE INDIVIDUAL INGREDIENTS TO COME INSIDE ONE BOX
                    else if(rid==d.r_id)
                     {
                        itemList+='<p><strong>'+sr+'.</strong> '+d.ing_name+'</p>';
                        title = d.title;
                        sr++;
                     }

                     //FOR DISPLAYING THE SECOND INGREDIENTS LIST
                    else
                    {
                        sr=1;
                        itemList+= 
                        '</div><div class="col-md-1 py-2 m-0"></div>'+
                        '<div class="col-md-5" style="border: 1px solid grey; border-radius:20px; padding:30px">'+
                            '<form>'+
                                 '<div class="form-row">'+
                                     '<div class="form-group col-11">'+
                                         '<h4 class="pb-2">'+d.title+'</h4>'+
                                     '</div>'+
                                     '<div class="form-group col-1">'+
                                         '<button type="button" onclick="deleteItem(\''+d.r_id+'\',\''+d.title+'\')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i>'+
                                         '</button>'+
                                     '</div>'+
                                 '</div>'+
                            '</form>'+
                            '<img style="border-radius:20px" src="../uploads/'+d.name+'" height="200" width="250"><br><br>'+
                            '<p><strong>'+sr+'.</strong> '+d.ing_name+'</p>';
                        sr++;
                    }
                    rid = d.r_id;
                    
                    });
                }

                $("#getCart").html(  
                    '<div class="row">'+
                         '<div class="col-md-12 text-center">'+
                             '<h3>PANTRY</h3>'+
                             '</div>'+
                         '</div>'+
                         '<hr>'+
                         '<div class="row px-5 py-2">'+itemList+'</div>'
                );
            }
            
        });
    }


    function checkall(){
   	var parent = document.getElementById("parent");
   	var label = document.getElementById("label");
   	var input = document.getElementsByTagName("input");

   	if(parent.checked===true){
   		for(var i=0; i<input.length; i++){
   			if(input[i].type=="checkbox" && input[i].id=="child_chkbox" && input[i].checked==false){
   				input[i].checked = true;
   			}
   		}
   	}

   	if(parent.checked===false){
   		for(var i=0; i<input.length; i++){
   			if(input[i].type=="checkbox" && input[i].id=="child_chkbox" && input[i].checked==true){
   				input[i].checked = false;
   				
   			}
   		}
   	}
   }

   
</script>
    
    
</body>
</html>