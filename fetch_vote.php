<?php
session_start();
$video_id = $_SESSION["video_id"];
$user_id = $_SESSION["ip_id"];
$roi_id = $_COOKIE["roi_id"]; 

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "video");
//$connect = new PDO('mysql:host=localhost;dbname=video', 'root','');

$query = "SELECT classification FROM poll WHERE roi_id = '".$roi_id."' AND video_id = '".$video_id."'";

$objQuery = mysqli_query($link, $query);

$output = '';
if (!$objQuery) {
    $output = 'No Connection';
} else {
    if (mysqli_num_rows($objQuery) > 0){
        while ($row = $objQuery->fetch_assoc()){
            $output .= '
            <input type="radio" name = "suggestion" id = "suggestion" value="'.$row["classification"].'"> '.$row["classification"].' <br>
            ';
        }
    }
}
$output .= '
<input type="radio" name="suggestion" id = "suggestion" value="">Other 
<input type="text" name="suggestion" />​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
<input class = "button" type = "submit" name = "submit" id = "submit" class = "post" value = "VOTE" />
';

echo $output;

?>