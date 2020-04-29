<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];
$roi_id = $_COOKIE["roi_id"]; 

//$link = mysqli_connect("localhost","root","");
//mysqli_select_db($link, "video");
$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

$error = '';
$suggestion = '';

//if(empty($_POST["roi_identity"])){
//}else{
//    $roi_id = $_POST["roi_identity"];
//}

if(empty($_POST["suggestion"])){
    $error .= '<script type= "text/javascript"> alert("Select a classification or add your own suggestion."); </script>';
}else{
    $suggestion = $_POST["suggestion"];
}
if ($error == ''){
    //$query = "INSERT INTO `comments` (`comment_id`, `reply_id`, `user_id`, `video_id`, `body`, `created_at`) VALUES ('', '', '$user_id', '', '$body', current_timestamp())";
    $query = "INSERT INTO poll (video_id, user_id, roi_id, classification) VALUES (:video_id, :user_id, :roi_id, :classification)";
    //$objQuery = mysqli_query($link, $query);
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':video_id' => $video_id,
            ':user_id' => $user_id,
            ':roi_id' => $roi_id,
            ':classification' => $suggestion
        )
    );
    $error = '<label class ="text-success"> </label>';
}


$data = array (
    'error' => $error

);

echo json_encode($data);
?>