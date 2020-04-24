<?php

$link = mysqli_connect("localhost","root","123");
mysqli_select_db($link, "video");

?>

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
    echo "<h2 class = 'videoTitle'> $time </h2>";
    echo "<video class = 'video' width = '320' height = '240' controls src = '$url'> Your browser does not support the video tag. </video>";
    echo "</div>";
}


?>
<div class="videoBox header">
<a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
</div>

</div>

<div class="btn-group">
<a href = "upload.php"> <img src= "fishlogo.png" height="25" width="25">  </a>
<a href = "videos.php"> <img src= "filledfishcam.png" height="25" width="25">  </a>
<a href = "notification.php"> <img src= "bell.png" onmouseover = "this.src = 'filledbell.png'" onmouseout = "this.src = 'bell.png'"   height="25" width="25"> </a>
<a href = "liked.php"> <img src= "heart.png" onmouseover = "this.src = 'filledheart.png'" onmouseout = "this.src = 'heart.png'" height="25" width="25"> </a>
</div>
</body>
</html>