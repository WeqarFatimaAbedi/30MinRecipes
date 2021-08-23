<?php

include('connect.php');

// Add recipe
$title = $_POST['title'];
$ingrediants = $_POST['ingrediants'];
$steps = $_POST['steps'];
$description = $_POST['description'];
$category = $_POST['category'];
$servings = $_POST['servings'];
$timing = $_POST['timing'];
$image = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$date = date('d-F-Y');
$id = mt_rand(100000,999999);              //r_id in db

$query1 = mysqli_query($con, "insert into recipe (r_id, title, description, category, servings, timing, created_at) values('$id', '$title','$description','$category','$servings','$timing','$date')");

for ($i=0;$i<count($ingrediants);$i++){
    $ing = $ingrediants[$i];
    $query2 = mysqli_query($con, "insert into ingrediant (ing_id, name, created_at) values('$id','$ing','$date')");
}

for ($i=0;$i<count($steps);$i++){
    $step = $steps[$i];
    $query3 = mysqli_query($con, "insert into method (m_id, name, created_at) values('$id','$step','$date')");
}

$query4 = mysqli_query($con, "insert into images (img_id, name, created_at) values('$id','$image','$date')");
$upload = move_uploaded_file($tmp_name,"../../uploads/$image");

if($query1 and $query2 and $query3 and $query4 and $upload){
    echo json_encode($response['success']=1);
}
else{
    echo json_encode($response['success']=0);
}

?>