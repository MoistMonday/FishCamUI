<!doctype html>
<html>
<head>
    <link rel = "stylesheet" href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> FishCam: The Underwater World of Limfjorden </title>


</head>
<body class = "body">

<div class = "feed">


<?php
session_start(); // so we later can use session tag
$link = mysqli_connect("localhost","fishuser","vapfolks20636");;
mysqli_select_db($link, "video");

$sql = "SELECT * FROM `uploaded_videos`";
$result = $link -> query($sql) or die($link->error);

while($row = $result->fetch_assoc())// mysqli_fetch_assoc($query))
{
    $id = $row['id'];
    $name = $row['name'];
    $url = $row['url'];
    $time = $row ['time'];
    

    //echo "<a href = 'watch.php?id=$id'> $name </a><br />";
    echo '<div class = "videoBox">';
    echo "<a href='watch.php?id=$id' class = 'videoTitle'> $time </h2>";
    echo "<video class = 'video' width = '320' height = '240' src = '$url' autoplay loop> Your browser does not support the video tag. </video>";
    echo "</div>"; 
}

// Find User IP and sent to the user information table in phpMyAdmin and get ID

// Finding user IP
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$sql2 = "SELECT 1 FROM user_information WHERE ip='".$ip."'";
$objQuery2 = mysqli_query($link, $sql2);
//Sending user IP	

if(mysqli_num_rows($objQuery2) == 0){ //If it doesnt already exist
    $sql3 = "INSERT INTO user_information (ip, created_at) VALUES ('$ip', current_timestamp())";
    $objQuery3 = mysqli_query($link, $sql3);
}  	

// Getting unique user ID
$statement = $link -> prepare("SELECT id FROM user_information WHERE ip='".$ip."'");
$statement -> execute();
$result = $statement -> get_result();
$value = $result->fetch_object();
$_SESSION["ip_id"] = $value->id;
?>


</div>
<div class="videoBox header video_header">
<a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
</div>

<div class="btn-group">
<a class = "upload-btn" href = "upload.php"> <img src= "fishlogo.png" height="25" width="25">  </a>
<a href = "liked.php"> <img src= "heart.png" onmouseover = "this.src = 'filledheart.png'" onmouseout = "this.src = 'heart.png'" height="25" width="25"> </a>
<a href = "videos.php"> <img src= "filledfishcam.png" height="25" width="25">  </a>
<a href = "notification.php"> <img src= "bell.png" onmouseover = "this.src = 'filledbell.png'" onmouseout = "this.src = 'bell.png'"   height="25" width="25"> </a>

</div>
</body>


</html>