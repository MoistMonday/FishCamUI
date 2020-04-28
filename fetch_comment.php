<?php


$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "video");
$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

$query = "SELECT * FROM comments WHERE reply_id = '0' ORDER BY comment_id DESC";

$objQuery = mysqli_query($link, $query);
$output = '';
if (!$objQuery) {
    $output = 'No Connection';
} else {
    if (mysqli_num_rows($objQuery) > 0){
        while ($row = $objQuery->fetch_assoc()){
            $output .= '
            <div class = "panel panel-default">
            <div class = "user comment-wrapper"> 
                <b> '.$row["user_id"].' </b>
            </div>
            <div class = "comment-body comment-wrapper"> 
                '.$row["body"].' <br/>
            </div>
            <div class = "comment-footer comment-wrapper">
                '.$row["created_at"].'  <b>•</b>   
                <button type = "button" class = "btn btn-default reply reply-btn" id = "'.$row["comment_id"].'">
                   <b> reply</b>
                </button>
            </div>
        </div>';
            $output .= get_reply_comment($connect, $row["comment_id"]);
        }

    }
}

echo $output;

function get_reply_comment($connect, $reply_id = 0, $marginleft = 0){
    $output = '';
    $query = "SELECT * FROM comments WHERE reply_id = '".$reply_id."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if($reply_id == 0){

        $marginleft = 0;

    }else{
        $marginleft = $marginleft + 48;

    }
    if($count > 0){
        foreach($result as $row){
            $output .= '
            <div class = "panel panel-default" style = "margin-left: '.$marginleft.'px">
                <div class = "user comment-wrapper"> 
                    <b> '.$row["user_id"].' </b>
                </div>
                <div class = "comment-body comment-wrapper"> 
                    '.$row["body"].' <br/>
                </div>
                <div class = "comment-footer comment-wrapper">
                    '.$row["created_at"].'  <b>•</b>    
                    <button type = "button" class = "btn btn-default reply reply-btn" id = "'.$row["comment_id"].'">
                        <b> reply</b>
                    </button>
                </div>
            </div>';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);

        }
    }
    return $output;
}

?>