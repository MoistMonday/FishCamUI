<?php

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "video");


?>

<!doctype html>
<html>
<head>
    <link rel = "stylesheet" href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> video upload </title>
</head>
<body class = "body">

<div class = "feed">



<?php


?>

<div class="videoBox header">
<a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
</div>

<div class="btn-group">
<a href = "upload.php"> <img src= "fishlogo.png" height="25" width="25">  </a>
<a href = "videos.php"> <img src= "filledfishcam.png" onmouseover = "this.src = 'filledfishcam.png'" onmouseout = "this.src = 'fishcam.png'" height="25" width="25">  </a>
<a href = "notification.php"> <img src= "filledbell.png" height="25" width="25"> </a>
<a href = "liked.php"> <img src= "heart.png" onmouseover = "this.src = 'filledheart.png'" onmouseout = "this.src = 'heart.png'" height="25" width="25"> </a>
</div>
</div>
</body>
</html>