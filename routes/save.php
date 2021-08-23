
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
    <title>Saved - 30MinRecipes</title>
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

        <div id="getCart"></div>
        <hr>

        <?php include('../routes/footer.php') ?>
        
    </div>


<script>
    $(document).ready(function(){
        getData();
        getNavLinks();
    });

     //the div that displays the recipe name, image and the open and remove buttons
     //1. RECIPE NAME
     //2. RECIPE IMAGE.
     //BUTTON: 
         //1. OPEN RECIPE
         //2. DELETE RECIPE
    function getData(){
        $.ajax({
            url : '../resources/api/save.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1,
            }),
            success : function(data){
                console.log(data);
                var itemList = '';
                var rid = '';
                var sr = 1;
                var title = '';
                var styless="border: 1px solid grey; border-radius:20px; padding:30px";

                if(data==0){
                    itemList = '<div class="col-md-12 text-center"><p>There are no items in save list right now.</p></div>';
                }
                else{
                    $.each(data, function(i,d){       //INDEX(i,d)  i=KEY and d=VALUE
                        i++;                          //optional increment

                        //APPEND IN VARIABLE THE INFOR TO BE DISPLAYED    
                        itemList+=
                        '<div class="row p-2 align-items-center bg-light">'+

                          //THE RECIPE TITLE
                         '<div class="col-md-4">'+
                            '<h4 class="pb-2">'+d.title+'</h4>'+
                         '</div>'+

                           //THE RECIPE IMAGE NAME
                         '<div class="col-md-4 text-center">'+
                          '<img src="../uploads/'+d.name+'" style="border-radius:10px" height="80" width="120">'+
                         '</div>'+

                         //OPEN RECIPE BUTTON       ONCLICK="OPENRECIPE()"
                         '<div class="col-md-2">'+
                            '<button class="btn btn-ucess btn-outline-success" type="button" onclick="openRecipe('+d.r_id+')">Open</button>'+
                         '</div>'+

                         //REMOVE RECIPE BUTTON     ONCLICK=DELETEITEM()   
                         '<div class="col-md-2">'+
                           '<button type="button" onclick="deleteItem(\''+d.r_id+'\',\''+d.title+'\')" class="btn btn-anger btn-outline-danger">Remove</button>'+
                         '</div></div><hr>';
            
                    });
                }        //else ends

                $("#getCart").html(  
                    '<div class="row"><div class="col-md-12 text-center">'+
                        '<h3><strong>Saved Recipes</strong></h3></div></div><hr>'+itemList
                );
            }
            
        });
    }

  //for deleting the recipe i am retrieving the recipe id and the title of the recipe
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
                    url : '../resources/api/save.php',
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
            } 
            else {
                swal("Think again and decide!");
              }
        });
    }

    function openRecipe(id){
        var id = id;
        $.ajax({
            url : '../resources/api/recipe.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 2,
                id : id
            }),
            success : function(data){
                if(data==1){
                    window.location = 'recipe.php';
                }
            }
            
        });
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
   
</script>
    
    
</body>
</html>