<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];
$roi_id = $_COOKIE["roi_id"]; 

$error = '';
$suggestion = '';
$headline = 'What species do you see in the marked area?';

try{
    $connect = new PDO('mysql:host=localhost;dbname=video', 'root','');
}catch(PDOException $e){
    $error = $e->getMessage();
}

//if(empty($_POST["roi_identity"])){
//}else{
//    $roi_id = $_POST["roi_identity"];
//}

$suggestion = $_POST["other-suggestion"];

if(empty($suggestion)){ 
    $suggestion = $_POST["suggestion"]; 
}

if(empty($suggestion)){ 
    $error = "Error: No suggestion input";
}

if ($error == ''){
    //$query = "INSERT INTO `comments` (`comment_id`, `reply_id`, `user_id`, `video_id`, `body`, `created_at`) VALUES ('', '', '$user_id', '', '$body', current_timestamp())";
    $query = "INSERT INTO poll (video_id, user_id, roi_id, classification) VALUES (:video_id, :user_id, :roi_id, :classification)";
    //$objQuery = mysqli_query($link, $query);
    $statement = $connect->prepare($query);
    $res = $statement->execute(
        array(
            ':video_id' => $video_id,
            ':user_id' => $user_id,
            ':roi_id' => $roi_id,
            ':classification' => $suggestion
        )
    );

    if(!$res) {
        $error = 'Error: ' . $statement->errorInfo()[2];
    }
}


//getting the results of the whole poll
$query2 = "SELECT classification FROM poll WHERE roi_id=:roi_id AND video_id=:video_id ";

$statement2 = $connect->prepare($query2);
$res2 = $statement2->execute(
    array(
        ':roi_id' => $roi_id,
        ':video_id' => $video_id
    )
);

if(!$res2) {
    $error = "Error: " . $statement2->errorInfo()[2];
}

$result2 = $statement2->fetchAll(PDO::FETCH_COLUMN, 0);

$numberOfVotes = count($result2);

$pollResults = '';

if (!empty($result2)){

    $countClassification = array_count_values(array_map('strtolower', $result2));
    arsort($countClassification);
    //$pollResults .= "<p> ".$countClassification['Trout']." </p>";
    foreach ($countClassification as $specie => $count) {
        $percentage = round($count/$numberOfVotes*100);
        $pollResults .= "<p class = 'results'> $specie  $percentage% </p>";
    }
    $pollResults .= '<button class = "vote-btn-group vote-button" onClick="window.location.reload();">Okay</button>';
    $headline = 'What People Think';
}

$data = array (
    'error' => $error,
    'pollResults' => $pollResults,
    'headline' => $headline
);

echo json_encode($data);
?>