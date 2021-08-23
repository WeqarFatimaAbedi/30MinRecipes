<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);     //getting the request body: file_get_contents
                                                                //to convert the string to an actual php object:json_decode

if($json['call']==1){                    //after converting the ajax string to json object and getting the KEY

    if(isset($_SESSION['user']))
    {
        $uid = $_SESSION['user'];
       
        $saved = mysqli_query($con,"SELECT * FROM saved WHERE u_id='$uid'");
        $saved = mysqli_num_rows($saved);
        
         $cart = mysqli_query($con,"SELECT DISTINCT r_id FROM shopping_list WHERE u_id='$uid'");
        $cart = mysqli_num_rows($cart);

        echo json_encode([$cart, $saved]);
    }
    else{
        echo json_encode(0);
    }

}

?>