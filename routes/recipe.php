<?php
    session_start();
    if(!isset($_SESSION['recipe'])){        //session of recipe creted in recipe call==2
        header('location:../');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        <br><br>

        <div id="getRecipe"></div>         <!-- ID=GETRECIPES-->
        <hr>

        <!--COMMENT SECTION-->
        <div class="row">
            <div class="col-md-12">
                <h4>Comments <span id="ccount"></span></h4>             <!--ID=CCOUNT: THE COMMENT COUNTS--> 
                <form>
                    <div class="form-row p-3">
                        <div class="form-group col-md-11">

                            <!--ID=COMMENT-->
                            <textarea id="comment" class="form-control" rows="1" placeholder="Post comment.."></textarea>
                        </div>

                        <!--TO POST THE COMMENT BY CLICKING ONCLICK="POSTCOM"-->
                        <div class="form-group col-md-1">
                            <button type="button" onclick="postCom()" class="form-control btn btn-success"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </div>

                    <!--COMMENT SECTION WHERE COMMENTS APPEAR-->
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <div class="px-3" id="commentSection"></div>         <!--id="commentsection"-->
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <hr>

        <?php include('../routes/footer.php') ?>
        
    </div>


<script>
    $(document).ready(function(){
        getRecipe();
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
                    var pantry = data[0]>0 ? data[0] : '';
                    var saved = data[1]>0 ? data[1] : '';
                    $("#rightNav").html(
                        '<ul class="navbar-nav">'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="save.php"><i class="fa fa-star"></i> Saved <span class="badge badge-pill badge-success">'+saved+'</span></a>'+
                            '</li>'+
                            '<li class="nav-item active">'+
                                '<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i> Pantry <span class="badge badge-pill badge-danger">'+pantry+'</span></a>'+
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


    //getRecipes() function which displays everything on page
    function getRecipe(){
        $.ajax({
            url : '../resources/api/recipe.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 3,
            }),
            success : function(data){
                //DISPLAY DATA IN LOG
                console.log(data);
                var info = data[0][0];
                var image = data[1][0];
                var ingredients = data[2];
                var method = data[3];

                var user = data[4];
                var comArea = data[6];

                var getRecipe = '';             
                var ingredientList = '';        //ingredients
                var methodList = '';            //methods
                var coms = '';                //for comments



                //comments section
                if(comArea.length>0){
                    $.each(comArea, function(i,d)
                    {
                        coms+=
                        '<div class="p-3" style="background-color:#ecf0f1; border-radius:10px">'+
                           '<h6>'+d.name+'</h6>'+
                           '<p>&nbsp&nbsp'+d.comment+'</p>'+
                        '</div><br>';
                    });
                }
                //username    comment
                //user1       very good recipe

                else{
                    coms=
                      '<div class="p-3 text-center" style="background-color:#ecf0f1; border-radius:10px">'+
                      '<p>No comments available</p>'+
                      '</div>';
                }

                
                //ingredients list
                $.each(ingredients, function(i,d){
                    i++;
                    ingredientList+=
                    '<input type="checkbox" id="child_chkbox" name="ingrediantsList" value="'+d.name+'">&nbsp&nbsp'+
                    '<label style="font-size:18px" class="py-1">'+d.name+'</label><br>';
                });
                //checkbox(d.name)
                //label=salt
                //pepper



                //method are displayed
                $.each(method, function(i,d){
                    i++;
                    methodList+='<p style="font-size:18px"><b>Step '+i+'.</b><br>'+d.name+'</p><hr>';
                });                        
                //Step: 1
                //method name
  



                //THE INORMATION IN THE RECIPE PAGE WILL BE  DISPLAY HERE
                getRecipe+=   
                    '<div class="row py-3">'+
                        '<div class="col-md-12">'+
                        
                            '<form id="ingForm" enctype="multipart/form-data">'+    //form id="ingForm"
                                '<div class="form-row py-4">'+

                                    //using info var and displaying all the values
                                    '<div class="form-group col-md-7 px-4">'+

                                        //TITLE OF RECIPE
                                        '<h1>'+info.title+'</h1><br>'+
                                        //DESCRIPTION
                                        '<h4>Description</h4>'+
                                        '<p style="font-size:18px">'+info.description+'</p>'+
                                        //SERVINGS          TIMING
                                        '<p style="font-size:18px"><b>Servings :</b> '+info.servings+' &nbsp &nbsp<b>Timing :</b> '+info.timing+'</p>'+

                                        //SAVE RECIPE BUTTON          ONCLICK="SAVERECIPE()"
                                        '<button class="btn btn-rimary btn-outline-primary" type="button" onclick="saveRecipe()">Save Recipe<i class="fa  fa-shopping-cart"></i></button>'+              //onclick=saveRecipe()
                                    '</div>'+

                                    //IMAGE variable and displaying the image
                                    '<div class="form-group col-md-5 py-4 text-center">'+
                                        '<img src="../uploads/'+image.name+'" height="300" width="400" style="border-radius:10px;"> '+
                                    '</div>'+

                                '</div><hr>'+
                                
                                //INGREDIENTS     PANTRY       MENU 

                                //ingredinats are displayed
                                '<div class="form-row py-2">'+
                                    '<div class="form-group col-md-5 px-4">'+

                                        //INGREDIENTS LIST WITH ONCLICK="CHECKALL()"
                                        '<h3>Ingredients</h3><br>'+  
                                        ingredientList+                    //INGREDIENTS LIST DEFINED ABOVE
                                        //CHECKALL CHECKBOX
                                        '<input type="checkbox" id="parent" onclick="checkall()">&nbsp&nbsp'+
                                          '<label style="font-size:18px" class="py-1">'+
                                            '<strong>Select all</strong>'+
                                            '<i class="fa fa-check"></i>'+
                                          '</label><br><br>'+                   //onlick = checkall()


                                          //PANTRY  BUTTON   
                                          //ONCLICK="ADDINGREDIENTS()"
                                        '<button class="btn btn-uccess btn-outline-primary" type="button" onclick="addIngrediants()">Add to Pantry'+
                                          ' <i class="fa fa-shopping-cart"></i>'+
                                        '</button><br><br>'+                    //onclick= addingrediants()


                                        //MENU BUTTON
                                        '<div class="input-group mb-3">'+
                                          '<select class="custom-select" id="day">'+      //ID=DAY
                                             '<option value="Monday" selected>Monday</option>'+
                                             '<option value="Tuesday">Tuesday</option>'+
                                             '<option value="Wednesday">Wednesday</option>'+
                                             '<option value="Thursday">Thursday</option>'+
                                             '<option value="Friday">Friday</option>'+
                                             '<option value="Saturday">Saturday</option>'+
                                             '<option value="Sunday">Sunday</option>'+
                                           '</select>'+

                                           //ONCLICK TO CREATE MENU==ADDTOMENU()  FOR (ID)="DAY"
                                           '<div class="input-group-append">'+
                                              '<button class="btn btn-success" type="button" onclick="addToMenu()" for="day">Add to Menu <i class="fa fa-book"></i></button>'+
                                          '</div>'+                           //onclick=addToMenu()
                                          
                                      '</div>'+

                                  '</div>'+



                                    //METHOD SIDE


                                   '<div class="form-group col-md-7 px-3">'+
                                     '<h3>Method</h3><br>'+
                                        methodList+
                                   '</div>'+

                              '</div>'+
                            '</form>'+
                        '</div>'+
                    '</div>';

                $("#getRecipe").html(getRecipe);            //MAIN ID IN THE DIV TAG
                $("#commentSection").html(coms);            //COMMENT SECTION
                $("#ccount").html(comArea.length);          //THE COUNTS OF HOW MANY COMMENTS ARE THERE(OPT)
            }
            
        });
    }

     //FOR SAVING THE RECIPE, 
       //1. CHECKING IF THE USER LOGGED IN
       //2. CHECKING IF ALREADY SAVED RECIPE
       //3. SAVING THE RECIPE
    function saveRecipe(){
        $.ajax({
            url : '../resources/api/recipe.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 6
            }),
            success : function(data){

                //NOT LOGGED IN
                if(data==0){
                    swal({
                        title: "Login required!",
                        text: "You must have to login to save recipe!",
                        icon: "info",
                        button: "OK!",
                    });
                }

                //ALREADY SAVED RECIPE
                else if(data==3){
                    swal({
                        title: "Already saved!",
                        text: "Recipe is already saved!",
                        icon: "warning",
                        button: "OK!",
                    });
                }

                
                // else if(data==0){
                //     swal({
                //         title: "Some error occured!",
                //         text: "You must have to login to add recipe in cart!",
                //         icon: "error",
                //         button: "OK!",
                //     });
                // }
                else{
                    getRecipe();      //optional
                    getNavLinks();
                        swal({
                            title: "Saved!",
                            text: "Recipe saved!",
                            icon: "success",
                            button: "OK!",
                        });
                }
            }
        });
    }

    //CHECKING IF THE USER IS LOGGED IN
    //CALLING THE GETRECIPE() TO DISPLAY RECIPE
    function postCom(){
        var com = $("#comment").val();      //ID OF TEXTAREA
        if(com==''){
            swal({
                title: "Blank comment!",
                text: "Atleast one word is required!",
                icon: "warning",
                button: "OK!",
            });
        }
        else{
            $.ajax({
            url : '../resources/api/comment.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 1,
                com : com
            }),
            success : function(data){
                if(data==0){
                    swal({
                        title: "Some error occured!",
                        text: "You must have to login !",
                        icon: "error",
                        button: "OK!",
                    });
                }
                else if(data==2){
                    swal({
                        title: "Login required!",
                        text: "You must have to login to comment!",
                        icon: "info",
                        button: "OK!",
                    });
                    $("#comment").val('');
                }
                else{
                    getRecipe();      //CALLS THIS FUNCTION AND RETRIEVES THE NAME AND COMMENT FROM THE DB AND DISPLAYS THE CONTENT 
                    $("#comment").val('');
                }
            }
        });
        }
    }

    function addIngrediants(){

        var ingrediantsArray = [];
        //getting all selected checkboxes in an array.
        $.each($("input[name='ingrediantsList']:checked"), function(){     //name=ingredientsList

            //push the checked checkboxes into the array variable
            ingrediantsArray.push($(this).val());
        });
        
        if(ingrediantsArray==''){
            swal({
                title: "No ingrediant selected!",
                text: "At least one ingrediant is required!",
                icon: "warning",
                button: "OK!",
            });
        }
        else{
            $.ajax({
                url : '../resources/api/recipe.php',
                type : 'POST',
                dataType : 'json',
                contentType : 'application/json',
                data : JSON.stringify({
                    ingrediantsArray : ingrediantsArray,
                    call : 5
                }),
                success : function(data){
                    if(data==0){
                        swal({
                            title: "Login required!",
                            text: "You must have to login to save ingrediants list!",
                            icon: "info",
                            button: "OK!",
                        });
                    }
                    else if(data==2){
                        swal({
                            title: "Some error occured!",
                            text: "There is some issue!",
                            icon: "error",
                            button: "OK!",
                        });
                    }
                    else{
                        getRecipe();
                        getNavLinks();
                        swal({
                            title: "Added to cart!",
                            text: "Your shopping list is added in pantry!",
                            icon: "success",
                            button: "OK!",
                        });
                    }
                }
        });
        }
        
    }

    //1. LOGIN REQUIRED
    //2. REPLACE THE RECIPE BY A NEW ONE
    //3. ADD RECIPE 
    function addToMenu(){

        var day = $("#day").val();            //ID OF SELECT TAG
            $.ajax({
                url : '../resources/api/menu.php',
                type : 'POST',
                dataType : 'json',
                contentType : 'application/json',
                data : JSON.stringify({
                    day : day,
                    call : 1
                }),
                success : function(data){

                    //LOGIN REQUIRED 
                    if(data==0){
                        swal({
                            title: "Login required!",
                            text: "You must have to login to add item in menu!",
                            icon: "info",
                            button: "OK!",
                        });
                    }

                    //ALREADY RECIPE IS ADDED 
                    //OR
                    //REPLACE THE RECIPES
                    else if(data==2){
                        swal({
                            title: 'Already recipe selected for '+day+'. Do you want to replace it by this one?',
                            icon: "warning",
                            buttons: ['No', 'Yes'],
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
                                        day : day,
                                        call : 2
                                    }),
                                    success : function(data){
                                        if(data==1){
                                            getRecipe();
                                            swal({
                                                title: "Recipe replaced!",
                                                text: "Recipe is replaced in Menu for "+day,
                                                icon: "success",
                                                button: "OK!",
                                            });
                                        }
                                        else{
                                            alert("error!");
                                        }
                                    }
                                });    
                            }                   //IF CLOSE 
                            else {
                                swal("Think again and decide!");
                            }
                        });                   //.THE(DONE) CLOSED
                    }                           //ELSE IF CLOSED

                    //ADD RECIPE
                    else{
                        getRecipe();
                        getNavLinks();
                        swal({
                            title: "Added to Menu!",
                            text: "Recipe is added in Menu for "+day,
                            icon: "success",
                            button: "OK!",
                        });
                    }
                }
        });
        // }

    }


     //FOR SELECTING ALL THE INGREDIENTS
    function checkall(){
   	  var parent = document.getElementById("parent");       //ID OF CHECKBOX
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