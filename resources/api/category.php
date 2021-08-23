<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);


//for vegetarian from vege.php
if($json['call']==1){
    
    $getRecipes = mysqli_query($con, "SELECT recipe.r_id, recipe.title, images.name FROM recipe LEFT JOIN images ON recipe.r_id = images.img_id WHERE recipe.category='1'");
    if(mysqli_num_rows($getRecipes)>0){
        $recipes = mysqli_fetch_all($getRecipes, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecipes);
        echo json_encode($recipes);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}


//for vegan from veg.php
if($json['call']==2){
    $getRecipes = mysqli_query($con, "SELECT recipe.r_id, recipe.title, images.name FROM recipe LEFT JOIN images ON recipe.r_id = images.img_id WHERE recipe.category='2'");
    if(mysqli_num_rows($getRecipes)>0){
        $recipes = mysqli_fetch_all($getRecipes, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecipes);
        echo json_encode($recipes);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}


//lacto veg from lacto.php
if($json['call']==3){
    $getRecipes = mysqli_query($con, "SELECT recipe.r_id, recipe.title, images.name FROM recipe LEFT JOIN images ON recipe.r_id = images.img_id WHERE recipe.category='3'");
    if(mysqli_num_rows($getRecipes)>0){
        $recipes = mysqli_fetch_all($getRecipes, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecipes);
        echo json_encode($recipes);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}


//ovo veg from ovo.php
if($json['call']==4){
    $getRecipes = mysqli_query($con, "SELECT recipe.r_id, recipe.title, images.name FROM recipe LEFT JOIN images ON recipe.r_id = images.img_id WHERE recipe.category='4'");
    if(mysqli_num_rows($getRecipes)>0){
        $recipes = mysqli_fetch_all($getRecipes, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecipes);
        echo json_encode($recipes);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}

?>