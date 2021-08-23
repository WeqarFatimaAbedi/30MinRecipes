<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true); 
                                                        //taking the strig ajax data and decoding into json object
 
if($json['call']==1){                                   //taking the KEY value 1

    $date = date('d-F-Y');                              //adding a date when the user subscribes
    $email = $json['email'];                            //taking the other KEY value email from the json obj
    
        $check = mysqli_query($con, "SELECT * FROM subscriptions WHERE email='$email'");  
                                                        //checking if the user exist
        if(mysqli_num_rows($check)>0){                   //checking each row
            echo json_encode($response['success'] = 0);    
        }



        else{                                   //inserting the data in the table subscriptions and success=1.


            $check = mysqli_query($con, "INSERT INTO subscriptions (email, created_at) VALUES('$email','$date')");

            //$emailcount = mysqli_fetch_array($check);
            if($check)
              {
                 //$userdata = mysqli_fetch_array($check);
                 //$username = $userdata['email'];
                 //$token = $userdata['token'];

                 $subject = "You have subscribed to 30MinRecipes";
                 $body = "Hi.
                  Now, you can get updates whenever a new recipe is added!";
                   $sender_email = "From: 30minrecipesty@gmail.com";

               if(mail($email, $subject, $body, $sender_email))
                  {
                    echo json_encode($response['success'] = 1);
                        
                   }
               else
                {
                
                echo "Email not sent...";

                }
             
            }
            else{
                echo json_encode($response['success'] = 1);
            }
        }
}

?>

