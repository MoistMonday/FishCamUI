<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];

//$link = mysqli_connect("localhost","root","");
//mysqli_select_db($link, "video");
$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

$error = '';
//$user_id2= '';
$body = '';

//if(empty($_POST['user_id2'])){
//    $error .= '<p class "text-danger"> user id requried </p>';
//}else {
//    $user_id2 = $_POST['user_id2'];
//}

if(empty($_POST["body"])){
    $error .= '<p class "text-danger"> comment is requried </p>';
}else{
    $body = $_POST["body"];
}
if ($error == ''){
    //$query = "INSERT INTO `comments` (`comment_id`, `reply_id`, `user_id`, `video_id`, `body`, `created_at`) VALUES ('', '', '$user_id', '', '$body', current_timestamp())";
    $query = "INSERT INTO comments (video_id, reply_id, body, user_id) VALUES (:video_id, :reply_id, :body, :user_id)";
    //$objQuery = mysqli_query($link, $query);
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':video_id' => $video_id,
            ':reply_id' => $_POST["comment_id"],
            ':body' => $body,
            ':user_id' => $user_id
        )
    );
    $error = '<label class ="text-success"> </label>';
}


$data = array (
    'error' => $error

);

echo json_encode($data);
?>