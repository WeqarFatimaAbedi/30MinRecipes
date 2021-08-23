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

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
    crossorigin="anonymous">
  <title>Dashboard - 30MinRecipes</title>
  <link rel="stylesheet" href="../resources/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resources/css/styles.css">
    <script src="../resources/js/sweetalert.min.js"></script>
    <script src="../resources/Jquery/jquery-3.5.1.js"></script>
    <script src="../resources/Bootstrap/js/bootstrap.min.js"></script>

     <style>
 body {
  font-family: "Lato", sans-serif;}

 .sidebar {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 100px;
 }

 .sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
 }

 .sidebar a:hover {
  color: #f1f1f1;
 }

 .main {
   margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
 }

 @media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
 }
 </style>
</head>

<body>



<div id="headerSection">
     <div class="container" >
        <div class="row align-items-center">

            <nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
                      <a class="navbar-brand" href="#">
                      <img src="../images/logo.png" class="img-fluid">
                      </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                       </button>

                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav mr-auto text-center">

                        
                      </ul>
                  

                          <div id="rightNav">

                         <h5> <i><i class="fa fa-user-circle"></i>
                          <?php echo $_SESSION['name']; ?>
                          </i></h5>
                     </div>
                 </div>
                 

         
        </div>
    </div> 
</div><br>


<div class="container-fluid" style="margin-top:50px;">
  <div class="row"> 
    <nav class="col-sm-12 bg-light sidebar py-5">
      <div class="sidebar">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="admindash.php"><i class="fa fa-fw fa-home"></i> Home</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="allrecipes.php"><i class="fa fa-fw fa-wrench"></i> All Recipes</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="insertrecipes.php"><i class="fa fa-fw fa-pencil-square-o "></i> Insert Recipe</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="../routes/logout.php"><i class="fa fa-fw fa-user"></i>Logout</a>
        </li>
      </ul>
    </div>
    </nav>
