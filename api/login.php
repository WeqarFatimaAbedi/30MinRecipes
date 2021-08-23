
<?php
    session_start();
    include("connect.php");
    $json = json_decode(file_get_contents("php://input"),true);
    
    if($json['call']==1){

    $id = $json['id'];
    $pass = $json['pass'];

    $check = mysqli_query($con, "SELECT * FROM admin WHERE (admin_email='$id') AND admin_pass='$pass' ");
    if(mysqli_num_rows($check)>0){
       
        $_SESSION['admin_id'] = $id;


        $userdata = mysqli_fetch_array($check);
        $_SESSION['name'] = $userdata['admin_name'];


        echo json_encode($response['success'] = 1);
    }
    else{
        echo json_encode($response['success'] = 0);
    }

}

if($json['call']==2){

    $id = $json['id'];
    $pass = $json['pass'];

    $checkemail = mysqli_query($con, "SELECT * FROM admin WHERE (admin_email='$id') ");
    if(mysqli_num_rows($checkemail)>0){
    
        $update_query = mysqli_query($con,"UPDATE admin set admin_pass='$pass' WHERE (admin_email='$id') ");
          if($update_query){
            echo json_encode($response['success'] = 1);
        }
        else {
         
        echo json_encode($response['success'] = 0);
    }
        
    }
    
    else{
            echo json_encode($response['success'] = 0);
        }
            


}



    //if($json['call'] == 1){                 //if call==1 :-it is for the login of admin
        
      //  $pid = $json['id'];                 //pid variable that takes the id from loginFun() from admin.php
        //$pass = $json['pass'];          //pass variable that takes the pass from loginFun() from  admin.php

        //$id = 'admin@gmail.com';                      //self given id variable
        //$password = 'admin';                //self given password variable

        //if( $id==$pid && $pass==$password){     //$id== from admin.php 'loginfunc()' and $pass as well. 
                                                // $pid and $pass are variables declared above.
          //  $_SESSION['admin_id'] = $id;     //if the session named 'admin_id' is matching the id given above
            //echo json_encode($response['success'] = 1);    //responce is succesfull
        //}
        //else{
          //  echo json_encode($response['success'] = 0);     //response unsuccessful
        //}

    //}

?>


