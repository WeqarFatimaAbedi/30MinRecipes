<?php
session_start();
include('connect.php');
$json = json_decode(file_get_contents("php://input"),true);

// Get Products
if($json['call']==1){
    $getProducts = mysqli_query($con, "select recipe.title,recipe.r_id, category.name from recipe left join category on recipe.category=category.id where recipe.category=category.id");
    if(mysqli_num_rows($getProducts)>0){
        $products = mysqli_fetch_all($getProducts, MYSQLI_ASSOC);
        $empty = mysqli_free_result($getProducts);
        echo json_encode($products);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}



// Delete Product
if($json['call']==0){
    $id = $json['id'];
    $delProduct = mysqli_query($con,"delete from recipe where r_id='$id' ");
    if($delProduct){
        echo json_encode($response['success']=1);
    }
}


// edit Product
if($json['call']==4){
    $id = $json['id'];
    $info=mysqli_query($con, "SELECT recipe.r_id, recipe.title,recipe.description, recipe.servings, recipe.timing, category.name from recipe left join category on recipe.category=category.id where recipe.r_id='$id'");
    $ingrediants = mysqli_query($con,"select name as ingname from ingrediant where ing_id='$id'");
    $method = mysqli_query($con,"select name as methodname from method where m_id='$id'");
    $image = mysqli_query($con,"select name as imagename from images where img_id='$id'");

    if(mysqli_num_rows($info)>0){
        $info1 = mysqli_fetch_all($info, MYSQLI_ASSOC);
        $empty = mysqli_free_result($info);
        $ingrediants1 = mysqli_fetch_all($ingrediants, MYSQLI_ASSOC);
        $empty = mysqli_free_result($ingrediants);
        $method1 = mysqli_fetch_all($method, MYSQLI_ASSOC);
        $empty = mysqli_free_result($method);
        $image1 = mysqli_fetch_all($image, MYSQLI_ASSOC);
        $empty = mysqli_free_result($image);
        echo json_encode([$info1, $ingrediants1, $method1, $image1]);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
    }




//mailing subscribed users
if($json['call']==3){

   $email = $json['email'];
    //for ($i=0;$i<count($names);$i++){
       // $name = $names[$i];*/

   $check_email = mysqli_query($con, "SELECT * FROM subscriptions where email='$email'");
  
   $emailcount = mysqli_num_rows($check_email);
    
    if($emailcount>0)
     
     {
       
     

        // $id = $userid['email'];
        
         $subject = "New Recipe Added!";
         $body = "Hi!
                  A new recipe has been added! if you wish to view the recipe check the website.";

         $sender_email = "From: 30minrecipesty@gmail.com";

         if(mail($email, $subject, $body, $sender_email))
            {
                echo json_encode($response['success'] = 1);
                
            }
    
    }
  }


// Get recipe id
if($json['call']==5){

    $id = $json['id'];
    $_SESSION['recipe'] = $id;
    echo json_encode($response['success'] = 1);
}


?>