</div>
</div>


    
        <div class="container-fluid" style="background-image: url(../images/slide6.jpg);"><br>

           <h1 class="text-center" style="font-weight: 150; font: bolder; color:white; font-size: 5rem;">Insert Recipe</h1>
           <div class="row" style="margin-left: 150px; " >
       </div>
        </div>
    
    <div class="container">

   

        <div class="row py-3" style="margin-left: 150px; ">
                <div class="col-md-12">
                    <div id="products">

                <!--   ID=ADDRECIPE-->      
               <form id="addRecipe" enctype="multipart/form-data">    <!--form ID=addRecipe-->

                             <!--TITLE-->
                            <div class="form-row">               
                                <div class="col-md-12">
                                    <h5>Title :</h5>
                                </div>
                            </div>

                            <div class="form-row py-1">
                                <div class="form-group col-md-12">
                                    <input name="title" autocomplete="off" type="text" class="form-control" placeholder="Title" required>
                                </div>
                            </div>

                            <!-- ADD INGREDIANTS  -->
                            <div id="ingrediants_field">              <!--id=ingrediants_field-->

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Add ingrediants :</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 form-group text-center">
                                        <input type="text" class="form-control" autocomplete="off"  placeholder="Ingrediants" name="ingrediants[]" required/>   <!--name=ingrediants[]-->
                                    </div>
                                    <div class="col-md-2 form-group text-center">
                                        <button type="button" class="btn btn-success" id="add_ingrediant">Add More <i class="fa fa-plus"></i></button>    <!--id=add_ingrediant-->
                                    </div>
                                </div>

                            </div>

                            <!-- ADD METHOD STEPS -->
                            <div id="steps_field">                   <!--id=steps_field-->

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Method :</h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-10 form-group text-center">
                                        <input type="text" class="form-control" autocomplete="off"  placeholder="Write step" name="steps[]" required/>       <!--name=steps[]-->
                                    </div>
                                    <div class="col-md-2 form-group text-center">
                                        <button type="button" class="btn btn-success" id="add_step">Add More <i class="fa fa-plus"></i></button>            <!--id=add_step-->
                                    </div>
                                </div>

                            </div>

                            <!--DESCRIPTION-->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <h5>Description :</h5>
                                </div>
                            </div>
                            <div class="form-row py-1">
                                <div class="form-group col-md-12">
                                    <input name="description" autocomplete="off"  type="text"class="form-control" placeholder="Add description" required>
                                </div>
                            </div>

                            <!--CATEGORY-->
                            <div class="form-row pb-3">
                                <div class="col-md-4">
                                    <h5>Category :</h5>
                                    <select name="category" class="form-control">
                                        <option value="1">Vegetarian</option>
                                        <option value="2">Vegan</option>
                                        <option value="3">Lacto Veg</option>
                                        <option value="4">Ovo Veg</option>
                                    </select>
                                </div>

                                <!--SERVINGS-->
                                <div class="col-md-4">
                                    <h5>Servings :</h5>
                                    <input name="servings" autocomplete="off"  type="text" class="form-control" placeholder="Add servings" required>
                                </div>

                                <!--TIMING-->
                                <div class="col-md-4">
                                    <h5>Time :</h5>
                                    <input name="timing" autocomplete="off"  type="text" class="form-control" placeholder="Add timing" required>
                                </div>
                            </div>
                            
                            <!--IMAGES-->
                            <div id="images_field">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5>Add image :</h5>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 form-group text-center">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" required>
                                            <label class="custom-file-label" for="pimage">Upload Image</label>
                                        </div>
                                    </div>    
                                </div>

                                  <!--EMAIL USERS
                                  <div class="form-row py-3">
                                    <div>
                                      <input type="checkbox" id="checkboxmail" onclick="emailusers()" > Email Users</input>
                                    </div>
                                 </div>
                                -->

                                 <!--ADD RECIPE BUTTON-->
                                <div class="form-row py-3">
                                    <div class="col-md-4 p-0 m-0"></div>
                                    <div class="col-md-4 form-group text-center">
                                        <button  style="border-radius:20px" type="submit" class="btn btn-success form-control"><h5>Add Recipe</h5></button>
                                    </div>
                                    <div class="col-md-4 p-0 m-0"></div>
                                </div>

                            </div>        <!--IMAGE TAG ENDS HERE-->
                        </form>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<script>

  

        $(document).ready(function(){

                                         //INGREDIENTS
        // add/remove ingrediants
        var ing_wrapper = $("#ingrediants_field");      //ID OF ADD_INDREDIANTS FIELD
        var add_ing = $("#add_ingrediant");             //ID OF "ADD MORE" BUTTON
        var x = 1;
        $(add_ing).click(function(e){                   //when "add more" button is clicked
            e.preventDefault();
                $(ing_wrapper).append(

                  '<div class="form-row">'+
                    '<div class="col-md-10 form-group text-center">'+
                      '<input type="text" class="form-control" placeholder="Ingrediants" name="ingrediants[]" autocomplete="off" required/>'+
                    '</div>'+
                    '<div class="col-md-2 form-group text-center">'+
                    '<button type="button" class="remove_ingrediant btn btn-danger">Remove</button>'+
                  '</div>'+                     //REMOVE INGREDIENTS BUTTON
                '</div>' 
                );

                x++;                                //REMOVE BUTTON IS ADDED HERE adn INCREMENT 
        });


        
        $(ing_wrapper).on("click",".remove_ingrediant", function(e){        //"remove_ingrediant" is THE CLASS
            e.preventDefault();                                             //TO REMOVE THE TEXTBOX
            $(this).parent('div').parent('div').remove(); 
            x--;
        });


                                            //METHODS
        // add/remove steps
        var steps_wrapper = $("#steps_field");              //ID OF THE STEPS
        var add_step  = $("#add_step");                     //ID BUTTON OF "ADD MORE"
        var y = 1;
        $(add_step).click(function(e){                     //if "ADD MORE" Button Is Clicked
            e.preventDefault(); 
                $(steps_wrapper).append(                  //APPEND IN THE MAIN DIV STEPS ID TAG
                  '<div class="form-row">'+
                    '<div class="col-md-10 text-center form-group">'+
                       '<input type="text" class="form-control" autocomplete="off" placeholder="Write step" name="steps[]" required/>'+
                    '</div>'+
                    '<div class="col-md-2 form-group text-center">'+
                      '<button type="button" class="remove_step btn btn-danger">Remove</button>'+     //REMOBE CLASS="REMOVE_STEPS"
                    '</div>'+
                  '</div>'
                  );
                y++;
        });
        
        $(steps_wrapper).on("click",".remove_step", function(e){        //"remove_stp" IS THE CLASS NAME 
            e.preventDefault();                                         //TO REMOVE
            $(this).parent('div').parent('div').remove(); 
            y--;
        });




        // form submit
        $("#addRecipe").on('submit', function(e){            //addRecipe IS THE ID OF THE FORM
            e.preventDefault();
            $.ajax({
                url : 'api/recipe.php',
                type : 'POST',
                data : new FormData(this),
                contentType : false,
                cache : false,
                processData : false,
                success : function(data){
                    swal({
                            title: "Recipe Added!",
                            text: "New recipe added successfully!",
                            icon: "success",
                            button: "OK!",
                            
                        }).then((ok)=>{
                            if(ok){
                                //location.reload();
                                window.location ='allrecipes.php';
                            }
                        });             
                }
            });
        });  

 });      //END OF DOCUMENT

    //this is extra 


   
/*
     function emailusers(){
        var email = $("#checkboxmail");
        //var checked = id;
        $.ajax({
            url : 'api/product.php',
            type : 'POST',
            dataType : 'json',
            contentType : 'application/json',
            data : JSON.stringify({
                call : 3,
                //email:email,
                email : email,
               
            }),
            success : function(data){
              if(data==1){
                  swal({
                            title: "Email!",
                            text: "",
                            icon: "success",
                            button: "OK!",
                    }); 
                  }
            }
            
        });
    }*/
    
</script>

</body>

</html>