<?php

$link = mysqli_connect("localhost","fishuser","vapfolks20636");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_select_db($link, "video");

if (isset($_POST['submit']))
{
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    move_uploaded_file($temp, "Uploaded/".$name);
    $url = "http://localhost/MiniProject/Uploaded/$name";
    $res = mysqli_query($link, "INSERT INTO `uploaded_videos` (`name`, `url`, `time`) VALUES ('$name', '$url', current_timestamp())");

    if(!$res) printf("Query failed: %s\n", mysqli_error($link));
}

?>

<!doctype html>
<html>
<head>
    <link rel = "stylesheet" href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600" rel="stylesheet">
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Video Upload </title>
</head>
<body class = "body">

<div class = "feed">
<div class = "upload">
<form class = "uploadText" action = "upload.php" method = "POST" enctype = "multipart/form-data">
    <input class = "uploadText" type = "file" name = "file"/>
    <input class = "button" type = "submit" name = "submit" value = "Upload" />
</form>


<?php

if (isset ($_POST['submit']))
{
    echo "<br/>".$name." has been uploaded";

}

?>
</div>

<div>
    <div class="videoBox header">
        <a href = "videos.php"> <img src= "applogo.png" height="30" width="97">  </a>
    </div>

    <div class="btn-group">
        <a href = "upload.php"> <img src= "fishlogo.png" height="25" width="25">  </a>
        <a href = "videos.php"> <img src= "filledfishcam.png" onmouseover = "this.src = 'filledfishcam.png'" onmouseout = "this.src = 'fishcam.png'" height="25" width="25">  </a>
        <a href = "notification.php"> <img src= "bell.png" onmouseover = "this.src = 'filledbell.png'" onmouseout = "this.src = 'bell.png'"   height="25" width="25"> </a>
        <a href = "liked.php"> <img src= "heart.png" onmouseover = "this.src = 'filledheart.png'" onmouseout = "this.src = 'heart.png'" height="25" width="25"> </a>
    </div>
</div>

</div>
</body>
</html>