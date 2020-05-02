<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];
$roi_id = $_COOKIE["roi_id"]; 

$error = '';
$output = '';
$headline = 'What species do you see in the marked area?';

$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

$sql = "SELECT id FROM poll WHERE user_id=:user_id AND roi_id=:roi_id AND video_id=:video_id";
$statement3 = $connect->prepare($sql);
$res3 = $statement3->execute(
    array(
        ':user_id' => $user_id,
        ':roi_id' => $roi_id,
        ':video_id' => $video_id
    )
);

$result3 = $statement3->fetchAll();
//$error .= implode(", ", $result3);

if(count($result3) == 0) { // If user didnt submit

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
            $output .= "<label>
            <input type='radio' name = 'suggestion' id = 'suggestion' value='$uniq'><span>$uniq</span><br>
            </label>";
        }


        // for ($i = 0; $i < count($uniqueResults); ++$i){
        //     $output .= "<p>" . $uniqueResults[0] . "</p>";
        // }

    }else{
        $error .= "Error: Nothing was returned";
    }


    $output .= '<div class = "Add-box">
    <label>
    <input type="radio" name="suggestion" id = "suggestion" value=""><div class = "Add-check">Add Suggestion</div> 
    </label>
    <input type="text" class = "Add-text" name="other-suggestion" placeholder = "Write your own suggestion..." />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​ </br>
    </div>
    <input class = "vote-btn-group vote-button Vote-btn" type = "submit" name = "submit" id = "submit" class = "post" value = "VOTE" />
    ';
} else{
    //getting the results of the whole poll
    $output = '';
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

    if (!empty($result2)){

        $countClassification = array_count_values(array_map('strtolower', $result2));
        arsort($countClassification);
        //$pollResults .= "<p> ".$countClassification['Trout']." </p>";
        foreach ($countClassification as $specie => $count) {
            $percentage = round($count/$numberOfVotes*100);
            $output .= "<p class ='results'> $specie  $percentage% </p>";
        }
        $output .= '<button class = "vote-btn-group vote-button" onClick="window.location.reload();">Okay</button>';
        $headline = 'What People Think';
    }
}
$data = array (
    'error' => $error,
    'output' => $output,
    'headline' => $headline
);

echo json_encode($data);

?>