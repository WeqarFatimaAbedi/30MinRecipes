<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacto Veg - 30MinRecipes</title>
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
        <br><br><br>

        <div id="getRecipes"></div>
        <hr>

        <?php include('footer.php') ?>
        
    </div>


<script>
    $(document).ready(function(){
        getRecipes();
        getNavLinks();
    });

    function getRecipes(){
        $.ajax({
            url : '../resources/api/category.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 3,
            }),
            success : function(data){
                console.log(data);
                var recipes = data;
                var getRecipes = '';

                $.each(recipes, function(i, d){
                        getRecipes+=   
                            '<div class="col-md-4 form-group text-center py-3">'+
                                    '<form>'+
                                      //recipe title is displayed
                                        '<div class="form-row">'+
                                            '<div class="form-group col-md-12">'+
                                            '<h5 class="py-1">'+d.title+'</h5>'+     //recipe name
                                            '</div>'+
                                        '</div>'+
                                        //image is displayed and uploaded in the uploas folder
                                        '<div class="form-row">'+
                                            '<div class="form-group col-md-12">'+
                                            '<img src="../uploads/'+d.name+'" style="border-radius:20px;" height="250" width="300">'+
                                            '</div>'+
                                        '</div>'+
                                        //view recipe button
                                        '<div class="form-row">'+
                                            '<div class="col-md-2 p-0 m-0"></div>'+
                                            '<div class="form-group col-md-8">'+
                                            '<button type="button" style="border-radius:20px" onclick="getRecipe(\''+d.r_id+'\')" class="btn btn-rimary btn-outline-info form-control"><h5>View Recipe</h5></button>'+
                                            '</div>'+
                                            '<div class="col-md-2 p-0 m-0"></div>'+
                                        '</div>'+
                                    '</form>'+
                            '</div>';
                    });

                    $("#getRecipes").html(  
                        '<div class="row"><div class="col-md-12 text-center">'+
                        '<h3>LACTO VEGETARIAN</h3></div></div><hr>'+
                        '<div class="row">'+
                            getRecipes+
                        '</div>'
                    );
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

    
    function getRecipe(id){
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

   
</script>
    
    
</body>
</html>