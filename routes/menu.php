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

        <!--NAVBAR-->
        <div class="row">
            <div class="col-md-12 p-0">
                <?php include('navbar.php') ?>
            </div>
        </div>
        <br><br><br>

        <!----------MONDAY----------->
        <div class="row pt-5 pb-3 px-3">
            <div class="col-md-3">
                <h5>Monday</h5>
            </div>

            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="montext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="monopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="monremove"></div>
            </div>
        </div>

        <hr>

        <!----------TUESDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Tuesday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="tuetext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="tueopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="tueremove"></div>
            </div>
        </div>

        <hr>

        <!----------WEDNESDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Wednesday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="wedtext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="wedopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="wedremove"></div>
            </div>
        </div>

        <hr>

        <!----------THURSDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Thursday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="thutext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="thuopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="thursremove"></div>
            </div>
        </div>

        <hr>

        <!----------FRIDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Friday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="fritext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="friopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="friremove"></div>
            </div>
        </div>

        <hr>

        <!----------SATURDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Saturday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="sattext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="satopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="satremove"></div>
            </div>
        </div>

        <hr>

        <!----------SUNDAY----------->
        <div class="row p-3">
            <div class="col-md-3">
                <h5>Sunday</h5>
            </div>
            <!---RECIPE TITLE--->
            <div class="col-md-5">
                <div id="suntext"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="sunopen"></div>
            </div>
            <!--OPEN RECIP BUTTON-->
            <div class="col-md-2">
                <div id="sunremove"></div>
            </div>
        </div>

        <hr>

        <?php include('../routes/footer.php') ?>
        
    </div>


<script>
    $(document).ready(function(){
        getData();
        getNavLinks();
    });

     function getData(){
        $.ajax({
            url : '../resources/api/menu.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 3,
            }),

            success : function(data){
                console.log(data);

                 //FOR TEXT                  LENGTH >0  OR   NO TITLE SHOULD BE DISPLAED
                $("#montext").html(data[0].length>0 ? data[0][0].title : '');    //CHECKING HOW MANY ITEMS ARE AVAILABLES IN THE 0TH ARRAY INDEX 

                //IF THE LENGTH IS GREATER THAN 0   THEN SHOW THE OPEN RECIPE BUTTON ELSE DISABLE IT
                $("#monopen").html(data[0].length>0 ? 

                    '<button type="button" onclick="openRecipe('+data[0][0].r_id+')" class="btn btn-success">Open</button>' : '<button type="button" class="btn  btn-success" disabled>Open</button>' );

                $("#monremove").html(data[0].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[0][0].r_id+'\',\''+data[0][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn btn-danger" disabled>Remove</button>');


                                     //TUESDAY
                $("#tuetext").html(data[1].length>0 ? data[1][0].title : '');
                $("#tueopen").html(data[1].length>0 ? 
                    '<button type="button" onclick="openRecipe('+data[1][0].r_id+')" class="btn  btn-success">Open</button>' : '<button type="button" class="btn  btn-success" disabled>Open</button>');

                $("#tueremove").html(data[1].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[1][0].r_id+'\',\''+data[1][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn btn-danger" disabled>Remove</button>');


                                    //WEDNESDAY
                $("#wedtext").html(data[2].length>0 ? data[2][0].title : '' );
                $("#wedopen").html(data[2].length>0 ? '<button type="button" onclick="openRecipe('+data[2][0].r_id+')" class="btn  btn-success">Open</button> ' : '<button type="button" class="btn  btn-success" disabled>Open</button>');

                 $("#wedremove").html(data[2].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[2][0].r_id+'\',\''+data[2][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn btn-danger" disabled>Remove</button>');


                                    //THURSDAY
                $("#thutext").html(data[3].length>0 ? data[3][0].title : '');
                $("#thuopen").html(data[3].length>0 ? '<button type="button" onclick="openRecipe('+data[3][0].r_id+')" class="btn  btn-success">Open</button>': '<button type="button" class="btn  btn-success" disabled>Open</button>');

                 $("#thursremove").html(data[3].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[3][0].r_id+'\',\''+data[3][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn  btn-danger" disabled>Remove</button>');


                                        //FRIDAY

                $("#fritext").html(data[4].length>0 ? data[4][0].title : '');
                $("#friopen").html(data[4].length>0 ? '<button type="button" onclick="openRecipe('+data[4][0].r_id+')" class="btn  btn-success">Open</button>' : '<button type="button" class="btn  btn-success" disabled>Open</button>');

                 $("#friremove").html(data[4].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[4][0].r_id+'\',\''+data[4][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn  btn-danger" disabled>Remove</button>');



                                    //SATURDAY

                $("#sattext").html(data[5].length>0 ? data[5][0].title : '');
                $("#satopen").html(data[5].length>0 ? '<button type="button" onclick="openRecipe('+data[5][0].r_id+')" class="btn  btn-success">Open</button>' :'<button type="button" class="btn  btn-success" disabled>Open</button>');

                $("#satremove").html(data[5].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[5][0].r_id+'\',\''+data[5][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn  btn-danger" disabled>Remove</button>');



                                    //SUNDAY

                $("#suntext").html(data[6].length>0 ? data[6][0].title : '');
                $("#sunopen").html(data[6].length>0 ? '<button type="button" onclick="openRecipe('+data[6][0].r_id+')" class="btn  btn-success">Open</button>' : '<button type="button" class="btn  btn-success" disabled>Open</button>' );

                $("#sunremove").html(data[6].length>0 ?
                    '<button type="button" onclick="deleteItem(\''+data[5][0].r_id+'\',\''+data[5][0].title+'\')" class="btn btn-danger">Remove</button>' : '<button type="button" class="btn  btn-danger" disabled>Remove</button>');
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

    function deleteItem(id, title){
        var id = id;
        var title = title;
        swal({
            title: 'Do you want to remove '+title+' from Menu?',
            icon: "warning",
            buttons: ['Cancel', 'Confirm'],
            dangerMode: true,
            })
            .then((done) => {
            if (done) {
                $.ajax({
                    url : '../resources/api/menu.php',
                    type : 'POST',
                    dataType : 'json',
                    contentType : 'application/json',
                    data : JSON.stringify({
                        call : 4,
                        id : id
                    }),
                    success : function(data){
                        if(data==1){
                            getData();
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

   
   
</script>
    
    
</body>
</html>