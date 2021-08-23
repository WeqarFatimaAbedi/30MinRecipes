<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);


if($json['call']==1){

    $uid = $_SESSION['user'];
    $query = mysqli_query($con, "SELECT shopping_list.r_id, shopping_list.ing_name, recipe.title, images.name from shopping_list LEFT JOIN recipe ON shopping_list.r_id=recipe.r_id LEFT JOIN images ON shopping_list.r_id=images.img_id WHERE shopping_list.u_id='$uid'");
    
    if(mysqli_num_rows($query)>0){
        $items = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $empty = mysqli_free_result($query);
        echo json_encode($items);
    }
    else{
        echo json_encode($response['success'] = 0);
    }

        // for ($i=0;$i<count($names);$i++){
        //     $name = $names[$i];
        //     $add = mysqli_query($con,"INSERT INTO shopping_list (u_id, r_id, ing_name, created_at) VALUES('$uid','$rid','$name','$date')");
        // }

        // if($add){
        //     echo json_encode($response['success'] = 1);
        // }
        // else{
        //     echo json_encode($response['success'] = 2);
        // }
    
}

if($json['call']==2){
    $uid = $_SESSION['user'];
    $rid = $json['id'];

    $delete = mysqli_query($con, "DELETE FROM shopping_list WHERE r_id='$rid' AND u_id='$uid'");
    if($delete){
        echo json_encode($response['success'] = 1);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}

?>