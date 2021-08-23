<?php
include('connect.php');
session_start();
$json = json_decode(file_get_contents("php://input"),true);


//from recipe.php
if($json['call']==1){

    //CHECCKS IF THE USER LOGGED IN
    if(!isset($_SESSION['user'])){
        echo json_encode($response['success'] = 0);
    }


    else{
        $day = $json['day'];
        $uid = $_SESSION['user'];
        $rid = $_SESSION['recipe'];
        $date = date('d-F-Y');
    
        //CHECKS IF THE RECIPE IS ALREADY THERE
        $check = mysqli_query($con, "SELECT * FROM menu WHERE u_id='$uid' AND day_name='$day' ");
        if(mysqli_num_rows($check)>0){
            echo json_encode($response['success'] = 2);
        }

        //ELSE INSERTS IT INTO THE MENU
        else{
            $add = mysqli_query($con,"INSERT INTO menu (u_id, r_id, day_name, created_at) VALUES('$uid', '$rid', '$day', '$date')");
            if($add){
                echo json_encode($response['success'] = 1);
            }
        }
    }
}


//UPDATE IT WITH A NEW RECIPE
if($json['call']==2){
    $day = $json['day'];
    $uid = $_SESSION['user'];
    $rid = $_SESSION['recipe'];
    $date = date('d-F-Y');
    $add = mysqli_query($con,"UPDATE menu SET r_id='$rid' WHERE u_id='$uid' AND day_name='$day'");
    if($add){
        echo json_encode($response['success'] = 1);
    }
}



//FOR THE MENU FROM MENU.PHP
if($json['call']==3){

    $uid = $_SESSION['user'];

    $mon = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Monday'");

    $tue = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Tuesday'");

    $wed = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Wednesday'");

    $thu = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Thursday'");

    $fri = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Friday'");

    $sat = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Saturday'");

    $sun = mysqli_query($con,"SELECT recipe.title, menu.r_id, menu.day_name FROM recipe LEFT JOIN menu ON menu.r_id=recipe.r_id  WHERE menu.u_id='$uid' AND menu.day_name='Sunday'");

    $monday = mysqli_fetch_all($mon, MYSQLI_ASSOC);
    $empty = mysqli_free_result($mon);

    $tuesday = mysqli_fetch_all($tue, MYSQLI_ASSOC);
    $empty = mysqli_free_result($tue);

    $wednesday = mysqli_fetch_all($wed, MYSQLI_ASSOC);
    $empty = mysqli_free_result($wed);

    $thursday = mysqli_fetch_all($thu, MYSQLI_ASSOC);
    $empty = mysqli_free_result($thu);

    $friday = mysqli_fetch_all($fri, MYSQLI_ASSOC);
    $empty = mysqli_free_result($fri);

    $saturday = mysqli_fetch_all($sat, MYSQLI_ASSOC);
    $empty = mysqli_free_result($sat);

    $sunday = mysqli_fetch_all($sun, MYSQLI_ASSOC);
    $empty = mysqli_free_result($sun);

    echo json_encode([$monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday]);
}



if($json['call']==4){
    $uid = $_SESSION['user'];
    $rid = $json['id'];

    $delete = mysqli_query($con, "DELETE FROM menu WHERE r_id='$rid' AND u_id='$uid'");
    if($delete){
        echo json_encode($response['success'] = 1);
    }
    else{
        echo json_encode($response['success'] = 0);
    }
}
?>