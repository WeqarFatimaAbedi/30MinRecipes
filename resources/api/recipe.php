<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);

// Get recipes from save.php
if($json['call']==1){
    $getRecipes = mysqli_query($con, "SELECT recipe.r_id, recipe.title, images.name FROM recipe LEFT JOIN images ON recipe.r_id = images.img_id");
    if(mysqli_num_rows($getRecipes)>0){
        $recipes = mysqli_fetch_all($getRecipes, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getRecipes);
        echo json_encode($recipes);
        
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}

// Get recipe id for viewing the recipe from admin/allrecipe.php=>view, vege.php, veg.php, lacto.php, ovo.php
if($json['call']==2){

    $id = $json['id'];               //get the id
    $_SESSION['recipe'] = $id;       //save the id in a session as $_SESSION['recipe']
    echo json_encode($response['success'] = 1);
}

// Get recipe by id from recipe.php which displays the content
if($json['call']==3){

    $id = $_SESSION['recipe'];
    $info = mysqli_query($con,"SELECT title, description, category, servings, timing FROM recipe WHERE r_id='$id'");

    $image = mysqli_query($con,"SELECT name FROM images WHERE img_id='$id'");

    $ingrediants = mysqli_query($con,"SELECT name FROM ingrediant WHERE ing_id='$id'");

    $method = mysqli_query($con,"SELECT name FROM method WHERE m_id='$id'");
    
    $comments = mysqli_query($con,"SELECT comments.comment, user.name FROM comments LEFT JOIN user ON user.id=comments.u_id WHERE r_id='$id'");

    if(mysqli_num_rows($info)>0 and mysqli_num_rows($image)>0 and mysqli_num_rows($ingrediants)>0 and mysqli_num_rows($method)>0)
    {

        $r_info = mysqli_fetch_all($info, MYSQLI_ASSOC);            //gives the output in an associative array 
        $empty = mysqli_free_result($info);

        $r_image = mysqli_fetch_all($image, MYSQLI_ASSOC);
        $empty = mysqli_free_result($image);

        $r_ingrediants = mysqli_fetch_all($ingrediants, MYSQLI_ASSOC);
        $empty = mysqli_free_result($ingrediants);

        $r_method = mysqli_fetch_all($method, MYSQLI_ASSOC);
        $empty = mysqli_free_result($method);

        $coms = mysqli_fetch_all($comments, MYSQLI_ASSOC);
        $empty = mysqli_free_result($comments);

        if(isset($_SESSION['user']))
        {
            $uid = $_SESSION['user'];

            $list = mysqli_query($con,"SELECT DISTINCT r_id FROM shopping_list WHERE u_id='$uid'");
            $count = mysqli_num_rows($list);

            $saved = mysqli_query($con,"SELECT * FROM saved WHERE u_id='$uid'");
            $scount = mysqli_num_rows($saved);

            echo json_encode([$r_info, $r_image, $r_ingrediants, $r_method, 1, $count, $coms, $scount]);
        }
        else{
            echo json_encode([$r_info, $r_image, $r_ingrediants, $r_method, 0, 0, $coms, 0]);
        }
        
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}

// Add recipe in cart
if($json['call']==4){

    if(!isset($_SESSION['user'])){
        echo json_encode($response['success'] = 0);
    }
    else{
        echo json_encode($response['success'] = 1);
    }
    
}

// Add ingrediants list
if($json['call']==5){

    if(!isset($_SESSION['user'])){
        echo json_encode($response['success'] = 0);
    }
    else{
        $uid = $_SESSION['user'];
        $rid = $_SESSION['recipe'];
        $date = date('d-F-Y');
        $names = $json['ingrediantsArray'];

        for ($i=0;$i<count($names);$i++){
            $name = $names[$i];
            $add = mysqli_query($con,"INSERT INTO shopping_list (u_id, r_id, ing_name, created_at) VALUES('$uid','$rid','$name','$date')");
        }

        if($add){
            echo json_encode($response['success'] = 1);
        }
        else{
            echo json_encode($response['success'] = 2);
        }
    }
    
}

// save recipe
if($json['call']==6){
    if(!isset($_SESSION['user'])){
        echo json_encode($response['success'] = 0);            //NOT LOGGED IN
    }
    else{
        $uid = $_SESSION['user'];
        $rid = $_SESSION['recipe'];
        $date = date('d-F-Y');

        $check = mysqli_query($con,"SELECT * FROM saved WHERE u_id='$uid' AND r_id='$rid'");
        if(mysqli_num_rows($check)>0){
            echo json_encode($response['success'] = 3);           //ALREADY SAVED
        }
        else{
            $add = mysqli_query($con,"INSERT INTO saved (u_id, r_id, created_at) VALUES('$uid','$rid','$date')");
            if($add){
                echo json_encode($response['success'] = 1);              //ADDING RECIPE TO DATABASE
            }
            else{
                echo json_encode($response['success'] = 0);
            }
        }
        
    }
}

// search recipe
if($json['call']==7){
    $search = $json['item'];
    $check = mysqli_query($con,"SELECT title, r_id FROM recipe WHERE title LIKE '%{$search}%'");
        if(mysqli_num_rows($check)>0){
            $result = mysqli_fetch_all($check, MYSQLI_ASSOC);
            $empty = mysqli_free_result($check);
            echo json_encode($result);
        }
        else{
            echo json_encode($response['success'] = 0);
        }   
    }

?>