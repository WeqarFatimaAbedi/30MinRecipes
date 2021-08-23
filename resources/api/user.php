<?php
session_start();
include('connect.php');
$json = json_decode(file_get_contents("php://input"),true);


//registration from registration.php
if($json['call']==1){

    $name = $json['name'];
    $email = $json['email'];
    $mobile = $json['mobile'];
    $pass = $json['pass'];
    $date = date('d-F-Y');

    //$password = password_hash($pass, PASSWORD_BCRYPT);
    
    $token = bin2hex(random_bytes(15));

    $check = mysqli_query($con, "SELECT * FROM user WHERE email='$email' OR mobile='$mobile'");
    if(mysqli_num_rows($check)>0){
        echo json_encode($response['success'] = 2);
    }
    else{
        $insert = mysqli_query($con, "INSERT INTO user (name, email, mobile, password, created_at, token) VALUES('$name','$email','$mobile','$pass','$date', '$token')");
        if($insert){
            echo json_encode($response['success'] = 1);
        }
        else{
            echo json_encode($response['success'] = 0);
        }
    }

}


//login from login.php
if($json['call']==2){

    $id = $json['id'];
    $pass = $json['pass'];

    $check = mysqli_query($con, "SELECT * FROM user WHERE (email='$id' OR mobile='$id') AND password='$pass' ");
    if(mysqli_num_rows($check)>0){
        while($row = mysqli_fetch_array($check)){
            $userid = $row['id'];
        }
        $_SESSION['user'] = $userid;
        echo json_encode($response['success'] = 1);
    }
    else{
        echo json_encode($response['success'] = 0);
    }

}




//change password from Changepassword.php
 if($json['call']==4){

    $email = $json['email'];
    $pass = $json['pass'];

    //$token = $json['token'];

   $reset_pass = mysqli_query($con, "SELECT * FROM user WHERE email='$email' ");
   if(mysqli_num_rows($reset_pass)>0){

     $update_query = mysqli_query($con,"UPDATE user set password='$pass' WHERE email='$email' ");
          if($update_query)
          {
             echo json_encode($response['success'] = 1);
          }
          else
                {

                    echo json_encode($response['success'] = 0);
                }
          
     }
    else
          {
             echo json_encode($response['success'] = 1);
          }
     
   }





//Forgot Password from Forgotpassword.php
if($json['call']==5){

   $id=$json['id'];
   $check_email = mysqli_query($con, "SELECT * FROM user WHERE email='$id' OR mobile='$id' ");

   $emailcount = mysqli_num_rows($check_email);
    if($emailcount>0)
     {
        $userdata = mysqli_fetch_array($check_email);
        $username = $userdata['name'];
        $token = $userdata['token'];

         $subject = "Reset Password";
         $body = "Hi $username.
                  Click here to reset your password
                  http://localhost/easyrecipes/routes/resetpass.php?token=$token";

         $sender_email = "From: 30minrecipesty@gmail.com";

         if(mail($id, $subject, $body, $sender_email))
            {
                echo json_encode($response['success'] = 1);
                
            }
            else
             {
                
                echo "Email not sent...";

             }
             
    }
    else{
           echo json_encode($response['success'] = 0);
        }
  }


//reset password from resetpass.php
  if($json['call']==6){
    
   $pass = $json['pass'];
   $token = $json['token'];

   $reset_pass = mysqli_query($con, "SELECT * FROM user WHERE token='$token' ");
   if(mysqli_num_rows($reset_pass)){

     $update_query = mysqli_query($con,"UPDATE user set password='$pass' WHERE token='$token' ");
          if($update_query)
          {
             echo json_encode($response['success'] = 1);
          }
          else
                {
                    echo "Password not updated";
                }
     }
     else
                {
                    echo json_encode($response['success'] = 0);
                }

}



?>
