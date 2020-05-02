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
<title> FishCam: The Underwater World of Limfjorden </title>


</head>
<body class = "body">

<div class = "feed">


<img class = "construction" src= "LikedUnderConstruction.png">

<?php

?>

<div class="videoBox header">
<a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
</div>

</div>

<div class="btn-group">
<a href = "upload.php"> <img src= "fishlogo.png" height="25" width="25">  </a>
<a href = "videos.php"> <img src= "filledfishcam.png" onmouseover = "this.src = 'filledfishcam.png'" onmouseout = "this.src = 'fishcam.png'" height="25" width="25">  </a>
<a href = "notification.php"> <img src= "bell.png" onmouseover = "this.src = 'filledbell.png'" onmouseout = "this.src = 'bell.png'"   height="25" width="25"> </a>
<a href = "liked.php"> <img src= "filledheart.png" height="25" width="25"> </a>
</div>
</body>
</html>