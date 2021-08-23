
<?php

session_start();
include('connect.php');
$json = json_decode(file_get_contents("php://input"),true);

if($json['call']==1){

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


if($json['call']==2){
 $pass = $json['pass'];
    
   if(isset($_GET['token']))
     {
        $token = $_GET['token'];
    
        $update_query = mysqli_query($con,"UPDATE user set password='$pass' WHERE token='$token' ");
          if($update_query)
          {
             echo json_encode($response['success'] = 1);
          }
           else
                {
                    echo "Your password has not been updated";
                }
          
      }
        else{
            echo json_encode($response['success'] = 0);
          }


}



?>





