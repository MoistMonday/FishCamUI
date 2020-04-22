<?php

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "video");

?>

<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<title> video upload </title>
</head>
<body>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM `uploaded_videos` WHERE id = '$id'";
    $result = $link -> query($sql) or die($link->error);
    while($row = $result->fetch_assoc())
    {
        $name = $row['name'];
        $url = $row['url'];
    }

    echo "You are watching ".$name." </br>";
    echo "<video width = '320' height = '240' controls src = '$url'> Your browser does not support the video tag. </video>";

}
else{
    echo "Error";
}

?>

</body>
</html>