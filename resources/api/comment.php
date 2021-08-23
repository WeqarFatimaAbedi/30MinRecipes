<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);

if($json['call']==1){

    if(!isset($_SESSION['user'])){
        echo json_encode($response['success'] = 2);
    }
    else{
        $uid = $_SESSION['user'];
        $rid = $_SESSION['recipe'];
        $date = date('d-F-Y');
        $com = $json['com'];
    
        $query = mysqli_query($con, "INSERT INTO comments (u_id, r_id, comment, created_at) VALUES('$uid','$rid','$com','$date') ");
        if($query){
            echo json_encode($response['success'] = 1);
        }
        else{
            echo json_encode($response['success'] = 0);
        }
    }
    
}

?>