<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];
$roi_id = $_COOKIE["roi_id"]; 

$error = '';

$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

// $sql = "SELECT 1 FROM poll WHERE user_id=:user_id AND roi_id=:roi_id AND video_id=:video_id";
// $statement3 = $connect->prepare($sql);
// $res3 = $statement3->execute(
//     array(
//         ':user_id' => $user_id,
//         ':roi_id' => $roi_id,
//         ':video_id' => $video_id
//     )
// );

//if($res3->rowCount() == 0) { // If user didnt submit

    $query = "SELECT classification FROM poll WHERE roi_id=:roi_id AND video_id=:video_id ";

    $statement = $connect->prepare($query);
    $res = $statement->execute(
        array(
            ':roi_id' => $roi_id,
            ':video_id' => $video_id
        )
    );

    if(!$res) {
        $error = "Error: " . $statement->errorInfo()[2];
    }

    $result = $statement->fetchAll(PDO::FETCH_COLUMN, 0);

    //$output = '<div id = "poll_headline"> What species do you see in the marked area? </div>';
    $output = '';

    if (!empty($result)){
        $uniqueResults = array_unique(array_map('strtolower', $result));

        foreach ($uniqueResults as $uniq) {
            $output .= "<input type='radio' name = 'suggestion' id = 'suggestion' value='$uniq'>$uniq<br>";
        }


        // for ($i = 0; $i < count($uniqueResults); ++$i){
        //     $output .= "<p>" . $uniqueResults[0] . "</p>";
        // }

    }else{
        $error .= "Error: Nothing was returned";
    }


    $output .= '
    <input type="radio" name="suggestion" id = "suggestion" value="">Other 
    <input type="text" name="other-suggestion" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​ <br>
    <input class = "btn-group" type = "submit" name = "submit" id = "submit" class = "post" value = "VOTE" />
    ';


    $data = array (
        'error' => $error,
        'output' => $output
    );

    echo json_encode($data);
//}

?>